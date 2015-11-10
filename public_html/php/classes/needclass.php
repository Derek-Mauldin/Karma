<?php

/**
* Small Cross Section of a Need like Message
*
* This Need can be considered a small example of what services like Messaqe store when messages are sent and
* received using Karma. This can easily be extended to emulate more features of Karma.
*
* @author Gerald Fongwe <gfongwe@cnm.edu>
**/
class Need {
	/**
	 * id for this Need; this is the primary key
	 * @var int $needId
	 **/
	private $needId;
	/**
	 * id of the Profile that sent this Need; this is a foreign key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * actual textual content of this Need
	 * @var string $need
	 **/
	private $need;


	/**
	 * constructor for this Need
	 *
	 * @param mixed $newNeedId id of this Need or null if a new Need
	 * @param int $newProfileId id of the Profile that sent this Need
	 * @param string $newNeed string containing actual need data
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 **/
	public function __construct($newNeedId, $newProfileId, $newNeed = null) {
		try {
			$this->setNeedId($newNeedId);
			$this->setProfileId($newProfileId);
			$this->setNeed($newNeed);
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
	 * accessor method for need id
	 *
	 * @return mixed value of need id
	 **/
	public function getNeedId() {
		return ($this->needId);
	}


	/**
	 * mutator method for need id
	 *
	 * @param mixed $newNeedId new value of need id
	 * @throws InvalidArgumentException if $newNeedId is not an integer
	 * @throws RangeException if $newNeedId is not positive
	 **/
	public function setNeedId($newNeedId) {
		// base case: if the need id is null, this a new need without a mySQL assigned id (yet)
		if($newNeedId === null) {
			$this->needId = null;
			return;
		}

		// verify the need id is valid
		$newNeedId = filter_var($newNeedId, FILTER_VALIDATE_INT);
		if($newNeedId === false) {
			throw(new InvalidArgumentException("need id is not a valid integer"));
		}

		// verify the need id is positive
		if($newNeedId <= 0) {
			throw(new RangeException("need id is not positive"));
		}

		// convert and store the need id
		$this->needId = intval($newNeedId);
	}

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 **/
	public function getProfileId() {
		return ($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param int $newProfileId new value of profile id
	 * @throws InvalidArgumentException if $newProfileId is not an integer or not positive
	 * @throws RangeException if $newProfileId is not positive
	 **/
	public function setProfileId($newProfileId) {
		// verify the profile id is valid
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new InvalidArgumentException("profile id is not a valid integer"));
		}

		// verify the profile id is positive
		if($newProfileId <= 0) {
			throw(new RangeException("profile id is not positive"));
		}

		// convert and store the profile id
		$this->profileId = intval($newProfileId);
	}

	/**
	 * accessor method for need content
	 *
	 * @return string value of need
	 **/
	public function getNeed() {
		return ($this->need);
	}

	/**
	 * mutator method for need content
	 *
	 * @param string $newNeed new value of need
	 * @throws InvalidArgumentException if $newNeed is not a string or insecure
	 * @throws RangeException if $newNeed is > 140 characters
	 **/
	public function setNeed($newNeed) {
		// verify the need content is secure
		$newNeed = trim($newNeed);
		$newNeed = filter_var($newNeed, FILTER_SANITIZE_STRING);
		if(empty($newNeed) === true) {
			throw(new InvalidArgumentException("tweet content is empty or insecure"));
		}

		// verify the need content will fit in the database
		if(strlen($newNeed) > 140) {
			throw(new RangeException("need too large"));
		}

		// store the tweet content
		$this->need = $newNeed;
	}
}
