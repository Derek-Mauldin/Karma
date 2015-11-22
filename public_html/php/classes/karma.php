/**
 *
 * karma class
 *
 * Karma is a byproduct of a many-to-many relationship between users and needs.
 * Karma is a weak entity created from a user fulfilling a need (clicking ACCEPT on an offer within a message.   This
 * information then is stored in the database as karma.
 *
 * @author Jennifer Hung<jhung505@cnm.edu>

****************************************************************************************************************/
<?php
	require_once(dirname(dirname(__DIR__)) ."/lib/php/date-utils.php");
	require_once("autoload.php");

class karma {
	/******************************************************************************************************************
	 *
	 * profileId is a foreign key.  It is the id for the profile who made the accepted offer.
	 *
	 *******************************************************************************************************************/
	private $profileId;
	/******************************************************************************************************************
	 *
	 * needId is a foreign key.  It is the need of the member who accepted the offer.
	 *
	 ******************************************************************************************************************/
	private $needId;
	/******************************************************************************************************************
	 *
	 * karmaAccepted comes from a user clicking ACCEPT on an offer within a message from another user.
	 *
	 ******************************************************************************************************************/
	private $karmaAccepted;
	/******************************************************************************************************************
	 *
	 * date and time the offer was accepted
	 *
	 ******************************************************************************************************************/
	private $karmaActionDate;
	/**
	 *
	 * @param DateTime $newKarmaActionDate and time Karma was accepted or null if set to current date and time
	 * @param int $newNeedId id new value of the need id
	 * @param int $newProfileId id new value of the profile id
	 * @param int $newKarmaAccepted of this Karma
	 *
	 * @throws UnexpectedValueException if $newProfileId is not valid int
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 *
	 **/
	public function __construct($newNeedId, $newProfileId, $newKarmaAccepted, $newKarmaActionDate = null) {
		try {
			$this->setNeedId($newNeedId);
			$this->setProfileId($newProfileId);
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


	/********************************************************************************************************************
	 * accessor method for need id
	 *
	 * @return int value of need id
	 *******************************************************************************************************************/
	public function getNeedId() {
		return ($this->needId);
	}

	/********************************************************************************************************************
	 * mutator method for need id
	 *
	 * @param int $newNeedId new value of need id
	 * @throws UnexpectedValueException if $newNeedId is not valid
	 *******************************************************************************************************************/
	public function setNeedId($newNeedId) {
		// verify the profile id is valid
		$newNeedId = filter_var($newNeedId, FILTER_VALIDATE_INT);
		if($newNeedId === false) {
			throw(new UnexpectedValueException("need id is not a valid int"));
		}

		// store the need id
		$this->needId = $newNeedId;
	}

	/********************************************************************************************************************
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 *******************************************************************************************************************/
	public function getProfileId() {
		return ($this->profileId);
	}

	public function setProfileId($newProfileId) {
		// verify the last name is valid
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new UnexpectedValueException("profile id is not a valid int"));
		}

		// store the profile id
		$this->profileId = $newProfileId;
	}

	/*******************************************************************************************************************
	 * accessor method for karma accepted
	 *
	 * @return boolean value of karma accepted
	 ******************************************************************************************************************/
	public function getKarmaAccepted() {
		return ($this->karmaAccepted);
	}

	/*******************************************************************************************************************
	 *
	 * mutator method for karma accepted
	 *
	 * @param boolean $newKarmaAccepted new value of karma accepted
	 *
	 *******************************************************************************************************************/
	public function setKarmaAccepted($newKarmaAccepted) {

		$newKarmaAccepted = filter_var($newKarmaAccepted, FILTER_VALIDATE_BOOLEAN);

		// verify the karmaAccepted is valid
		if(($newKarmaAccepted < 0) || ($newKarmaAccepted > 1)) {
			throw(new UnexpectedValueException("karmaAccepted should be 0 or 1 "));
		}

		$this->karmaAccepted = $newKarmaAccepted;
	}


	/******************************************************************************************************************
	 *
	 * accessor method for karma action date.
	 * @return string value of karma action date
	 *
	 ******************************************************************************************************************/
	public function getKarmaActionDate() {
		return ($this->karmaActionDate);
	}

	/*******************************************************************************************************************
	 *
	 * mutator method for karma action date.
	 * @param DateTime $newKarmaActionDate new value of karma action da
	 * @throws UnexpectedValueException if $newKarmaActionDate is not an integer
	 *
	 *****************************************************************************************************************/
	public function setKarmaActionDate($newKarmaActionDate) {

		// base case: if the date is null, use the current date and time
		if($newKarmaActionDate === null) {
			$this->karmaActionDate = new DateTime('now');
			return;
		}

		// store the message date
		try {
			$newKarmaActionDate = validateDate($newKarmaActionDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->karmaActionDate = $newKarmaActionDate;
	}

	/**********************************************************************************************************************
	 * inserts this Karma into mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws InvalidArgumentException when either $needId or $profileId is null
	 **********************************************************************************************************************/
	public function insert(PDO $pdo) {

		// check for null in profileId and needId before insertion
		if($this->needId === null) {
			throw(new InvalidArgumentException("needId is null"));
		} elseif ($this->profileId === null){
			throw(new InvalidArgumentException("profileId is null"));
		}

		// check to see if a karma with this needId andProfile Id has been inserted
		$query = "SELECT profileId, needId, karmaAccepted, karmaActionDate FROM karma WHERE profileId = :profileId AND needId = :needId";
		$statement = $pdo->prepare($query);

		$parameters = array("profileId" => $this->profileId, "needId" => $this->needId);
		$statement->execute($parameters);

		if($statement->rowCount() >= 1) {
			throw(new PDOException("cannot insert a karma that already exists"));
		}

		// create query template for insertion
		$query = "INSERT INTO karma(profileId, needId, karmaAccepted, karmaActionDate)
                VALUES(:profileId, :needId, :karmaAccepted, :karmaActionDate)";
		$statement = $pdo->prepare($query);

		$formattedDate = $this->karmaActionDate->format("Y-m-d H:i:s");
		$parameters = array("profileId"         => $this->profileId,
				              "needId"            => $this->needId,
			                 "karmaAccepted"     => $this->karmaAccepted,
				              "karmaActionDate"   => $formattedDate);

		// insert
		$statement->execute($parameters);

	}


	/*********************************************************************************************************************
	 * deletes this Karma from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **********************************************************************************************************************/
	public function delete(PDO $pdo) {

		// enforce the karmaAccepted is not null (i.e., don't delete a karma accepted that hasn't been inserted)
		if($this->needId === null)  {
			throw(new PDOException("unable to delete a karma that does not exist -- needId is null"));
		} elseif($this->profileId === null) {
			throw(new PDOException("unable to delete a karma that does not exist - profileId is null"));
		}

		// create query template
		$query = "DELETE FROM karma WHERE needId = :needId AND profileId = :profileId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = array("needId" => $this->needId, "profileId" => $this->profileId);
		$statement->execute($parameters);

	}

	/*********************************************************************************************************************
	 * updates this Karma in mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **********************************************************************************************************************
	public function update(PDO $pdo) {
		// enforce the needId and profileId are not null (i.e., don't update a karma that hasn't been inserted)
		if($this->needId === null && $this->profileId === null) {
			throw(new PDOException("unable to update a karma that does not exist"));
		}

		// create query template
		$query = "UPDATE karma SET needId =:needId, profileId = :profileId, karmaAccepted = :karmaAccepted = karmaActionDate =:karmaActionDate WHERE needId = :needId &&
	             :profileId=profileId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = validateDate($this->karmaActionDate);
		$parameters = array("needId" => $this->needId, "profileId" => $this->profileId, "karmaActionDate" => $formattedDate, "karmaAceepted" => $this->karmaAccepted);
		$statement->execute($parameters);
	}
	 */


	/**********************************************************************************************************************
	 * gets the karma by boolean
	 *
	 * @param PDO $pdo PDO connection object
	 * @param boolean $karmaAccepted boolean to search for
	 * @return SplFixedArray all Karmas found for this content
	 * @throws PDOException when mySQL related errors occur
	 **********************************************************************************************************************
	public static function getKarmaByKarmaAccepted(PDO $pdo, $karmaAccepted) {
		// sanitize the description before searching
		$karmaAccepted = trim($karmaAccepted);
		$karmaAccepted = filter_var($karmaAccepted, FILTER_VALIDATE_BOOLEAN);
		if(empty($karmaAccepted) === true) {
			throw(new PDOException("karma accepted is invalid"));
		}

		// create query template
		$query = "SELECT needId, profileId, karmaAccepted, karmaActionDate FROM karma WHERE karmaAccepted LIKE :karmaAccepted";
		$statement = $pdo->prepare($query);

		// bind the karma accepted to the place holder in the template
		$karmaAccepted = "%$karmaAccepted%";
		$parameters = array("karmaAccepted" => $karmaAccepted);
		$statement->execute($parameters);

		// build an array of karmas
		$karmas = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$karma = new Karma($row["needId"], $row["profileId"], $row["karmaActionDate"], $row["karmaAccepted"]);
				$karmas[$karmas->key()] = $karma;
				$karmas->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($karmas);
	}
	 */

	/**
	 *
	 * gets the Karma by need id and profile id
	 * @param PDO $pdo PDO connection object
	 * @param int  $needId and $profileID to search for
	 * @return mixed karma found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 *
	 **/
	public static function getKarmaByNeedIdAndProfileId(PDO $pdo, $needId, $profileId) {
		// sanitize the needId and profileId before searching
		$needId = filter_var($needId, FILTER_VALIDATE_INT);
		if($needId === false) {
			throw(new PDOException("need id is not a valid integer"));
		}
		if($needId <= 0) {
			throw(new PDOException("need id is not a integer"));
		}

		$profileId = filter_var($profileId, FILTER_VALIDATE_INT);
		if($profileId === false) {
			throw(new PDOException("profile id is not a valid integer"));
		}
		if($profileId <= 0) {
			throw(new PDOException("profile id is not a integer"));
		}

		// create query template
		$query = "SELECT needId, profileId, karmaAccepted, karmaActionDate FROM karma
                WHERE needId = :needId AND profileId = :profileId";
		$statement = $pdo->prepare($query);

		// bind the need id and profile id to the place holder in the template
		$parameters = array("needId" => $needId, "profileId" => $profileId);
		$statement->execute($parameters);

		// grab the karma from mySQL
		try {
			$karma = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$karma = new karma($row["needId"], $row["profileId"], $row["karmaAccepted"], $row["karmaActionDate"]);
			}
		} catch(Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($karma);
	}


	/**
	 * gets the Karmas by profileId
	 *
	 * @param PDO $pdo PDO connection object
	 * @param int $profileId to search for profile id
	 * @return SplFixedArray all Karmas found with this profileId
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getKarmasByProfileId(PDO $pdo, $profileId) {

		// sanitize $profileId
		$profileId = filter_var($profileId, FILTER_VALIDATE_INT);
		if($profileId === false) {
			throw(new PDOException("profile id not an integer"));
		}
		if($profileId <= 0) {
			throw(new PDOException("profile id need to a positive integer"));
		}

		// create query template
		$query = "SELECT profileId, needId, karmaAccepted, karmaActionDate FROM karma WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

		// bind to the place holder in the template
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		$karmas = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		// build an array of needs
		while(($row = $statement->fetch()) !== false) {
			try {
				if($row !== false) {
					$karma = new Karma($row["profileId"], $row["needId"], $row["karmaAccepted"], $row["karmaActionDate"]);
					$karmas[$karmas->key()] = $karma;
					$karmas->next();
				}
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}

		return $karmas;

	} // getKarmasByProfileId

		/**
		 * gets the Karmas by needId
		 *
		 * @param PDO $pdo PDO connection object
		 * @param int $needId to search for need id
		 * @return SplFixedArray all Karmas found for this needId
		 * @throws PDOException when mySQL related errors occur
		 **/
		public static function getKarmasByNeedId(PDO $pdo, $needId) {

			// sanitize $profileId
			$needId = filter_var($needId, FILTER_VALIDATE_INT);
			if($needId === false) {
				throw(new PDOException("profile id not an integer"));
			}
			if($needId <= 0) {
				throw(new PDOException("profile id need to a positive integer" ));
			}

			// create query template
			$query = "SELECT profileId, needId, karmaAccepted, karmaActionDate FROM karma WHERE needId = :needId";
			$statement = $pdo->prepare($query);

			// bind to the place holder in the template
			$parameters = array("needId" => $needId);
			$statement->execute($parameters);

			$karmas = new SplFixedArray($statement->rowCount());
			$statement->setFetchMode(PDO::FETCH_ASSOC);

			// build an array of needs
			while(($row = $statement->fetch()) !== false) {
				try {
					if($row !== false) {
						$karma = new Karma($row["profileId"], $row["needId"], $row["karmaAccepted"], $row["karmaActionDate"]);
						$karmas[$karmas->key()] = $karma;
						$karmas->next();
					}
				} catch(Exception $exception) {
					// if the row couldn't be converted, rethrow it
					throw(new PDOException($exception->getMessage(), 0, $exception));
				}
			}

		return $karmas;

	}  // getKarmasByNeedId

	/**********************************************************************************************************************
	 *
	 * gets all Karmas
	 * @param PDO $pdo PDO connection object
	 * @return SplFixedArray all Karmas found
	 * @throws PDOException when mySQL related errors occur
	 *
	 **********************************************************************************************************************

	public static function getAllKarmas(PDO $pdo) {
		// create query template
		$query = "SELECT needId, profileId, karmaAccepted, karmaActionDate FROM karma";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of karmas
		$karmas = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$karma = new Karma($row["needId"], $row["profileId"], $row["karmaAccepted"], $row["karmaActionDate"]);
				$karma[$karmas->key()] = $karmas;
				$karmas->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($karmas);
	}
	 */
}