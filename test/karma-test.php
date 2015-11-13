<?php

// grab the project test paramaters
require_once("karmadatadesign.php");

//grab the class under scutiny
require_once(dirname(__DIR__) . "/public_html/php/classes/karma.php");
require_once(dirname(__DIR__) . "/public_html/php/classes/profile.php");
require_once(dirname(__DIR__) . "/public_html/php/classes/need.php");

/**
 * full php unit test for the karma class
 *
 * @see Karma
 * @auther Jennifer Hung <jhung@cnm.edu>
 *
 */
class KarmaTest extends karmadatadesign {
	protected $VALID_KARMAACCEPTED = "1";
	/**
	 * timestamp of the Karma; this starts as null and is assigned later
	 * @var DateTime $VALID_KARMAACTIONDATE
	 **/
	protected $VALID_KARMAACTIONDATE = null;
	/**
	 * Profile that sent recieved karma; this is for foreign key relations
	 * @var int $VALID_PROFILE_ID
	 *
	 **/
	protected $profile = null;
	/**
	 * need that was fulfilled, this is for foreign key relations
	 * @var int $VALID_NEED_ID
	 **/
	protected $need = null;

/** set up dependant objects before running each test */
	public final function setUp() {
		//run default setUp() method first
		parent::setUp();
		//create a karmaAccepted and karmaActionDate for test
		$this->VALID_KARMAACTIONDATE = new DateTime();
		//Generate string for karma actiond date
		$str = "Hello";
		echo md5($str);

		// Create a member
		$this->member=new Member(null, "s", "ddkarmabear@gmail.com"  );
		// insert it into the database

		//create a valid profile to own the test Karma
		// $newProfileId, $newMemberId, $newProfileBlurb, $newProfileHandle, $newProfileFirstName, $newProfileLastName, $newInputTagName
		$this->profile = new Profile(null, "Ralph", "I like cats", "CoolRalph, Smith", "img/kitten.jpg");
		$this->profile->insert($this->getPDO());

		//create a valid need to reference in test

		$this->need = new Need(null, $this->profile->getProfileId(), "A ride to school Monday");
		$this->need->insert($this->getPDO());
	}

	/**
	 * test inserting a valid Karma and verify that the actual mySQL data matches
	 **/
	public function testInsertValidKarma() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");

		// create a new Profile and insert to into mySQL
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED(),
			$this->VALID_KARMAACTIONDATE());
		$karma->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoKarma = Karma::getKarmaByProfileIdAndNeedId($this->getPDO(), ($this->getProfileId() && $this->getNeedId()));
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma->getProfileIdAndNeedId(), $this->profile->getProfileId() && $this->need->getNeedId());
		$this->assertSame($pdoKarma->getAtKarmaAccepted(), $this->VALID_ATKARMAACCEPTED);
		$this->assertSame($pdoKarma->getKarmaActionDatel(), $this->VALID_KARMAACTIONDATE);
	}

	/**
	 * test inserting a Karma that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidKarma() {
		// create a profile with a non null profileId and watch it fail
		$karma = new Karma(DataDesignTest::INVALID_KEY, $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());
	}

	/**
	 * test inserting a Karma, editing it, and then updating it
	 **/
	public function testUpdateValidKarma() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");

		// create a new Karma and insert to into mySQL
		$karma = new Karma(null, $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoKarma = Karma::getKarmaByProfileIdAndNeedId($this->getPDO(), ($this->getProfileId() && $this->getNeedId()));
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma->getProfileId(), $this->member->getProfileId());
		$this->assertSame($pdoKarma->getNeedId(), $this->need > getNeedId());
		$this->assertSame($pdoKarma->getKarmaAccepted(), $this->VALID_KARMAACCEPTED);
		$this->assertSame($pdoKarma->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);
	}

	/**
	 * test creating a Karma and then deleting it
	 **/
	public function testDeleteValidKarma() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");
		// create a new Volunteer and insert to into mySQL
		$karma = new Karma(null, $this->profileId->getProfileId(), $this->needId->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());
		//delete the Volunteer from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$karma->delete($this->getPDO());
		//grab the data from mySQL and enforce the Volunteer does not exist
		$pdoKarma = Karma::getKarmaByProfileIdAndNeedId($this->getPDO(), ($this->getProfileId() && $this->getNeedId()));
		$this->assertNull($pdoKarma);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("karma"));
	}

	/**
	 * test grabbing a karma by a profile id that does not exist
	 */
	public function testGetInvalidVolunteerByProfileId() {
		//grab an organization that does not exists
		$karma = Karma::getKarmaByProfileId($this->getPDO(), "10000000000000000");
		$this->assertSame($karma > getSize(), 0);
	}


	/**
	 * test grabbing a karma by an need id  that does not exist
	 */
	public function testGetInvalidKarmaByNeedIdl() {
		//grab an email that does not exist
		$karma = Karma::getKarmaByNeedId($this->getPDO(), "200000000000000");
		$this->assertSame($karma->getSize(), 0);
	}

	/**
	 * test grabbing a karma by a invalid boolean
	 */
	public function testGetInvalidKarmaByKarmaAccepted() {
		//grab an email that does not exist
		$karma = Karma::getKarmaByNKarmaAccepted($this->getPDO(), "3");
		$this->assertSame($karma->getSize(), 0);
	}

	/**
	 * test grabbing a karma by a invalid action date
	 */

	public function testGetInvalidKarmaByKarmaActionDate() {
		//grab a karma by a karma action date that does not exist
		$karma = Karma::getKarmaByKarmaActionDate($this->getPDO(), "November 14, 2020");
		$this->assertSame($karma->getSize(), 0);
	}

	/**
	 * test grabbing a valid karma by a karma accepted boolean
	 */

	public function testGetValidKarmaByKarmaAccepted() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");
		// create a new Karma and insert to into mySQL
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());

		/**
		 * test grabbing a valid karma by a karma accepted boolean
		 */
		$pdoKarma = Karma::getKarmaByKarmaAccepted($this->getPDO(), $karma->getKarmaAccepted());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma[0]->getProfileId(), $this->profile > getProfileId());
		$this->assertSame($pdoKarma[0]->getNeedIdl(), $this->need->getNeedId());
		$this->assertSame($pdoKarma[0]->getKarmaAccepted(), $this->VALID_KARMAACCEPTED);
		$this->assertSame($pdoKarma[0]->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);
	}

	/**
	 * test grabbing a karma by karma action date
	 */
	public function testGetValidKarmaByKarmaActionDate() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");
		// create a new Karma and insert to into mySQL
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());

		/**
		 * grab the data from mySQL and enforce the fields match our expectations
		 */

		$pdoKarma = Karma::getKarmaByKarmaAccepted($this->getPDO(), $karma->getKarmaAccepted());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma[0]->getProfileId(), $this->profile > getProfileId());
		$this->assertSame($pdoKarma[0]->getNeedIdl(), $this->need->getNeedId());
		$this->assertSame($pdoKarma[0]->getKarmaAccepted(), $this->VALID_KARMAACCEPTED);
		$this->assertSame($pdoKarma[0]->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);
	}
}