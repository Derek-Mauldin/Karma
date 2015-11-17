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
	 * actual textual description of this Need
	 * @var string $needDescription
	 **/
	private $needDescription;
	/**
	 * actual textual title of this Need
	 * @var string needTitle
	 * **/
	private $needTitle;
	/**
	 * actual fulfilment of the need
	 * @var  int  $needFulfilled
	 **/
	private $needFulfilled;


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
	public function __construct($newNeedId, $newProfileId, $newNeedDescription, $newNeedTitle, $newNeedFulFilled) {

		try {
			$this->setNeedId($newNeedId);
			$this->setProfileId($newProfileId);
			$this->setNeedTitle($newNeedTitle);
			$this->setNeedDescription($newNeedDescription);
			$this->setNeedFulfilled($newNeedFulFilled);
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

	}  // __construct

	/**
	 * accessor method for need id
	 *
	 * @return mixed value of need id
	 **/
	public function getNeedId() {
		return ($this->needId);
	} // getNeedId


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

		} // setNeedId

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

	}  // setNeedId


	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 **/
	public function getProfileId() {
		return ($this->profileId);
	} // getProfielId


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

	} // setProfileId


	/**
	 * accessor method for need description
	 *
	 * @return string value of need description
	 **/
	public function getNeedDescription() {
		return ($this->needDescription);
	}  // getNeedDescription


	/**
	 * mutator method for need Description
	 *
	 * @param string $newNeedDescription new value of need
	 * @throws InvalidArgumentException if $newNeedDescription is not a string or insecure
	 * @throws RangeException if $newNeedDescription is > 5000 characters
	 **/
	public function setNeedDescription($newNeedDescription) {

		// verify the needDescription is secure
		$newNeedDescription = trim($newNeedDescription);
		$newNeedDescription = filter_var($newNeedDescription, FILTER_SANITIZE_STRING);
		if(empty($newNeedDescription) === true) {
			throw(new InvalidArgumentException("needDescription is empty or insecure"));
		}

		// verify the need description will fit in the database
		if(strlen($newNeedDescription) > 5000) {
			throw(new RangeException("need text too large"));
		}

		// store the need
		$this->needDescription = $newNeedDescription;

	} // setNeedDescription


	/**
		 * accessor method for need fulfilled
		 *
		 * @return string value of need fulfilled
		 **/
		public function getNeedFulfilled() {
			return ($this->needFulfilled);
	}	// getNeedFulfilled


	/**
 * mutator method for need Fulfilled
 *
 * @param int $newNeedFulfilled new value of need fulfilled
 * @throws InvalidArgumentException if $newNeedFulfilled is not an integer or not positive
 * @throws RangeException if $newNeedFulfilled is not positive
 **/
	public function setNeedFulfilled($newNeedFulfilled) {

		// verify the need fulfilled is valid
		$newNeedFulfilled = filter_var($newNeedFulfilled, FILTER_VALIDATE_INT);
		if($newNeedFulfilled === false) {
			throw(new InvalidArgumentException("needFulfilled is not a valid integer"));
		}

		// verify the Need Fulfilled is positive
		if($newNeedFulfilled <= 0) {
			throw(new RangeException("needFulfilled is not positive"));
		}

		// convert and store the need fulfilled
		$this->needFulfilled = intval($newNeedFulfilled);

	} // setNeedFulfilled


	/**
	 * accessor method for need title
	 *
	 * @return string value of need title
	 **/
	public function getNeedTitle() {
		return ($this->needTitle);
	}	// getNeedTitle


	/**
	 * mutator method for need Title
	 *
	 * @param string $newNeedTitle new value of need
	 * @throws InvalidArgumentException if $newNeedTitle is not a string or insecure
	 * @throws RangeException if $newNeedTitle is > 5000 characters
	 **/
	public function setNeedTitle($newNeedTitle) {

		// verify the needTitle is secure
		$newNeedTitle = trim($newNeedTitle);
		$newNeedTitle = filter_var($newNeedTitle, FILTER_SANITIZE_STRING);
		if(empty($newNeedTitle) === true) {
			throw(new InvalidArgumentException("needTitle is empty or insecure"));
		}

		// verify the need title will fit in the database
		if(strlen($newNeedTitle) > 64) {
			throw(new RangeException("need title too large"));
		}

		// store the need title
		$this->needTitle = $newNeedTitle;

	}  // setNeedTitle



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
		$query = "INSERT INTO need(needId, profileId, needDescription) VALUES(:needId, :profileId, :needDescription)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->needDate->format("Y-m-d H:i:s");
		$parameters = array("needId" => $this->needId, "profileId" => $this->profileId, "need" => $this->needDescription);
		$statement->execute($parameters);

		// update the null needId with what mySQL just gave us
		$this->needId = intval($pdo->lastInsertId());

	}  // insert


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

	}  //delete


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
		$query = "UPDATE need SET needDescription = :needDescription, needFulfilled = :needFulfilled, needTitle = :needTitle
                WHERE needId = :needId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = array("needDescription" => $this->needDescription, "needFulfilled" => $this->needFulfilled,
				              "needTitle" => $this->needTitle, "needId" => $this->getNeedId());
		$statement->execute($parameters);

	}  // update
	/**
	 * gets the Need by needId
	 *
	 * @param PDO $pdo PDO connection object
	 * @param string $needId to search for
	 * @return SplFixedArray all Needs found for this need id
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getNeedByNeedId(PDO $pdo, $needId) {

		// sanitize $needId
		$needId = filter_var($needId, FILTER_VALIDATE_INT);
		if(empty($needId) === true) {
			throw(new PDOException("need id not an integer"));
		}

		if($needId <= 0){
			throw(new RangeException("need Id need to be a positive integer"));
		}

		// create query template
		$query = "SELECT needId, profileId, needDescription, needFulfilled, needTitle FROM need WHERE needId = :needId";
		$statement = $pdo->prepare($query);

		// bind to the place holder in the template
		$parameters = array("needId" => $needId);
		$statement->execute($parameters);

		// build an array of need ids
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$row = $statement->fetch();

			try {
				$need = new Need($row["needId"], $row["profileId"], $row["needDescription"], $row["needFulfilled"],
						           $row["needTitle"]);

			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}


		return ($need);

	}  // getNeedByNeedId

	/**
	 * gets the Need by profileId
	 *
	 * @param PDO $pdo PDO connection object
	 * @param string $needId to search for profile id
	 * @return SplFixedArray all ProfileIds found for this need
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getNeedByProfileId(PDO $pdo, $needId) {

		// sanitize $needId
		$profileId = filter_var($needId, FILTER_VALIDATE_INT);
		if(empty($profileId) === true) {
			throw(new PDOException("profile id not an integer"));
		}
		if($profileId <= 0) {
			throw(new PDOException("profile id need to a positive integer" ));
		}

		// create query template
		$query = "SELECT needId, profileId, needDescription, needFulfilled, needTitle FROM need WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

		// bind to the place holder in the template
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		// build an array of needs
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$row = $statement->fetch();

			try {
				$need = new Need($row["needId"], $row["profileId"], $row["needDescription"], $row["needFulfilled"],
						$row["needTitle"]);
			}
				catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}


		return ($need);

	}  // getNeedByProfileId


	/**
	 * gets the Need by needTitle
	 *
	 * @param PDO $pdo PDO connection object
	 * @param string $need to search for
	 * @return SplFixedArray all Need ids found for this need
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getNeedByNeedTitle(PDO $pdo, $needTitle) {

		// sanitize $needTitle
		$needId = trim($needTitle);
		$needTitle = filter_var($needTitle, FILTER_SANITIZE_STRING);
		if(empty($needTitle) === true) {
			throw(new PDOException("need title is invalid"));
		}

		// create query template
		$query = "SELECT needId, profileId, needDescription, needFulfilled, needTitle FROM need WHERE needTitle LIKE :needTitle";
		$statement = $pdo->prepare($query);

		// bind to the place holder in the template
		$needId = "%need%";
		$parameters = array("needTitle" => $needTitle);
		$statement->execute($parameters);

		// build an array of need
		$needs = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		while(($row = $statement->fetch()) !== false) {
			try {
				$need = new Need($row["needId"], $row["profileId"], $row["needDescription"], $row["needFulfilled"],
						           $row["needTitle"]);
				$needs[$needs->key()] = $need;
				$needs->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}

		return ($needs);

	}  // getNeedByTitle


	/**
	 * gets all Needs
	 *
	 * @param PDO $pdo PDO connection object
	 * @return SplFixedArray all Needs found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getAllNeeds(PDO $pdo) {
		// create query template
		$query = "SELECT needId, profileId, needDescription, needFulfilled, needTitle FROM needs";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of needs
		$needs = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$need = new Need($row["needId"], $row["profileId"], $row["needDescription"], $row["needFulfilled"],
						$row["needTitle"]);
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