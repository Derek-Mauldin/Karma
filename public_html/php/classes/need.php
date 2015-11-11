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
	 * accessor method for need
	 *
	 * @return string value of need
	 **/
	public function getNeed() {
		return ($this->need);
	}

	/**
	 * mutator method for need
	 *
	 * @param string $newNeed new value of need
	 * @throws InvalidArgumentException if $newNeed is not a string or insecure
	 * @throws RangeException if $newNeed is > 5000 characters
	 **/
	public function setNeed($newNeed) {
		// verify the need is secure
		$newNeed = trim($newNeed);
		$newNeed = filter_var($newNeed, FILTER_SANITIZE_STRING);
		if(empty($newNeed) === true) {
			throw(new InvalidArgumentException("need is empty or insecure"));
		}

		// verify the need will fit in the database
		if(strlen($newNeed) > 5000) {
			throw(new RangeException("need too large"));
		}

		// store the need
		$this->need = $newNeed;
	}

	/**
	 * inserts this Need into mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function insert(PDO $pdo) {
		// enforce the needId is null (i.e., don't insert a need that already exists)
		if($this->needId !== null) {
			throw(new PDOException("not a new need"));
		}

		// create query template
		$query = "INSERT INTO need(needId, profileId, need) VALUES(:needId, :profileId, :need)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->needDate->format("Y-m-d H:i:s");
		$parameters = array("needId" => $this->needId, "profileId" => $this->profileId, "need" => $this->need);
		$statement->execute($parameters);

		// update the null needId with what mySQL just gave us
		$this->needId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Need from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function delete(PDO $pdo) {
		// enforce the needId is not null (i.e., don't delete a need that hasn't been inserted)
		if($this->needId === null) {
			throw(new PDOException("unable to delete a need that does not exist"));
		}

		// create query template
		$query = "DELETE FROM need WHERE needId = :needId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = array("needId" => $this->needId);
		$statement->execute($parameters);
	}

	/**
	 * updates this Need in mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function update(PDO $pdo) {
		// enforce the needId is not null (i.e., don't update a need that hasn't been inserted)
		if($this->needId === null) {
			throw(new PDOException("unable to update a need that does not exist"));
		}

		// create query template
		$query = "UPDATE need SET need = :need WHERE need = :need";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->needDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "need" => $this->need, "needId" => $this->needId);
		$statement->execute($parameters);
	}

	/**
	 * gets the Need by needContent
	 *
	 * @param PDO $pdo PDO connection object
	 * @param string $need to search for
	 * @return SplFixedArray all Needs found for this need
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getNeedByNeedContent(PDO $pdo, $need) {
		// sanitize the description before searching
		$need = trim($need);
		$need = filter_var($need, FILTER_SANITIZE_STRING);
		if(empty($need) === true) {
			throw(new PDOException("need is invalid"));
		}
		// create query template
		$query = "SELECT needId, profileId, need FROM need WHERE need LIKE :need";
		$statement = $pdo->prepare($query);

		// bind the need to the place holder in the template
		$need = "%need%";
		$parameters = array("need" => $need);
		$statement->execute($parameters);

		// build an array of needs
		$needs = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$need = new Need($row["needId"], $row["profileId"], $row["need"]);
				$needs[$needs->key()] = $need;
				$needs->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($needs);
	}
	/**
	 * gets all Needs
	 *
	 * @param PDO $pdo PDO connection object
	 * @return SplFixedArray all Needs found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getAllNeeds(PDO $pdo) {
		// create query template
		$query = "SELECT needId, profileId, need FROM needs";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of needs
		$needs = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$need = new Need($row["needId"], $row["profileId"], $row["need"]);
				$needs[$needs->key()] = $need;
				$need->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($need);
	}
}