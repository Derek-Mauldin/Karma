<?php
/**
 * Profile karma
 *
 *  Karma is a byproduct of a many-to-many relationship between users and needs.
 *  Karma is a weak entity created from a user fulfilling a need (clicking ACCEPT on an offer within a message.   This
 *  information then is stored in the database as karma.
 *
 * @author Jennifer Hung<jhung505@cnm.edu>
 **/
class Karma {
	/**
	 * karmaAccepted comes from a user clicking ACCEPT on an offer within a message from another user.
	 **/
	private $karmaAccepted;
	/**
	 * date and time the offer was accepted
	 **/
	private $karmaActionDate;
	/**
	 * profileId is a foreign key.  It is the id for the profile who made the accepted offer.
	 **/
	private $profileId;
	/**
	 * needId is a foreign key.  It is the need of the member who accepted the offer.
	 **/
	private $needId;

	/**
	 * accessor method for karma accepted
	 *
	 * @return boolean value of karma accepted
	 **/
	public function getKarmaAccepted() {
		return($this->karmaAccepted);
	}

	/**
	 * mutator method for karma accepted
	 *
	 * @param boolean $newKarmaAccepted new value of karma accepted.
	 **/
	public function setKarmaAccepted($newKarmaAccepted) {
		// verify the karmaAccepted is valid
		if($newKarmaAccepted === false) {
			throw(new UnexpectedValueException("karmaAccepted is not a valid boolean value"));
		}
	}


	/**
	 * accessor method for karma action date.
	 *
	 * @return string value of karma action date
	 **/
	public function karmaActionDate() {
		return($this->karmaActionDate);
	}

	/**
	 * mutator method for karma action date.
	 *
	 * @param int $newKarmaActionDate new value of karma action date
	 * @throws UnexpectedValueException if $newKarmaActionDate is not an integer
	 **/
	public function setKarmaActionDate($newKarmaActionDate) {
		// verify the user id is valid
		$newKarmaActionDate = filter_var($newKarmaActionDate, FILTER_VALIDATE_INT);
		if($newUserId === false) {
			throw(new UnexpectedValueException("karma action date is not a valid integer"));
		}

		// convert and store the karma action date
		$this->userId = intval($newKarmaActionDate);
	}

	/**
	 * accessor method for need id
	 *
	 * @return int value of need id
	 **/
	public function getNeedId() {
		return($this->needId);
	}

	/**
	 * mutator method for need id
	 *
	 * @param string $newNeedId new value of need id
	 * @throws UnexpectedValueException if $newNeedId is not valid
	 **/
	public function setNeedId($newNeedId) {
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