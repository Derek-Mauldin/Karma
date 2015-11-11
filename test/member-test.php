<?php
require_once("administratortest.php");

/**
* Full PHPUnit test for the Member class
*
* This is a complete PHPUnit test of the Member class. It is complete because *ALL* mySQL/PDO enabled methods
* are tested for both invalid and valid inputs.
*
* @see Member
* @author Jennifer Hung <jhung@cnm.edu>
**/
class MemberTest extends KarmaDataDesignTest {
	/**
	 * valid at email to use
	 * @var string $VALID_ATEMAIL
	 **/
	protected $VALID_ATEMAIL = "@phpunit";

	/**
	 * test inserting a valid Member and verify that the actual mySQL data matches
	 **/
	public function testInsertValidMember() {
// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
		$member=new Member(null, $this->VALID_ATEMAIL);
		$member->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
		$pdoMember = Member::getMemberByMemberId($this->getPDO(), $member->getMemberId());
		$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
		$this->assertSame($pdoMember->getAtEmail(), $this->VALID_ATEMAIL);
	}

/**
* test inserting a Member that already exists
*
* @expectedException PDOException
**/
public function testInsertInvalidMember() {
// create a member with a non null memberId and watch it fail
$member = new Member(DataDesignTest::INVALID_KEY, $this->VALID_ATEMAIL);
$member->insert($this->getPDO());
}

/**
* test inserting a Member, editing it, and then updating it
**/
public function testUpdateValidMember() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
$profile = new Member(null, $this->VALID_ATEMAIL);
$profile->insert($this->getPDO());

// edit the Member and update it in mySQL
$profile->setAtEmail($this->VALID_ATEMAIL);
$profile->update($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
$pdoProfile = Profile::getMemberByMemberId($this->getPDO(), $profile->getMemberId());
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
$this->assertSame($pdoProfile->getAtEmail(), $this->VALID_ATEMAIL);
}

/**
* test updating a Member that does not exist
*
* @expectedException PDOException
**/
public function testUpdateInvalidMember() {
// create a Member and try to update it without actually inserting it
$member = new Member(null, $this->VALID_ATEMAIL);
$member->update($this->getPDO());
}

/**
* test creating a Member and then deleting it
**/
public function testDeleteValidMember() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
$member = new Member(null, $this->VALID_ATEMAIL);
$member->insert($this->getPDO());

// delete the Member from mySQL
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
$member->delete($this->getPDO());

// grab the data from mySQL and enforce the Profile does not exist
$pdoProfile = Profile::getMemberByMemberId($this->getPDO(), $member->getMemberId());
$this->assertNull($pdoProfile);
$this->assertSame($numRows, $this->getConnection()->getRowCount("member"));
}

/**
* test deleting a Member that does not exist
*
* @expectedException PDOException
**/
public function testDeleteInvalidMember() {
// create a Member and try to delete it without actually inserting it
$member = new Member(null, $this->VALID_ATEMAIL);
$member->delete($this->getPDO());
}

/**
* test inserting a Member and regrabbing it from mySQL
**/
public function testGetValidMemberByMemberId() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
$member = new Member(null, $this->VALID_ATEMAIL);
$member->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
$pdoProfile = Profile::getMemberByMemberId($this->getPDO(), $member->getMemberId());
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
$this->assertSame($pdoProfile->getAtHandle(), $this->VALID_ATEMAIL);
}

/**
* test grabbing a Member that does not exist
**/
public function testGetInvalidMemberByMemberId() {
// grab a member id that exceeds the maximum allowable member id
$member = Member::getMemberByMemberId($this->getPDO(), DataDesignTest::INVALID_KEY);
$this->assertNull($member);
}

public function testGetValidMemberByAtEmail() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
$member = new Member(null, $this->VALID_ATEMAIL);
$member->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
$pdoMember = Member::getMemberByAtEmail($this->getPDO(), $this->VALID_ATEMAIL);
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
$this->assertSame($pdoMember->getAtEmail(), $this->VALID_ATEMAIL);
}

/**
* test grabbing a Member by at email that does not exist
**/
public function testGetInvalidMemberByAtEmail() {
// grab an at email that does not exist
$member = Member::getmemberByAtHandle($this->getPDO(), "@doesnotexist");
$this->assertNull($member);
}

/**
* test grabbing a Member by email
**/
public function testGetValidMemberByEmail() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("member");

// create a new Member and insert to into mySQL
$member = new Member(null, $this->VALID_ATEMAIL);
$member->insert($this->getPDO());

// grab the data from mySQL and enforce the fields match our expectations
$pdoMember = Member::getMemberByEmail($this->getPDO(), $this->VALID_EMAIL);
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("member"));
$this->assertSame($pdoMember->getAtEmail(), $this->VALID_ATEMAIL);
}

/**
* test grabbing a Member by an email that does not exists
**/
public function testGetInvalidMemberByEmail() {
// grab an email that does not exist
$member = Member::getMemberByEmail($this->getPDO(), "does@not.exist");
$this->assertNull($member);
}
}


