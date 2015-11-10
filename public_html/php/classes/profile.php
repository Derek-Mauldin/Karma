<?php


require_once(dirname(dirname(__DIR__)) . "lib/php/date-utils.php");



/**
 *	user profile class for karma
 *
 *	contains all the attributes that will allow a user to interact with the karma site
 *
 * @author Derek Mauldin <dmauldin2@cnm.edu>
 **/

class profile {

	/**
	 * PRIMARY KEY - ID for this profile
	 *
	 * @var $profileId
	 **/
	private $profilId;

	/**
	 * FOREIGN KEY - memberId that this profile references
	 *
	 * @var $memberId
	 **/
	private $memberId;

	/**
	 * Blurb/description for this profile
	 *
	 * @var $profileBlurb
	 **/
	private $profileBlurb;

	/**
	 * profileHandle aka userName of this profile
	 *
	 * @var $profileHandle
	 **/
	private $profileHandle;

	/**
	 * First name of this user
	 *
	 * @var $profileFirstName
	 **/
	private $profileFirstName;

	/**
	 * Last name of this user
	 *
	 * @var $profileLastName
	 **/
	private $profileLastName;

	/**
	 * profile photo for this profile
	 *
	 * @var $profilePhoto
	 **/
	private $profilePhoto;



	/**
	 * accessor method for profileId
	 *
	 * @return mixed -- value of this profile ID
	 **/
	public function getProfileId() {

		return($this->profilId);

	}


	/**
	 * accessor method for memberId
	 *
	 * @return mixed -- value of this profiles member ID
	 **/
	public function getMemberId() {

		return($this->memberId);

	}

	/**
	 * accessor method for profileBlurb
	 *
	 * @return string -- contents of this profileBlurb
	 **/
	public function getProfileBlurb() {

		return($this->profileBlurb);

	}

	/**
	 * acessor method for profileHandle
	 *
	 * @return string -- this profile handle/user name
	 **/
	public function getProfileHandle() {

		return($this->profileHandle);
	}

	/**
	 * accessor method for profile first name
	 *
	 * @return string -- this profile first name
	 **/
	public function getProfileFirstName() {

		return($this->profileFirstName);

	}


	/**
	 * accessor method for profile last name
	 *
	 * @return string -- this profile last name
	 **/
	public function  getProfLastName() {

		return($this->profileLastName);

	}

	/**
	 * accessor method for profile photo
	 *
	 *@return mixed -- path to profile photo
	 **/
	prublic function getProfilePhoto() {

	// code goes here
}






}