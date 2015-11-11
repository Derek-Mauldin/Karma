<?php

require_once("karma.php");

/**
 * Full PHPUnit test for the Message class
 *
 * This is a complete PHPUnit test of the Need class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Need
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class NeedTest extends karmaDataDesignTest {
	/**
	 * valid NeedDescription to use
	 * @var string $VALID_NEEDDESCRIPTION
	 **/
	protected $VALID_NEEDDESCRIPTION = "@phpunit";
	/**
	 * valid needFulfilled to use
	 * @var string $VALID_NEEDFULFILLED
	 **/
	protected $VALID_NEEDFULFILLED = "@passingtests";
	/**
	 * valid needTitle to use
	 * @var string $VALID_NEEDTITLE
	 **/
	protected $VALID_NEEDTITLE = "test@phpunit.de";

	/**
	 * test inserting a valid Need and verify that the actual mySQL data matches
	 **/
	public function testInsertValidNeed() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);
	}

	/**
	 * test inserting a Need that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidNeed() {
		// create a need with a non null needId and watch it fail
		$need = new Need(karmaTest::INVALID_KEY, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->insert($this->getPDO());
	}

	/**
	 * test inserting a Need, editing it, and then updating it
	 **/
	public function testUpdateValidNeed() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLESSAGECONTENT);
		$need->insert($this->getPDO());

		// edit the Message and update it in mySQL
		$need->setNeedDescription($this->VALID_NEEDDESCRIPTION);
		$need->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("Need"));
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);
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