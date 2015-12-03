<?php

/** member class for Karma **/
class Member {
	/**
	 * Member Id; this is the primary key
	 * @var int $memberId
	 */

	private $memberId;
	/**
	 * Sets Access Level of the User, Admin, Suspended, User
	 * @var string $memberAccessLevel
	 */

	private $memberAccessLevel;
	/**
	 * memberEmail address of member used to sign in
	 * @var string $memberEmail
	 */

	private $memberEmail;
	/**
	 *activates user memberEmail using memberSalt and hash
	 * @var int $memberEmailActivation
	 */

	private $memberEmailActivation;
	/**
	 *hash for member password
	 * @var string $memberHash
	 */

	private $memberHash;
	/**
	 *id for memberSalt on member password
	 * @var string $memberSalt
	 */

	private $memberSalt;

	/**
	 * @param mixed $newMemberId of the member or null if new member
	 * @param int $newAccessLevel access level of the new member suspended if new member
	 * @param string $newEmail memberEmail of the member
	 * @param int $newEmailActivation activation key for member memberEmail, null if confirmed
	 * @param string $newPasswordHash string containing the hash for the member password
	 * @param string $newSalt string containing the memberSalt for the member password
	 * @throws Exception if some other exception is thrown
	 * @throws RangeException if data values are out of bounds
	 * @throws InvalidArgumentException if data types are invalid or insecure
	 */

	public function __construct($newMemberId, $newAccessLevel, $newEmail, $newEmailActivation, $newPasswordHash, $newSalt) {
		try {
			$this->setMemberId($newMemberId);
			$this->setAccessLevel($newAccessLevel);
			$this->setEmail($newEmail);
			$this->setEmailActivation($newEmailActivation);
			$this->setPasswordHash($newPasswordHash);
			$this->setSalt($newSalt);

		} catch(InvalidArgumentException $invalidArgument) {
			//rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));

		} catch(RangeException $range) {
			//rethrow the exception to the caller
			throw (new RangeException($range->getMessage(), 0, $range));

		} catch(Exception $exception) {
			//rethrow the generic exception
			throw (new Exception ($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 *accessor method for member id
	 *
	 * @return int for member id
	 */

	public function getMemberId() {
		return ($this->memberId);
	}

	/**
	 *mutator method for member id
	 * @param int $newMemberId new value of member id
	 * @throws InvalidArgumentException if $memberId id not an integer
	 * @throws RangeException if $memberId is not positive
	 */

	public function setMemberId($newMemberId) {
		// if new member id is null SQL will assign a new id
		if($newMemberId === null) {
			$this->memberId = null;
			return;
		}
		// verify the member id is valid
		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if($newMemberId === false) {
			throw(new InvalidArgumentException("Member Id is not a valid integer"));
		}
		// verify the member id is positive
		if($newMemberId <= 0) {
			throw(new RangeException ("Member Id is Not Positive"));
		}
		//convert and store the member id
		$this->memberId = intval($newMemberId);
	}

	/**
	 * accessor method for access level
	 * @return int value of access level
	 */
	public function getAccessLevel() {
		return ($this->memberAccessLevel);
	}

	/**
	 * mutator method for access level
	 *
	 * @param string $newAccessLevel grants users admin, suspended or user level
	 * @throws InvalidArgumentException if $newAccessLevel is not a,s,u
	 * @throws RangeException if $newAccessLevel is not a,s,u
	 **/

	public function setAccessLevel($newAccessLevel) {
		if($newAccessLevel === null) {
			$this->memberAccessLevel = "S";
			return;
		}
		//verify the access level is a,s,u
		$newAccessLevel = filter_var($newAccessLevel, FILTER_SANITIZE_STRING);
		if($newAccessLevel === false) {
			throw(new InvalidArgumentException("Access Level is corrupt"));
		}

		$newAccessLevel = strtoupper($newAccessLevel);

		if($newAccessLevel === "S") {
			$this->memberAccessLevel = $newAccessLevel;
		} elseif($newAccessLevel === "A") {
			$this->memberAccessLevel = $newAccessLevel;
		} elseif($newAccessLevel === "U") {
			$this->memberAccessLevel = $newAccessLevel;
		} else {
			throw(new OutOfRangeException("Access Level needs to be A or S or U"));
		}

	}

	/**
	 * accessor method for member memberEmail
	 *
	 * @return string value of member memberEmail
	 **/

	public function getEmail() {
		return ($this->memberEmail);
	}

	/**
	 *mutator method for member memberEmail
	 *
	 * @param string $newEmail new member memberEmail
	 * @throws InvalidArgumentException if $newEmail is not a string or insecure
	 * @throws RangeException if $newEmail is >255 characters
	 */

	public function setEmail($newEmail) {

		$newEmail = trim($newEmail);

		//verify the memberEmail is secure

		if($newEmail === null) {
			throw(new InvalidArgumentException("memberEmail can't be null"));
		}

		$newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);

		if(empty($newEmail) === true) {
			throw(new InvalidArgumentException("memberEmail content is empty or insecure"));
		}
		//verify the memberEmail is not > 255 characters

		if(strlen($newEmail) > 255) {
			throw(new RangeException("memberEmail address too long"));
		}

		//store the memberEmail address

		$this->memberEmail = $newEmail;
	}

	/**
	 *accessor for memberEmail activation
	 *
	 * @return int for memberEmail activation
	 */

	public function getEmailActivation() {
		return ($this->memberEmailActivation);
	}

	/**
	 * mutator for memberEmail activation
	 *
	 * @param string $newEmailActivation
	 * @throws InvalidArgumentException if activation is not secure or invalid
	 */

	public function setEmailActivation($newEmailActivation) {
		//verify the activation code is valid

		$newEmailActivation = trim($newEmailActivation);

		if($newEmailActivation === null) {
			throw(new InvalidArgumentException("memberEmail can't be null"));
		}

		$newEmailActivation = filter_var($newEmailActivation, FILTER_SANITIZE_STRING);

		if(empty($newEmailActivation) === true) {
			throw(new InvalidArgumentException("memberEmail content is empty or insecure"));
		}
		//verify the activation code is not too long

		if(strlen($newEmailActivation) !== 16) {
			throw(new RangeException("activation code should be 16 hex digits"));
		}
		//store activation code

		$this->memberEmailActivation = $newEmailActivation;
	}

	/**
	 * accessor method for password hash
	 * @return string value of password hash
	 */
	public function getPasswordHash() {
		return ($this->memberHash);
	}

	/**
	 * mutator method for password hash
	 * @return string value of hash
	 * @param string $newPasswordHash with ctype xdigit with a string of 128
	 * @throws InvalidArgumentException if the hash is empty or insecure
	 * @throws RangeException if $newPasswordHash is not 128
	 */

	public function setPasswordHash($newPasswordHash) {
		//verify hash is a string of 128 characters

		if((ctype_xdigit($newPasswordHash)) === false) {
			throw(new InvalidArgumentException ("password hash is empty or insecure"));
		}

		if(strlen($newPasswordHash) !== 128) {
			throw(new RangeException("password hash is not a valid length"));
		}
		//store new password hash

		$this->memberHash = $newPasswordHash;
	}

	/**
	 * accessor method for memberSalt
	 *
	 * @return string value of memberSalt
	 */

	public function getSalt() {
		return ($this->memberSalt);
	}

	/**
	 * mutator method for memberSalt
	 *
	 * @param string $newSalt
	 * @throws InvalidArgumentException if memberSalt is empty or insecure
	 * @throws RangeException if memberSalt is not 64 characters
	 */


	public function setSalt($newSalt) {
		//verify memberSalt is hex
		if((ctype_xdigit($newSalt)) === false) {
			throw(new InvalidArgumentException ("memberSalt is empty or insecure"));
		}
		//verify memberSalt is exactly 64 characters
		if(strlen($newSalt) !== 64) {
			throw(new RangeException("memberSalt is not a valid length"));
		}
		//Store memberSalt
		$this->memberSalt = $newSalt;
	}

	/**
	 * inserts the new member into mySQL
	 * @param PDO $pdo connectection object
	 * @throws PDO exception when mySQL related errors occur
	 *
	 **/

	public function insert(PDO $pdo) {
		// wont insert a member id that has already been created
		if($this->memberId !== null) {
			throw (new PDOException("not a new member"));
		}

		//creates the query template
		$query = "INSERT INTO member(memberAccessLevel, memberEmail, memberEmailActivation, memberHash, memberSalt) VALUES (:memberAccessLevel, :memberEmail, :memberEmailActivation, :memberHash, :memberSalt)";

		$statement = $pdo->prepare($query);

		//attaches the atributes to the right places in the template

		$parameters = array(
			"memberAccessLevel" => $this->memberAccessLevel,
			"memberEmail" => $this->memberEmail,
			"memberEmailActivation" => $this->memberEmailActivation,
			"memberHash" => $this->memberHash,
			"memberSalt" => $this->memberSalt
		);
		$statement->execute($parameters);
		//updates the null return with what the SQL has provided
		$this->memberId = intval($pdo->lastInsertId());
	}

	/**
	 * delets the member from mySQL
	 * @param PDO $pdo connectection object
	 * @throws PDO exception when mySQL related errors occur
	 *
	 **/

	public function delete(PDO $pdo) {
		//makes sure a member id is not null
		if($this->memberId === null) {
			throw(new PDOException("unable to delete a member that does not exist"));
		}
		//creates query template
		$query = "DELETE FROM member WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		//attaches atributes to the right place in the template
		$parameters = array("memberId" => $this->memberId);
		$statement->execute($parameters);
	}

	/**
	 * updates a member in mySQL
	 *
	 * @param PDO $pdo connection object
	 * @throws PDOException when mySQL errors occur
	 */
	public function update(PDO $pdo) {
		// wont update a member that has not been inserted into the database
		if($this->memberId === null) {
			throw(new PDOException("unable to update a member that does not exist"));
		}
		//creates the query
		$query = "UPDATE member SET memberAccessLevel = :memberAccessLevel, memberEmail = :memberEmail, memberEmailActivation = :memberEmailActivation, memberHash = :memberHash, memberSalt = :memberSalt WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		//attaches attributes to the right place in the template
		$parameters = array("memberAccessLevel" => $this->memberAccessLevel, "memberEmail" => $this->memberEmail, "memberEmailActivation" => $this->memberEmailActivation, "memberHash" => $this->memberHash, "memberSalt" => $this->memberSalt, "memberId" => $this->memberId);
		$statement->execute($parameters);
	}

	/**
	 *get member by member id
	 *
	 * @param PDO $pdo PDO connection object
	 * @param int $memberId search for member by id number
	 * @return mixed member found or null if not valid
	 * @return PDOException when mySQL errors occur
	 */

	public static function getMemberByMemberId(PDO $pdo, $memberId) {
		//sanitize the memberId before searching
		$memberId = filter_var($memberId, FILTER_VALIDATE_INT);
		if($memberId === false) {
			throw(new InvalidArgumentException("member id is not an integer"));
		}
		if($memberId <= 0) {
			throw(new RangeException("MEMBER id is not positive"));
		}
		//create the query template
		$query = "SELECT memberId, memberAccessLevel, memberEmail, memberEmailActivation, memberHash, memberSalt FROM member WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		//attached attributes to the right place in the template
		$parameters = array("memberId" => $memberId);
		$statement->execute($parameters);
		//gets the member from mySQL
		try {
			$member = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$member = new Member($row["memberId"], $row["memberAccessLevel"], $row["memberEmail"], $row["memberEmailActivation"], $row["memberHash"], $row["memberSalt"]);
			}
		} catch(Exception $exception) {
			//if the row cannot be created rethrow exception
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($member);

	}

	/**
	 * get member by member memberEmail
	 *
	 * @param PDO $pdo pdo connection object
	 * @param int $memberEmail members memberEmail account
	 * @return SplFixedArray all members with this memberEmail
	 * @throws PDOException if mySQL related errors occur
	 **/

	public static function getMemberByEmail(PDO $pdo, $memberEmail) {
		//sanatize the input
		$memberEmail = trim($memberEmail);
		$memberEmail = filter_var($memberEmail, FILTER_SANITIZE_EMAIL);
		if(empty($memberEmail) === true) {
			throw (new InvalidArgumentException("memberEmail is empty or insecure"));
		}
		//create the query template
		$query = "SELECT memberId, memberAccessLevel, memberEmail, memberEmailActivation,memberHash, memberSalt FROM member WHERE memberEmail = :memberEmail ";
		$statement = $pdo->prepare($query);
		//attached atributes to the right place in the template
		$parameters = array("memberEmail" => $memberEmail);
		$statement->execute($parameters);

		//call the function to build an array of the values
		$member = null;
		try {
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$member = new Member($row["memberId"], $row["memberAccessLevel"], $row["memberEmail"], $row["memberEmailActivation"], $row["memberHash"], $row["memberSalt"]);
			}
		} catch(Exception $exception) {
			//rethrow the exception if the retrieval failed
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return $member;
	}

}