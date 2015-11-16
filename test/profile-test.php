<?php

// grab the project test parameters
require_once("karmadatadesign.php");

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
class profileTest extends KarmaDataDesign {
	/**
	 * valid member (parent class) to use
	 * @var Member $aMember;
	 **/
	protected $aMember = null;
	/**
	 * valid profileBlurb to ues
	 * @var string $VALID_PROFILE_BLURB
	 *
	 *
	 *
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
	protected $VALID_PROFILE_PHOTO = null;
	/**
	 * valid profile photo type to use
	 * @var string $VALID_PROFILE_PHOTO_TYPE
	 **/
	protected $VALID_PROFILE_PHOTO_TYPE = null;

	/*
	 * salt to use for member entity creation
	 * @var string $salt
	 */
	protected $salt = null;

	/*
	 * hash to use for member class creation
	 * @var string $hash
	 */
	protected $hash = null;

	/*
	 * fake email activation to use for member class creation
	 * @var string $fEmailActivate
	 */
	protected $fEmailActivate = "23456789abcedf01234567891bcdef01";


	/**
	 * set up for dependent objects before running each test
	 */
	public final function setUp() {

		//run default setUp() method first
		parent::setUp();

		$this->salt = bin2hex(openssl_random_pseudo_bytes(32));
		$this->hash = hash_pbkdf2("sha512", "dmauldin" ,$this->salt, 4096, 128);


		//create a valid member to reference in test
		$this->aMember = new Member(null, "s", "somebody@mymail.com", $this->fEmailActivate, $this->hash, $this->salt);
		$this->aMember->insert($this->getPDO());
	}



	/**
	 * test inserting a valid profile and verify that the actual mySQL data matches
	 **/
	public function testInsertValidProfile() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);

		$profile->insertProfile($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());

		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getProfileId(), $profile->getProfileId());
		$this->assertSame($pdoProfile->getMemberId(), $this->aMember->getMemberId());
		$this->assertSame($pdoProfile->getProfileBlurb(), $this->VALID_PROFILE_BLURB);
		$this->assertSame($pdoProfile->getProfileHandle(), $this->VALID_PROFILE_HANDLE);
		$this->assertSame($pdoProfile->getProfileFirstName(), $this->VALID_PROFILE_FIRST_NAME);
		$this->assertSame($pdoProfile->getProfileLastName(), $this->VALID_PROFILE_LAST_NAME);
		$this->assertSame($pdoProfile->getProfilePhoto(), $this->VALID_PROFILE_PHOTO);
		$this->assertSame($pdoProfile->getProfilePhotoType(), $this->VALID_PROFILE_PHOTO_TYPE);

	}

	/**
	 *  test inserting a profile that already exists
	 *
	 * @expectedException PDOException
	 */
	public function testInsertExistingProfile() {

		// create a new profile and insert into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insertProfile($this->getPDO());

		// try inserting the profile again and watch it fail
		$profile->insertProfile($this->getPDO());

	}

	/**
	 * test grabbing a Profile that does not exist
	 **/
	public function testGetInvalidProfileByProfileId() {

		// grab a profile id that exceeds the maximum allowable profile id
		$profile = Profile::getProfileByProfileId($this->getPDO(), KarmaDataDesign::INVALID_KEY);

		$this->assertNull($profile);

	}

	/**
	 * test inserting an invalid profileId
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidProfile() {

		// create a profile with a non null profileId and watch it fail
		$profile = new Profile(KarmaDataDesign::INVALID_KEY, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insertProfile($this->getPDO());

	}

	/**
	 * test inserting a Profile, editing it, and then updating it
	 **/
	public function testUpdateValidProfile() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insertProfile($this->getPDO());

		// edit the Profile and update it in mySQL
		$profile->setProfileHandle($this->VALID_PROFILE_HANDLE_2);
		$profile->updateProfile($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getProfileId(), $profile->getProfileId());
		$this->assertSame($pdoProfile->getMemberId(), $this->aMember->getMemberId());
		$this->assertSame($pdoProfile->getProfileBlurb(), $this->VALID_PROFILE_BLURB);
		$this->assertSame($pdoProfile->getProfileHandle(), $this->VALID_PROFILE_HANDLE_2);
		$this->assertSame($pdoProfile->getProfileFirstName(), $this->VALID_PROFILE_FIRST_NAME);
		$this->assertSame($pdoProfile->getProfileLastName(), $this->VALID_PROFILE_LAST_NAME);
		$this->assertSame($pdoProfile->getProfilePhoto(), $this->VALID_PROFILE_PHOTO);
		$this->assertSame($pdoProfile->getProfilePhotoType(), $this->VALID_PROFILE_PHOTO_TYPE);

	}

	/**
	 * test updating a Profile that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidProfile() {

		// create a Profile and try to update it without actually inserting it
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);

		$profile->updateProfile($this->getPDO());

	}

	/**
	 * test creating a Profile and then deleting it
	 **/
	public function testDeleteValidProfile() {

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insertProfile($this->getPDO());

		// delete the Profile from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$profile->deleteProfile($this->getPDO());

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
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);

		$profile->deleteProfile($this->getPDO());

	}


	/**
	 * test grabbing a profile by profileHandle
	 */
	public function testGetValidProfileByAtHandle() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileHandle($this->getPDO(), $this->VALID_PROFILE_HANDLE);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getProfileId(), $profile->getProfileId());
		$this->assertSame($pdoProfile->getMemberId(), $this->aMember->getMemberId());
		$this->assertSame($pdoProfile->getProfileBlurb(), $this->VALID_PROFILE_BLURB);
		$this->assertSame($pdoProfile->getProfileHandle(), $this->VALID_PROFILE_HANDLE);
		$this->assertSame($pdoProfile->getProfileFirstName(), $this->VALID_PROFILE_FIRST_NAME);
		$this->assertSame($pdoProfile->getProfileLastName(), $this->VALID_PROFILE_LAST_NAME);
		$this->assertSame($pdoProfile->getProfilePhoto(), $this->VALID_PROFILE_PHOTO);
		$this->assertSame($pdoProfile->getProfilePhotoType(), $this->VALID_PROFILE_PHOTO_TYPE);

	}

	/**
	 * test grabbing a Profile by A profileHandle that does not exist
	 **/
	public function testGetInvalidProfileByAtHandle() {

		// grab an a profileHandle that does not exist
		$profile = Profile::getProfileByProfileHandle($this->getPDO(), "doesnotexist");

		$this->assertNull($profile);

	}

	/**
	 * test grabbing a Profile by member ID
	 **/
	public function testGetValidProfileByMemberId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);
		$profile->insertProfile($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByMemberId($this->getPDO(), $this->aMember->getMemberId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertSame($pdoProfile->getProfileId(), $profile->getProfileId());
		$this->assertSame($pdoProfile->getMemberId(), $this->aMember->getMemberId());
		$this->assertSame($pdoProfile->getProfileBlurb(), $this->VALID_PROFILE_BLURB);
		$this->assertSame($pdoProfile->getProfileHandle(), $this->VALID_PROFILE_HANDLE);
		$this->assertSame($pdoProfile->getProfileFirstName(), $this->VALID_PROFILE_FIRST_NAME);
		$this->assertSame($pdoProfile->getProfileLastName(), $this->VALID_PROFILE_LAST_NAME);
		$this->assertSame($pdoProfile->getProfilePhoto(), $this->VALID_PROFILE_PHOTO);
		$this->assertSame($pdoProfile->getProfilePhotoType(), $this->VALID_PROFILE_PHOTO_TYPE);

	}

	/**
	 * test grabbing a Profile by a member ID that does not exist
	 **/
	public function testGetInvalidProfileByMemberId() {

		// create a new profile and try retrieving it without inserting
		$profile = new Profile(null, $this->aMember->getMemberId(), $this->VALID_PROFILE_BLURB, $this->VALID_PROFILE_HANDLE,
				                 $this->VALID_PROFILE_FIRST_NAME, $this->VALID_PROFILE_LAST_NAME, null);

		$profile->getProfileByMemberId($this->getPDO(), $this->aMember->getMemberId());

		$this->assertNull($profile);

	}
}
