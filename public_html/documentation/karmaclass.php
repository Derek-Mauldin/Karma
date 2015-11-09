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
	 * profileId is a foreign key.  It is the id for the profile who made the accepted offer.
	 **/
	private $profileId;
	/**
	 * needId is a foreign key.  It is the need of the member who accepted the offer.
	 **/
	private $needId;
	/**
	 * karmaAccepted comes from a user clicking ACCEPT on an offer within a message from another user.
	 **/
	private $karmaAccepted;
	/**
	 * date and time the offer was accepted
	 **/
	private $karmaActionDate;



	public function __construct($newProfileId, $newNeedId, $newKarmaAccepted, $newKarmaActionDate) {
		try {
			$this->setProfileId($newProfileId);
			$this->setNeedId($newNeedId);
			$this->setKarmaAccepted($newKarmaAccepted);
			$this->setKarmaActionDate($newKarmaActionDate);
		} catch(InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			// rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			// rethrow generic exception
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}


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

		$newKarmaAccepted = filter_var($newKarmaAccepted, FILTER_VALIDATE_BOOLEAN);

		// verify the karmaAccepted is valid
		if($newKarmaAccepted === false) {
			throw(new UnexpectedValueException("karmaAccepted is not a valid boolean value"));
		}

		$this->karmaAccepted = $newKarmaAccepted;
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
		$newKarmaActionDate = filter_var($newKarmaActionDate, FILTER_SANITIZE_STRING);
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
	 * @param int $newNeedId new value of need id
	 * @throws UnexpectedValueException if $newNeedId is not valid
	 **/
	public function setNeedId($newNeedId) {
		// verify the profile id is valid
		$newFirstName = filter_var($newNeedId, FILTER_VALIDATE_INT);
		if($newFirstName === false) {
			throw(new UnexpectedValueException("need id is not a valid int"));
		}

		// store the need id
		$this->needId = $newNeedId;
	}

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
	 * @throws UnexpectedValueException if $newLastName is not valid int
	 **/
	public function setProfileId($newProfileId) {
		// verify the last name is valid
		$newLastName = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newLastName === false) {
			throw(new UnexpectedValueException("profile id is not a valid int"));
		}

		// store the profile id
		$this->lastName = $newProfileId;
	}
}