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
	private $profileId;

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

		return($this->profileId);

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
	public function getProfilePhoto() {

	// code goes here
}


	/**
	 * mutator method for profileId
	 *
	 * @param $newProfileId -- ID value of new Profile ID
	 * @throws InvalidArgumentException if newProfileId is not an integer
	 * @throws RangeException if newProfileId is not positive
	 *
	 **/
	public function setProfileId($newProfileId) {

		// base case: if the newProfileId is null, this is a new profile without a mySQL assigned ID
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}

		// validate that the new Profile ID is an integer
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new InvalidArgumentException("Profile ID is not a valid integer"));
		}

		// validate that the new Profile ID is positive
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID is not positive"));
		}

		// final check and store
		$this->profileId = intval($newProfileId);

	}

	/**
	 * mutator method for memberId
	 *
	 * @param $newMemberId -- ID value of new Profile ID
	 * @throws InvalidArgumentException if newProfileId is not an integer
	 * @throws RangeException if newProfileId is not positive
	 *
	 **/
	public function setMemberId ($newMemberId) {

		// validate the new Member ID is an integer
		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if($newMemberId === false) {
			throw(new InvalidArgumentException("Member ID is not a valid integer"));
		}

		// validate the new Member ID is positive
		if($newMemberId <= 0) {
			throw(new RangeException("Member ID is not positive"));
		}

		// final check and store
		$this->memberId = intval($newMemberId);

	}





}