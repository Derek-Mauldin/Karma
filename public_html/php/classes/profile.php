<?php


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
	 * photo type for this profile
	 *
	 * @var $profilePhoto
	 **/
	private $profilePhoteType;


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

		return ($this->profileHandle);
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
	 * @return string -- path to profile photo
	 **/
	public function getProfilePhoto() {

		return($this->profilePhoto);
	}

	/**
	 * accessor method for profile photo type
	 *
	 * @return string -- value of profile photo type
	 **/
	public function getProfilePhotoType() {

		return($this->profilePhoteType);

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
			throw(new InvalidArgumentException("Profile ID is not a valid integer."));
		}

		// validate that the new Profile ID is positive
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID is not positive."));
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
	public function setMemberId($newMemberId) {

		// validate the new Member ID is an integer
		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if($newMemberId === false) {
			throw(new InvalidArgumentException("Member ID is not a valid integer."));
		}

		// validate the new Member ID is positive
		if($newMemberId <= 0) {
			throw(new RangeException("Member ID is not positive."));
		}

		// final check and store
		$this->memberId = intval($newMemberId);

	}


	/**
	 * mutator method for Profile Blurb
	 *
	 * @param $newProfileBlurb
	 * @throws InvalidArgumentException if $newProfileBlurb is empty or insecure
	 * @throws RangeException if $newProfileBlurb is too large
	 **/
	public function setProfileBlurb($newProfileBlurb) {

		// make sure $newProfileBlurb is secure
		$newProfileBlurb = trim($newProfileBlurb);
		$newProfileBlurb = filter_var($newProfileBlurb, FILTER_SANITIZE_STRING);
		if(empty($newProfileBlurb) === true) {
			throw(new InvalidArgumentException("Profile Blurb content is empty or insecure."));
		}

		// validate the length of $newProfileBlurb
		if(strlen($newProfileBlurb) > 3000) {
			throw(new RangeException("Blurb content is too large."));
		}

		// store the new blurb
		$this->profileBlurb = $newProfileBlurb;

	}


	/**
	 * mutator method for Profile Handle
	 *
	 * @param $newProfileHandle
	 * @throws InvalidArgumentException if $newProfileHandle is empty or insecure
	 * @throws RangeException if $newProfileHandle is too large
	 **/
	public function setProfileHandle($newProfileHandle) {

		// make sure $newProfileHandle is secure
		$newProfileHandle = trim($newProfileHandle);
		$newProfileHandle = filter_var($newProfileHandle, FILTER_SANITIZE_STRING);
		if(empty($newProfileHandle) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}

		// validate the length of $newProfileHandle
		if(strlen($newProfileHandle) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}



		// store the new handle
		$this->profileHandle = $newProfileHandle;

	}


	/**
	 * mutator method for Profile First Name
	 *
	 * @param $newProfileFirstName
	 * @throws InvalidArgumentException if $newFirstName is empty or insecure
	 * @throws RangeException if $newProfileFirstName is too large
	 **/
	public function setProfileFirstName($newProfileFirstName) {

		// make sure $newFirstName is secure
		$newProfileFirstName = trim($newProfileFirstName);
		$newProfileFirstName = filter_var($newProfileFirstName, FILTER_SANITIZE_STRING);
		if(empty($newProfileFirstName) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}

		// validate the length of $newProfileFirstName
		if(strlen($newProfileFirstName) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}

		// store the new First Name
		$this->profileFirstName = $newProfileFirstName;

	}


	/**
	 * mutator method for Profile Last Name
	 *
	 * @param $newProfileLastName
	 * @throws InvalidArgumentException if $newLastName is empty or insecure
	 * @throws RangeException if $newProfileLastName is too large
	 **/
	public function setProfileLastName($newProfileLastName) {

		// make sure $newProfileLastName is secure
		$newProfileLastName = trim($newProfileLastName);
		$newProfileLastName = filter_var($newProfileLastName, FILTER_SANITIZE_STRING);
		if(empty($newProfileLastName) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}

		// validate the length of $newProfileLastName
		if(strlen($newProfileLastName) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}

		// store the new Last Name
		$this->profileFirstName = $newProfileLastName;

	}

	/**
	 * mutator method for Profile Photo (path to photo)
	 *
	 * @param $newProfilePhoto -- string with the directory path for the photo
	 * @throws InvalidArgumentException if $newProfilePhoto is empty or insecure
	 * @throws OutOfRangeException if $newProfilePhoto is to long
	 *
	 */
	public function setProfilePhoto($newProfilePhoto) {

		// make sure $newProfilePhoto is secure
		$newProfilePhoto = trim($newProfilePhoto);
		$newProfilePhoto = filter_var($newProfilePhoto, FILTER_SANITIZE_STRING);
		if(empty($newProfilePhoto) === true) {
			throw(new InvalidArgumentException("Profile Photo is empty or insecure."));
		}

		// make sure the length of $newProfilePhoto is correct
		if(strlen($newProfilePhoto) > 255) {
			throw(new OutOfRangeException("Profile Photo path is to long."));
		}

		// if the file already exists, return
		if(file_exists($newProfilePhoto) === true) {
			return;
		}

		// store the path
		$this->profilePhoto = $newProfilePhoto;

	}




} // end of profile class