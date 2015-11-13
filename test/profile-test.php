<?php

// grab the project test parameters
require_once("karma-data-design.php");

// grab the class under scrutiny
require_once(dirname(__DIR__)) . "/public_html/php/classes/profile.php";

// grab parent class
require_once(dirname(__DIR__)) ."/public_html/php/classes/member.php";


/**
 * Full PHPUnit test for the Profile class  Karma Project
 *
 * This is a complete PHPUnit test of the Profile class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see profile
 * @author Derek Mauldin <dmauldin2@cnm.edu>  Dylan McDonald <dmcdonald21@cnm.edu>
 **/
class profileTest extends karmaDataDesign {
	/**
	 * valid member (parent class) to use
	 * @var mixed $aMember;
	 **/
	protected $aMember = null;
	/**
	 * valid profileBlurb to ues
	 * @var string $VALID_PROFILE_BLURB
	 **/
	protected $VALID_PROFILE_BLURB = "This is a profile blurb";
	/**
	 * valid profileHandle to use
	 * @var string $VALID_PROFILE_HANDLE
	 **/
	protected $VALID_PROFILE_HANDLE = "@karmaHandleTest";
	/**
	 * valid 2nd profileHandle to use
	 * @var string $VALID_PROFILE_HANDLE_2
	 **/
	protected $VALID_PROFILE_HANDLE_2 = "@karmaHandleTest 2";
	/**
	 * valid first name to use
	 * @var string $VALID_PROFILE_FIRST_NAME
	 **/
	protected $VALID_PROFILE_FIRST_NAME = "Derek";
	/**
	 * valid last name to use
	 * @var string $VALID_PROFILE_LAST_NAME
	 **/
	protected $VALID_PROFILE_LAST_NAME = "Mauldin";
	/**
	 * valid profile photo path to use
	 * @var string $VALID_PROFILE_PHOTO
	 **/
	protected $VALID_PROFILE_PHOTO = "/var/www/html/public_html/karma/avatars/avatar-test.png";
	/**
	 * valid profile photo type to use
	 * @var string $VALID_PROFILE_PHOTO_TYPE
	 **/
	protected $VALID_PROFILE_PHOTO_TYPE = "image/png";

	/**
	 * set up for dependent objects before running each test
	 */
	public final function setUp() {
		//run default setUp() method first
		parent::setUp();


		//create a valid member to reference in test
		$this->aMember = new Member(null, "s", "somebody@mymail.com", "emailActivate", "fakeHash", "fakeSalt");
		$this->aMember->insert($this->getPDO());
	}



	/**
	 * test inserting a valid profile and verify that the actual mySQL data matches
	 **/
	public function testInsertValidProfile() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE, $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, $this->VALID_PROFILE_PHOTO, $this->VALID_PROFILE_PHOTO_TYPE);
		$profile->insertProfile($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATHANDLE);
		$this->assertSame($pdoProfile->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoProfile->getPhone(), $this->VALID_PHONE);
	}

	/**
	 * test inserting a Profile that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidProfile() {
		// create a profile with a non null profileId and watch it fail
		$profile = new Profile(DataDesignTest::INVALID_KEY, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());
	}

	/**
	 * test inserting a Profile, editing it, and then updating it
	 **/
	public function testUpdateValidProfile() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());

		// edit the Profile and update it in mySQL
		$profile->setAtHandle($this->VALID_ATHANDLE2);
		$profile->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATHANDLE2);
		$this->assertSame($pdoProfile->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoProfile->getPhone(), $this->VALID_PHONE);
	}

	/**
	 * test updating a Profile that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidProfile() {
		// create a Profile and try to update it without actually inserting it
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->update($this->getPDO());
	}

	/**
	 * test creating a Profile and then deleting it
	 **/
	public function testDeleteValidProfile() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());

		// delete the Profile from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$profile->delete($this->getPDO());

		// grab the data from mySQL and enforce the Profile does not exist
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertNull($pdoProfile);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("profile"));
	}

	/**
	 * test deleting a Profile that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidProfile() {
		// create a Profile and try to delete it without actually inserting it
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->delete($this->getPDO());
	}

	/**
	 * test inserting a Profile and regrabbing it from mySQL
	 **/
	public function testGetValidProfileByProfileId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATHANDLE);
		$this->assertSame($pdoProfile->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoProfile->getPhone(), $this->VALID_PHONE);
	}

	/**
	 * test grabbing a Profile that does not exist
	 **/
	public function testGetInvalidProfileByProfileId() {
		// grab a profile id that exceeds the maximum allowable profile id
		$profile = Profile::getProfileByProfileId($this->getPDO(), DataDesignTest::INVALID_KEY);
		$this->assertNull($profile);
	}

	public function testGetValidProfileByAtHandle() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByAtHandle($this->getPDO(), $this->VALID_ATHANDLE);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATHANDLE);
		$this->assertSame($pdoProfile->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoProfile->getPhone(), $this->VALID_PHONE);
	}

	/**
	 * test grabbing a Profile by at handle that does not exist
	 **/
	public function testGetInvalidProfileByAtHandle() {
		// grab an at handle that does not exist
		$profile = Profile::getProfileByAtHandle($this->getPDO(), "@doesnotexist");
		$this->assertNull($profile);
	}

	/**
	 * test grabbing a Profile by email
	 **/
	public function testGetValidProfileByEmail() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->VALID_ATHANDLE, $this->VALID_EMAIL, $this->VALID_PHONE);
		$profile->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByEmail($this->getPDO(), $this->VALID_EMAIL);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATHANDLE);
		$this->assertSame($pdoProfile->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoProfile->getPhone(), $this->VALID_PHONE);
	}

	/**
	 * test grabbing a Profile by an email that does not exists
	 **/
	public function testGetInvalidProfileByEmail() {
		// grab an email that does not exist
		$profile = Profile::getProfileByEmail($this->getPDO(), "does@not.exist");
		$this->assertNull($profile);
	}
}
