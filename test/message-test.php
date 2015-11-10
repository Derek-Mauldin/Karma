<?php
// grab the project test parameters
require_once("karma.php");

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
class MessageTest extends DataDesignTest {

/**
 * valid messagesender to use
 * @var string $VALID_MESSAGESENDER
 **/
protected $VALID_MESSAGESENDER = "@phpunit";
/**
 * second valid messagereceiver to use
 * @var string $VALID_MESSAGERECEIVER
 **/
protected $VALID_MESSAGERECEIVER = "@passingtests";
/**
 * valid email to use
 * @var string $VALID_EMAIL
 **/
protected $VALID_EMAIL = "test@phpunit.de";
/**
 * valid phone number to use
 * @var string $VALID_PHONE
 **/
protected $VALID_PHONE = "+12125551212";

/**
 * test inserting a valid Profile and verify that the actual mySQL data matches
 **/
public function testInsertValidProfile() {
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

}