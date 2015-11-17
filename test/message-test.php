<?php
// grab the test parameters
require_once("karmadatadesign.php");

// grab the classes
require_once(dirname(__DIR__) . "/public_html/php/classes/autoload.php");


/**
 * Full PHPUnit test for the Message class
 *
 * This is a complete PHPUnit test of the Message class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Message
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class MessageTest extends KarmaDataDesign {
	/**
	 * valid messagecontent to use
	 * @var string $VALID_MESSAGECONTENT
	 **/
	protected $VALID_MESSAGECONTENT = "Its Easy to learn computer languages";


	protected $OTHER_VALID_MESSAGE_CONTENT = "No it's not";

	/**
	 * Profile that created the message sent; this is for foreign key relations
	 * @var Profile $profile
	 **/
	protected $profile1 = null;

	/**
	 * Profile that created the message received; this is for foreign key relations
	 * @var Profile $profile
	 **/
	protected $profile2 = null;

	/**
	 * Message that created the message sender id; this is for foreign key relations
	 * @var Profile $profile
	 **/
	protected $member1 = null;

	/**
	 * Message that created the message receiver id; this is for foreign key relations
	 * @var Profile $profile
	 **/
	protected $member2 =null;

	/**
	 ** valid salt
	 * @var string $VALID_SALT
	 **/
	protected $salt = null;
	/**
	 ** valid hash
	 * @var string $VALID_HASH
	 **/
	protected $hash = null;



	/**
 * create dependent objects before running each test
 **/
	public final function setUp() {
		// run the default setup() method first
		parent::setUp();

		$this->salt =bin2hex(openssl_random_pseudo_bytes(32));
		$this->hash = hash_pbkdf2("sha512","bootcamp-coders", $this->salt, 4096, 128);


		//create and insert a Message to own the test
		$this->member1 = new Member(null, "s", "blurb1@gail.com", "takeItEasy", $this->hash, $this->salt, "salt1");
		$this->member1->insert($this->getPDO());

		$this->member2 = new Member(null, "s", "blurb2@gail.com", "whatIsEasy", "hash2", "salt2");
		$this->member2->insert($this->getPDO());

		//create and insert a Profile to own the test
		$this->profile1 = new Profile(null, $this->member1->getMemberId(), "itsOk", "whatIsGoingOn", "john", "paul", null);
		$this->profile1->insertProfile($this->getPDO());

		$this->profile2 = new Profile(null, $this->member2->getMemberId(), "knock", "happiest","jake", "Norris", null);
		$this->profile2->insertProfile($this->getPDO());
	}

	/**
	 * test inserting a valid Message and verify that the actual mySQL data matches
	 **/
	public function testInsertValidMessage() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSenderId(), $message->getMessageSenderId());
		$this->assertSame($pdoMessage->getMessageReceiverId(), $message->getMessageReceiverId());
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
		$this->assertSame($pdoMessage->getMessageDate(), $message->getMessageDate());

	}

	/**
	 * test inserting a Message that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidMessage() {

		// create a message
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// insert again and watch it fail
		$message->insert($this->getPDO());

	}

	/**
	 * test inserting a Message, editing it, and then updating it
	 **/
	public function testUpdateValidMessage() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// edit the Message and update it in mySQL
		$message->setMessageContent($this->OTHER_VALID_MESSAGE_CONTENT);
		$message->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations

		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSenderId(), $message->getMessageSenderId());
		$this->assertSame($pdoMessage->getMessageReceiverId(), $message->getMessageReceiverId());
		$this->assertSame($pdoMessage->getMessageContent(), $this->OTHER_VALID_MESSAGE_CONTENT);
		$this->assertSame($pdoMessage->getMessageDate(), $message->getMessageDate());

	}

	/**
	 * test updating a Message that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidMessage() {

		// create a Message and try to update it without actually inserting it
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->update($this->getPDO());

	}

	/**
	 * test creating a Message and then deleting it
	 **/
	public function testDeleteValidMessage() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// delete the Message from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$message->delete($this->getPDO());

		// grab the data from mySQL and enforce the Message does not exist
		$pdoMessage = Message::getMessageSenderId($this->getPDO(), $this->profile1->getProfileId());
		$this->assertNull($pdoMessage);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("message"));

	}

	/**
	 * test deleting a Message that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidMessage() {
		// create a Message and try to delete it without actually inserting it
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->delete($this->getPDO());
	}



	/**
	 * test grabbing a Message that does not exist
	 **/
	public function testGetInvalidMessageByMesageId() {

		// grab a Message id that exceeds the maximum allowable message id
		$message = Message::getMessageByMessageId($this->getPDO(), karmaDataDesignTest::INVALID_KEY);
		$this->assertNull($message);

	}

	public function testGetValidMessageByMessagesender() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageeByMessageSender($this->getPDO(), $message->getMessageSenderId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSenderId(), $message->getMessageSenderId());
		$this->assertSame($pdoMessage->getMessageReceiverId(), $message->getMessageReceiverId());
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
		$this->assertSame($pdoMessage->getMessageDate(), $message->getMessageDate());

	}

	/**
	 * test grabbing a Message by sender that does not exist
	 **/
	public function testGetInvalidMessageByProfile1() {

		// grab a message sender that does not exist
		$message = Message::getMessageBySenderId($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($message);

	}

	/**
	 * test grabbing a Message by message receiver
	 **/
	public function testGetValidMessageByProfile2() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->profile1->getProfileId(), $this->profile2	->getProfileId(), $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByReceiverId($this->getPDO(), $this->profile2->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSenderId(), $message->getMessageSenderId());
		$this->assertSame($pdoMessage->getMessageReceiverId(), $message->getMessageReceiverId());
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
		$this->assertSame($pdoMessage->getMessageDate(), $message->getMessageDate())

	}

	/**
	 * test grabbing a Message by a message receiver that does not exists
	 **/
	public function testGetInvalidMessageByProfileId() {

		// grab an message receiver that does not exist
		$message = Message::getMessageByProfileId($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($message);

	}
}