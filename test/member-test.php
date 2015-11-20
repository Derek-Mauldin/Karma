<?php
//grab the test parameters
require_once ("karmadatadesign.php");

//grab the class to test
require_once(dirname(__DIR__) . "/public_html/php/classes/member.php");

/**
* Full PHPUnit test for the Member class
*
* This is a complete PHPUnit test of the Member class. It is complete because *ALL* mySQL/PDO enabled methods
* are tested for both invalid and valid inputs.
*
* @see Member
* @author Evan Smith <esmith49@cnm.edu>
**/

class MemberTest extends KarmaDataDesign{

	/**
	 * Valid access level for the class
	 *
	 * @var string $VALID_ACCESS_LEVEL
	 */
	protected $VALID_ACCESS_LEVEL = "S";

	/**
	 * valid at email to use
	 *
	 * @var string $VALID_EMAIL
	 **/
	protected $VALID_EMAIL = "exp@example.com";

	/**
	 * Valid email activation code for the test
	 *
	 * @var int $VALID_EMAIL_ACTIVATION
	 */
	protected $VALID_EMAIL_ACTIVATION = '1234567890123456';

	/**
	 * Valid password hash to use in the test
	 *
	 * @var $VALID_HASH
	 */
	protected $VALID_HASH;

	/**
	 * Valid salt to use for the test
	 *
	 * @var $VALID_SALT
	 */
	protected $VALID_SALT;

	public final function setUp(){
		parent::setUp();

		$this->VALID_SALT = bin2hex(openssl_random_pseudo_bytes(32));
		$this->VALID_HASH = hash_pbkdf2("sha512", "password1234", $this->VALID_SALT, 262144, 128);
	}

	/**
	 * test inserting a valid Member and verify that the actual mySQL data matches
	 **/
	public function testInsertValidMember() {
// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
		$member=new Member(null, $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
		$pdoMember = Member::getMemberByMemberId($this->getPDO(), $member->getMemberId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$this->assertSame($pdoMember->getAccessLevel(), $this->VALID_ACCESS_LEVEL);
		$this->assertSame($pdoMember->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoMember->getEmailActivation(),$this->VALID_EMAIL_ACTIVATION);
		$this->assertSame($pdoMember->getPasswordHash(),$this->VALID_HASH);
		$this->assertSame($pdoMember->getSalt(),$this->VALID_SALT);
	}

	/**
	* test inserting a Member that already exists
	*
	* @expectedException PDOException
	**/
	public function testInsertInvalidMember() {
		// create a member with a non null memberId and watch it fail
		$member = new Member(KarmaDataDesign::INVALID_KEY, $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());
	}

	/**
	 * test inserting an invalid access level
	 *
	 * @expectedException Exception
	 */
	public function testInsertInvalidAccessLevel() {

		// create a member with a non null memberId and watch it fail
		$member = new Member(null, "z", $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());
		$this->assertNull($member);

		}


	/**
	* test inserting a Member, editing it, and then updating it
	**/


	public function testUpdateValidMember() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

		// create a new Member and insert to into mySQL
		$profile = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$profile->insert($this->getPDO());

		// edit the Member and update it in mySQL
		$profile->setEmail($this->VALID_EMAIL);
		$profile->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMember = Member::getMemberByMemberId($this->getPDO(), $profile->getMemberId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$this->assertSame($pdoMember->getAccessLevel(), $this->VALID_ACCESS_LEVEL);
		$this->assertSame($pdoMember->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoMember->getEmailActivation(), $this->VALID_EMAIL_ACTIVATION);
		$this->assertSame($pdoMember->getPasswordHash(), $this->VALID_HASH);
		$this->assertSame($pdoMember->getSalt(), $this->VALID_SALT);
	}


	/**
	* test updating a Member that does not exist
	*
	* @expectedException PDOException
	**/
	public function testUpdateInvalidMember() {
		// create a Member and try to update it without actually inserting it
		$member = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->update($this->getPDO());
	}

	/**
	* test creating a Member and then deleting it
	**/
	public function testDeleteValidMember() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

		// create a new Member and insert to into mySQL
		$member = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());

		// delete the Member from mySQL
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$member->delete($this->getPDO());

		// grab the data from mySQL and enforce the Member does not exist
		$pdoMember = Member::getMemberByMemberId($this->getPDO(), $member->getMemberId());
		$this->assertNull($pdoMember);
		$this->assertSame($numRows, $this->getConnection()->getRowCount("member"));
	}

	/**
	* test deleting a Member that does not exist
	*
	* @expectedException PDOException
	**/
	public function testDeleteInvalidMember() {
		// create a Member and try to delete it without actually inserting it
		$member = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->delete($this->getPDO());
	}

	/**
	* test inserting a Member and regrabbing it from mySQL
	**/
	public function testGetValidMemberByMemberId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

		// create a new Member and insert to into mySQL
		$member = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMember = Member::getMemberByMemberId($this->getPDO(), $member->getMemberId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$this->assertSame($pdoMember->getAccessLevel(), $this->VALID_ACCESS_LEVEL);
		$this->assertSame($pdoMember->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoMember->getEmailActivation(), $this->VALID_EMAIL_ACTIVATION);
		$this->assertSame($pdoMember->getPasswordHash(), $this->VALID_HASH);
		$this->assertSame($pdoMember->getSalt(), $this->VALID_SALT);
	}

	/**
	* test grabbing a Member that does not exist
	**/
	public function testGetInvalidMemberByMemberId() {
		// grab a member id that exceeds the maximum allowable member id
		$member = Member::getMemberByMemberId($this->getPDO(), KarmaDataDesign::INVALID_KEY);
		$this->assertNull($member);
	}

	/**
	 * Test grabbing a Member by their email
	 */
	public function testGetValidMemberByEmail() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

		// create a new Member and insert to into mySQL
		$member = new Member(null,  $this->VALID_ACCESS_LEVEL, $this->VALID_EMAIL, $this->VALID_EMAIL_ACTIVATION, $this->VALID_HASH, $this->VALID_SALT);
		$member->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoMember = Member::getMemberByEmail($this->getPDO(), $this->VALID_EMAIL);
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$this->assertSame($pdoMember->getAccessLevel(), $this->VALID_ACCESS_LEVEL);
		$this->assertSame($pdoMember->getEmail(), $this->VALID_EMAIL);
		$this->assertSame($pdoMember->getEmailActivation(), $this->VALID_EMAIL_ACTIVATION);
		$this->assertSame($pdoMember->getPasswordHash(), $this->VALID_HASH);
		$this->assertSame($pdoMember->getSalt(), $this->VALID_SALT);
	}

	/**
	* Test grabbing a Member by at email that does not exist
	**/
	public function testGetInvalidMemberByEmail() {
		// grab an at email that does not exist
		$member = Member::getMemberByEmail($this->getPDO(), $this->VALID_EMAIL);
		$this->assertNull($member);
	}

}


