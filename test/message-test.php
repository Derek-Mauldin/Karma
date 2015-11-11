<?php

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/php/classes/message.php");

/**
 * Full PHPUnit test for the Message class
 *
 * This is a complete PHPUnit test of the Message class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Message
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class MessageTest extends karmaTest {
	/**
	 * valid messagesender to use
	 * @var string $VALID_MESSAGESENDER
	 **/
	protected $VALID_MESSSAGESENDER = "@phpunit";
	/**
	 * valid messagereceiver to use
	 * @var string $VALID_MESSAGERECEIVER
	 **/
	protected $VALID_MESSAGERECEIVER = "@passingtests";
	/**
	 * valid messagecontent to use
	 * @var string $VALID_MESSAGECONTENT
	 **/
	protected $VALID_MESSAGECONTENT = "test@phpunit.de";

	/**
	 * test inserting a valid Message and verify that the actual mySQL data matches
	 **/
	public function testInsertValidMessage() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSender(), $this->VALID_MESSAGESENDER);
		$this->assertSame($pdoMessage->getMessageReceiver(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
	}

	/**
	 * test inserting a Message that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidMessage() {
		// create a profile with a non null messageId and watch it fail
		$message = new Message(karmaTest::INVALID_KEY, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());
	}

	/**
	 * test inserting a Message, editing it, and then updating it
	 **/
	public function testUpdateValidMessage() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// edit the Message and update it in mySQL
		$message->setMessageSender($this->VALID_MESSAGESENDER);
		$message->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("Message"));
		$this->assertSame($pdoMessage->getMessageSender(), $this->VALID_MESSAGESENDER);
		$this->assertSame($pdoMessage->getMessageReceiver(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
	}

	/**
	 * test updating a Message that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidMessage() {
		// create a Message and try to update it without actually inserting it
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->update($this->getPDO());
	}

	/**
	 * test creating a Message and then deleting it
	 **/
	public function testDeleteValidMessage() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// delete the Message from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$message->delete($this->getPDO());

		// grab the data from mySQL and enforce the Message does not exist
		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertNull($pdoMessage);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("message"));
	}

	/**
	 * test deleting a Message that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidMessage() {
		// create a Mesage and try to delete it without actually inserting it
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->delete($this->getPDO());
	}

	/**
	 * test inserting a Message and regrabbing it from mySQL
	 **/
	public function testGetValidMessageByMesageId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByMessageId($this->getPDO(), $message->getMessageId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSender(), $this->VALID_MESSAGESENDER);
		$this->assertSame($pdoMessage->getMessageReceiver(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
	}

	/**
	 * test grabbing a Message that does not exist
	 **/
	public function testGetInvalidMessageByMesageId() {
		// grab a Message id that exceeds the maximum allowable message id
		$message = Message::getMessageByMessageId($this->getPDO(), karmabaseTest::INVALID_KEY);
		$this->assertNull($message);
	}

	public function testGetValidMessageByMessagesender() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$Message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$Message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageeByMessagesender($this->getPDO(), $this->VALID_MESSAGESENDER);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSender(), $this->VALID_MESSAGESENDER);
		$this->assertSame($pdoMessage->getMessageReceiver(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
	}
	/**
	 * test grabbing a Message by sender that does not exist
	 **/
	public function testGetInvalidMessageByMessageSender() {
		// grab a message sender that does not exist
		$message = Message::getMessageByMessageSender($this->getPDO(), "@doesnotexist");
		$this->assertNull($message);
	}

	/**
	 * test grabbing a Message by message receiver
	 **/
	public function testGetValidMessageByMessageReceiver() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("message");

		// create a new Message and insert to into mySQL
		$Message = new Message(null, $this->VALID_MESSAGESENDER, $this->VALID_MESSAGERECEIVER, $this->VALID_MESSAGECONTENT);
		$Message->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMessage = Message::getMessageByMessageReceiver($this->getPDO(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoMessage->getMessageSender(), $this->VALID_MESSAGESENDER);
		$this->assertSame($pdoMessage->getMessageReceiver(), $this->VALID_MESSAGERECEIVER);
		$this->assertSame($pdoMessage->getMessageContent(), $this->VALID_MESSAGECONTENT);
	}

	/**
	 * test grabbing a Message by an message receiver that does not exists
	 **/
	public function testGetInvalidMessageByMessageReceiver() {
		// grab an message receiver that does not exist
		$message = Message::getMessageByMessageReceiver($this->getPDO(), "does@not.exist");
		$this->assertNull($message);
	}
}