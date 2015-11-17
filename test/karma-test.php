<?php

// grab the project test paramaters
require_once("karmadatadesign.php");

//grab the class under scutiny
require_once(dirname(__DIR__) . "/public_html/php/classes/autoload.php");

/**
 * full php unit test for the karma class
 *
 * @see Karma
 * @auther Jennifer Hung <jhung@cnm.edu>
 *
 */

class KarmaTest extends KarmaDataDesign {

	/**
	 * Member that owns the profile that recieved karma, the foreign key to profile
	 * @var Member $member
	 */

	protected $member = null;

	/**
	 * need that was fulfilled, this is for foreign key relations
	 * @var  Need $need
	 **/
	protected $need = null;
	/**
	 * @var string $salt
	 */

	protected $VALID_SALT;
	/**
	 * @var string $hash
	 */

	protected $VALID_HASH;
	/**
	 * Profile that sent recieved karma; this is for foreign key relations
	 * @var Profile $profile
	 **/
	protected $profile = null;

	/**
	 * @var boolean of the karma
	 */

	protected $VALID_KARMAACCEPTED = null;

	/**
	 * timestamp of the Karma; this starts as null and is assigned later
	 * @var DateTime $VALID_KARMAACTIONDATE
	 **/

	protected $VALID_KARMAACTIONDATE = null;


	/** set up dependant objects before running each test */
	public final function setUp() {
		//run default setUp() method first
		parent::setUp();
		//create salt and hash for test
		$this->salt = bin2hex(openssl_random_pseudo_bytes(32));
		$this->hash = hash_pbkdf2("sha512", "testpassword", $this->salt, 4096, 128);


		// Create a member to reference in test
		$this->member = new Member(null, "s", "ddkarmabear@gmail.com", "e1f6a14cd07069692017b53a8ae881f6", $this->VALID_HASH, $this->VALID_SALT);
		// insert it into the database
		$this->member->insert($this->getPDO());


		//create a valid profile to own the test Karma
		$this->profile = new Profile(null, $this->member->getMemberId(), "I like cats", "CoolRalph", "Ralph", "Smith", null);
		$this->profile->insertProfile($this->getPDO());

		//create a valid need to reference in test

		$this->need = new Need($this->member->getMemberId(), $this->profile->getProfileId(), "A ride to school Monday");
		$this->need->insert($this->getPDO());

	}

	/**
	 * test inserting a valid Karma and verify that the actual mySQL data matches
	 **/
	public function testInsertValidKarma() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");

		// create a new Karma and insert to into mySQL
		$karma = new Karma($this->member->getMemberId(), $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED,
				$this->VALID_KARMAACTIONDATE);

		//grab the data from mySQL and enforce the fields match our expectations
		Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), $this->need->getNeedId(), $this->profile->getProfileId());

		$karma->insert($this->getPDO());

		$pdoKarma=Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), $this->need->getNeedId(), $this->profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma->getProfileId(), $this->profile->getProfileId() && $this->need->getNeedId());
		$this->assertSame($pdoKarma->getatKarmaAccepted(), $this->VALID_KARMAACCEPTED);
		$this->assertSame($pdoKarma->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);
	}

	/**
	 * test inserting a Karma that already exists
	 *
	 * @expectedException PDOException
	 **/

	public function testInsertInvalidKarma() {
		// create karma with a non null karmaAccepted and watch it fail
		$karma = new Karma(KarmaDataDesign::INVALID_KEY, $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());
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
		$pdoKarma=Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), $this->need->getNeedId(), $this->profile->getProfileId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$this->assertSame($pdoKarma->getProfileId(), $this->profile->getProfileId());
		$this->assertSame($pdoKarma->getNeedId(), $this->need->getNeedId());

		$this->assertSame($pdoKarma->getKarmaAccepted(), $this->VALID_KARMAACCEPTED);
		$this->assertSame($pdoKarma->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);
	}

	/**
	 * test creating a Karma and then deleting it
	 **/
	public function testDeleteValidKarma() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("karma");
		// create a new Karma and insert to into mySQL
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());
		//delete the Karma from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
		$karma->delete($this->getPDO());

		//grab the data from mySQL and enforce the Karma does not exist
		$karma = Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), $this->need->getNeedId(), $this->profile->getProfileId());
		$karma->$this->getPDO();
		$this->assertNull($karma);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("karma"));
	}

	/**
	 * test grabbing a karma by invalid need id
	 * @expectedException PDOException
	 */
	public function testGetInvalidByNeedId() {
		//create a new karma
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());

		//test to retrieve karma with an invalid need id
		Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), KarmaDataDesign::INVALID_KEY, $karma->getProfileId());
	}

	/**
	 * test grabbing a karma by invalid profile id
	 * @expectedException PDOException
	 */
	public function testGetInvalidByProfileId() {
		//create a new karma
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());

		//test to retrieve karma with an invalid need id
		Karma::getKarmaByNeedIdAndProfileId($this->getPDO(), $karma->getNeedId(), KarmaDataDesign::INVALID_KEY);
	}

	/**
	 * test grabbing a karma by a invalid boolean
	 * @expectedException PDOException
	 */
	public function testGetInvalidKarmaByKarmaAccepted() {
		//create a new karma
		$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
		$karma->insert($this->getPDO());
		//grab an karma with a invalid karma accepted boolean
		Karma::getKarmaByKarmaAccepted($this->getPDO(), "3");
	}
}





