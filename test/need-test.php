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
		$need = new Need(karmaDataDesignTest::INVALID_KEY, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
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
	 * test updating a Need that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidNeed() {
		// create a Need and try to update it without actually inserting it
		$need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->update($this->getPDO());
	}

	/**
	 * test creating a Need and then deleting it
	 **/
	public function testDeleteValidNeed() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->insert($this->getPDO());

		// delete the Message from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$need->delete($this->getPDO());

		// grab the data from mySQL and enforce the Need does not exist
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertNull($pdoNeed);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("need"));
	}

	/**
	 * test deleting a Need that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidNeed() {
		// create a Need and try to delete it without actually inserting it
		$need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->delete($this->getPDO());
	}

	/**
	 * test inserting a Need and regrabbing it from mySQL
	 **/
	public function testGetValidNeedByNeedId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Message(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("message"));
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getMessageReceiver(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getMessageContent(), $this->VALID_NEEDTITLE);
	}

	/**
	 * test grabbing a Need that does not exist
	 **/
	public function testGetInvalidNeedByNeedId() {
		// grab a Need that exceeds the maximum allowable need
		$need = Need::getNeedByNeedId($this->getPDO(), karmaTest::INVALID_KEY);
		$this->assertNull($need);
	}

	public function testGetValidNeedByNeedDescription() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$Need = new Message(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$Need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Message::getNeedByNeeddescription($this->getPDO(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);
	}
	/**
	 * test grabbing a Need by Description that does not exist
	 **/
	public function testGetInvalidNeedByDescription() {
		// grab a need description that does not exist
		$need = Need::getNeedByNeedDescription($this->getPDO(), "@doesnotexist");
		$this->assertNull($need);
	}

	/**
	 * test grabbing a Need by need fulfilled
	 **/
	public function testGetValidNeedByNeedFulfilled() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$Need = new Need(null, $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDFULFILLED, $this->VALID_NEEDTITLE);
		$Need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedFulfilled($this->getPDO(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);
	}

	/**
	 * test grabbing a Need by an need fulfilled that does not exists
	 **/
	public function testGetInvalidNeedByNeedFulfilled() {
		// grab an need Fulfilled that does not exist
		$need = Need::getNeedByNeedFulfilled($this->getPDO(), "does@not.exist");
		$this->assertNull($need);
	}
}