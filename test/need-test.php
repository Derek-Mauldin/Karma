<?php
// grab the test parameters
require_once("karmaDataDesign.php");
// grab the class to test
require_once(dirname(__DIR__) . "/public_html/php/classes/need.php");

/**
 * Full PHPUnit test for the Need class
 *
 * This is a complete PHPUnit test of the Need class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Need
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class NeedTest extends KarmaDataDesign {
	/**
	 * valid NeedDescription to use
	 * @var string $VALID_NEEDDESCRIPTION
	 **/
	protected $VALID_NEEDDESCRIPTION = "this is a good description";

	protected $VALID_OTHER_NEED_DESCRIPTION = "this is a second good description";
	/**
	 * valid needFulfilled to use
	 * @var int $VALID_NEEDFULFILLED
	 **/
	protected $VALID_NEEDFULFILLED = 0;
	/**
	 * valid needTitle to use
	 * @var string $VALID_NEEDTITLE
	 **/
	protected $VALID_NEEDTITLE = "Gerald's Need";

	/**
	 * member to use during test -- foreigh key for Profile
	 * @var Member $member
	 **/
	protected $member;

	/**
	 * profile to use during test -- foreign key
	 * @var Profile $profile
	 */
	protected $profile;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		$this->salt =bin2hex(openssl_random_pseudo_bytes(32));
		$this->hash = hash_pbkdf2("sha512","bootcamp-coders", $this->salt, 4096, 128);

		//create and insert a Message to own the test
		$this->member = new Member(null, "s", "blurb1@gail.com", "takeItEasy", $this->hash, $this->salt, "salt1");
		$this->member->insert($this->getPDO());

		//create and insert a Profile to own the test
		$this->profile = new Profile(null, $this->member->getMemberId(), "itsOk", "whatIsGoingOn", "john", "paul", null);
		$this->profile->insertProfile($this->getPDO());


	}
	/**
	 * test inserting a valid Need and verify that the actual mySQL data matches
	 **/
	public function testInsertValidNeed() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
		$need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getProfileId(), $need->getProfileId());
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
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
		$need->insert($this->getPDO());

		// insert agian and watch it fail
		$need->insert($this->getPDO());
	}


	/**
	 * test updating a Need that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidNeed() {

		// create a Need and try to update it without actually inserting it
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);

		$need->update($this->getPDO());

	}

	/**
	 * test creating a Need and then deleting it
	 **/
	public function testDeleteValidNeed() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert to into mySQL
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
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
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);

		$need->delete($this->getPDO());

	}

	/**
	 * test inserting a Need and regrabbing it from mySQL
	 **/
	public function testGetValidNeedByNeedId() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert into mySQL
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
		$need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getNeedId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getProfileId(), $need->getProfileId());
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);

	}

	/**
	 * test grabbing a Need that does not exist
	 **/
	public function testGetInvalidNeedByNeedId() {

		// grab a Need that exceeds the maximum allowable need
		$need = Need::getNeedByNeedId($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($need);

	}

	/**
	 * test grabbing a need by profiled
	 */

	public function testGetNeedByProfileId() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("need");

		// create a new Need and insert into mySQL
		$need = new Need(null, $this->profile->getProfileId(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
		$need->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoNeed = Need::getNeedByNeedId($this->getPDO(), $need->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
		$this->assertSame($pdoNeed->getProfileId(), $need->getProfileId());
		$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
		$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
		$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);

	}

	/**
	 * test grabbing a Need by a profile that does not exist
	 **/
	public function testGetInvalidNeedByProfileId() {

		// grab a Need that exceeds the maximum allowable need
		$need = Need::getNeedByProfileId($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($need);
	}


	/**
	 * test grabbing a need by need title
	 */

public function testGetNeedByNeedTitle() {

		// count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("need");

	// create a new Need and insert into mySQL
	$need = new Need(null, $this->needTitle->getNeedTitle(), $this->VALID_NEEDDESCRIPTION, $this->VALID_NEEDTITLE, $this->VALID_NEEDFULFILLED);
	$need->insert($this->getPDO());

	// grab the data from mySQL and enforce the fields match our expectations
	$pdoNeed = Need::getNeedByNeedTitle($this->getPDO(), $need->getNeedTitle());
	$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("need"));
	$this->assertSame($pdoNeed->getProfileId(), $need->getProfileId());
	$this->assertSame($pdoNeed->getNeedDescription(), $this->VALID_NEEDDESCRIPTION);
	$this->assertSame($pdoNeed->getNeedFulfilled(), $this->VALID_NEEDFULFILLED);
	$this->assertSame($pdoNeed->getNeedTitle(), $this->VALID_NEEDTITLE);
}

	/**
	 * test grabbing a Need by a Title that does not exist
	 **/
	public function testGetInvalidNeedByNeedTitle() {

		// grab a Need that exceeds the maximum allowable need
		$need = Need::getNeedByNeedTitle($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($need);
		}

}


