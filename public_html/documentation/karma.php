<?php
/**
 * Typical Profile for an eCommerce site
 *
 * This Profile is an abbreviated example of data collected and stored about a user for eCommerce purposes.
 * This can be extended to include more information such as address, phone number, etc.
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 **/
class Profile {
	/**
	 * id for this Profile; this is the primary key
	 **/
	private $profileId;
	/**
	 * id for the User who owns this Profile; this is a foreign key
	 **/
	private $userId;
	/**
	 * first name of this person
	 **/
	private $firstName;
	/**
	 * last name of this person
	 **/
	private $lastName;

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 **/
	public function getProfileId() {
		return($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param int $newProfileId new value of profile id
	 * @throws UnexpectedValueException if $newProfileId is not an integer
	 **/
	public function setProfileId($newProfileId) {
		// verify the profile id is valid
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new UnexpectedValueException("profile id is not a valid integer"));
		}

		// convert and store the profile id
		$this->profileId = intval($newProfileId);
	}

	/**
	 * accessor method for user id
	 *
	 * @return int value of user id
	 **/
	public function getUserId() {
		return($this->userId);
	}

	/**
	 * mutator method for user id
	 *
	 * @param int $newUserId new value of profile id
	 * @throws UnexpectedValueException if $newUserId is not an integer
	 **/
	public function setUserId($newUserId) {
		// verify the user id is valid
		$newUserId = filter_var($newUserId, FILTER_VALIDATE_INT);
		if($newUserId === false) {
			throw(new UnexpectedValueException("user id is not a valid integer"));
		}

		// convert and store the profile id
		$this->userId = intval($newUserId);
	}

	/**
	 * accessor method for first name
	 *
	 * @return string value of first name
	 **/
	public function getFirstName() {
		return($this->firstName);
	}

	/**
	 * mutator method for first name
	 *
	 * @param string $newFirstName new value of first name
	 * @throws UnexpectedValueException if $newFirstName is not valid
	 **/
	public function setFirstName($newFirstName) {
		// verify the first name is valid
		$newFirstName = filter_var($newFirstName, FILTER_SANITIZE_STRING);
		if($newFirstName === false) {
			throw(new UnexpectedValueException("first name is not a valid string"));
		}

		// store the first name
		$this->firstName = $newFirstName;
	}

	/**
	 * accessor method for last name
	 *
	 * @return string value of last name
	 **/
	public function getLastName() {
		return($this->lastName);
	}

	/**
	 * mutator method for last name
	 *
	 * @param string $newLastName new value of last name
	 * @throws UnexpectedValueException if $newLastName is not valid
	 **/
	public function setLastName($newLastName) {
		// verify the last name is valid
		$newLastName = filter_var($newLastName, FILTER_SANITIZE_STRING);
		if($newLastName === false) {
			throw(new UnexpectedValueException("last name is not a valid string"));
		}

		// store the last name
		$this->lastName = $newLastName;
	}
}