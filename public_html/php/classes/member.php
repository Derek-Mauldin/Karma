<?php
/**
 * Created by PhpStorm.
 * User: Evan
 * Date: 11/8/2015
 * Time: 5:29 PM
 */
/**
 * this will create a member class used to create a profile id
 */
class Member{
	/**
	 * Member Id; this is the primary key
	 * @var int $memberId
	 */

	private $memberId;
	/**
	 * Sets Access Level of the User, Admin, Suspended, User
	 * @var string $accessLevel
	 */

	private $accessLevel;
	/**
	 * email address of member used to sign in
	 * @var string $email
	 */

	private $email;
	/**
	 *activates user email using salt and hash
	 * @var int $emailActivation
	 */

	private $emailActivation;
	/**
	 *hash for member password
	 * @var string $passwordHash
	 */

	private $passwordHash;
	/**
	 *id for salt on member password
	 * @var string $salt
	 */

	private $salt;

	/**
	 * @param mixed $newMemberId of the member or null if new member
	 * @param int $newAccessLevel access level of the new member suspended if new member
	 * @param string $newEmail email of the member
	 * @param int $newEmailActivation activation key for member email, null if confirmed
	 * @param string $newPasswordHash string containing the hash for the member password
	 * @param string $newSalt string containing the salt for the member password
	 * @throws Exception if some other exception is thrown
	 * @throws RangeException if data values are out of bounds
	 * @throws InvalidArgumentException if data types are invalid or insecure
	 */

	public function __construct($newMemberId, $newAccessLevel, $newEmail, $newEmailActivation, $newPasswordHash, $newSalt){
		try{
			$this->setMemberId($newMemberId);
			$this->setAccessLevel($newAccessLevel);
			$this->setEmail($newEmail);
			$this->setEmailActivation($newEmailActivation);
			$this->setPasswordHash($newPasswordHash);
			$this->setSalt($newSalt);

		} catch(InvalidArgumentException $invalidArgument) {
				//rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));

		} catch(RangeException $range){
				//rethrow the exception to the caller
			throw (new RangeException($range->getMessage(), 0, $range));

		} catch(Exception $exception){
				//rethrow the generic exception
			throw (new Exception ($exception->getMessage(),0 , $exception));
		}
	}

	/**
	 *accessor method for member id
	 *
	 * @return int for member id
	 */

	public function getMemberId(){
		return($this->memberId);
	}

	/**
	 *mutator method for member id
	 * @param int $newMemberId new value of member id
	 * @throws InvalidArgumentException if $memberId id not an integer
	 * @throws RangeException if $memberId is not positive
	 */

	public function setMemberId($newMemberId){
		// if new member id is null SQL will assign a new id
		if($newMemberId === null){
			$this->memberId = null;
			return;
		}
		// verify the member id is valid
		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if ($newMemberId === false){
			throw(new InvalidArgumentException("Member Id is not a valid integer"));
		}
		// verify the member id is positive
		if($newMemberId <= 0){
			throw(new RangeException ("Member Id is Not Positive"));
		}
		//convert and store the member id
		$this->memberId = intval($newMemberId);
	}

	/**
	 * accessor method for access level
	 * @return int value of access level
	 */
	public function getAccessLevel(){
		return($this->accessLevel);
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
			$this->accessLevel = "s";
			return;
		}
		//verify the access level is a,s,u
		$newAccessLevel = filter_var($newAccessLevel, FILTER_SANITIZE_STRING);
		if($newAccessLevel === false) {
			throw(new InvalidArgumentException("Access Level is corrupt"));
		}

		$newAccessLevel = strtolower($newAccessLevel);

		if($newAccessLevel === "s") {
			$this->accessLevel = $newAccessLevel;
		} elseif ($newAccessLevel === "a"){
			$this->accessLevel = $newAccessLevel;
		} elseif($newAccessLevel === "u") {
			$this->accessLevel = $newAccessLevel;
		} else {
			throw(new OutOfRangeException("Access Level needs to be A or S or U"));
		}

	}

	/**
	 * accessor method for member email
	 *
	 *@return string value of member email
	 **/

	public function getEmail(){
		return($this->email);
	}

	/**
	 *mutator method for member email
	 *
	 * @param string $newEmail new member email
	 * @throws InvalidArgumentException if $newEmail is not a string or insecure
	 * @throws RangeException if $newEmail is >255 characters
	 */

	public function setEmail($newEmail){

		$newEmail = trim($newEmail);

		//verify the email is secure

		if($newEmail === null){
			throw(new InvalidArgumentException("email can't be null"));
		}

		$newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);

		if(empty($newEmail) === true) {
			throw(new InvalidArgumentException("email content is empty or insecure"));
		}
		//verify the email is not > 255 characters

		if(strlen($newEmail) > 255) {
			throw(new RangeException("email address too long"));
		}

		//store the email address

		$this->email = $newEmail;
	}

	/**
	 *accessor for email activation
	 *
	 * @return int for email activation
	 */

	public function getEmailActivation(){
		return($this->emailActivation);
	}

	/**
	 * mutator for email activation
	 *
	 *@param string $newEmailActivation
	 *@throws InvalidArgumentException if activation is not secure or invalid
	*/

	public function setEmailActivation($newEmailActivation) {
		//verify the activation code is valid

		$newEmailActivation = trim($newEmailActivation);

		if($newEmailActivation === null) {
			throw(new InvalidArgumentException("email can't be null"));
		}

		$newEmailActivation = filter_var($newEmailActivation, FILTER_SANITIZE_STRING);

		if(empty($newEmailActivation) === true) {
			throw(new InvalidArgumentException("email content is empty or insecure"));
		}
		//verify the activation code is not too long

		if(strlen($newEmailActivation) !== 16) {
			throw(new RangeException("activation code should be 16 hex digits"));
		}
		//store activation code

		$this->emailActivation = $newEmailActivation;
	}
	/**
	 * accessor method for password hash
	 * @return string value of password hash
	*/
	public function getPasswordHash(){
		return($this->passwordHash);
	}
	/**
	 * mutator method for password hash
	 *@return string value of hash
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

		$this->passwordHash = $newPasswordHash;
	}
	/**
	 * accessor method for salt
	 *
	 * @return string value of salt
	 */

	public function getSalt() {
		return($this->salt);
	}
	/**
	 * mutator method for salt
	 *
	 * @param string $newSalt
	 * @throws InvalidArgumentException if salt is empty or insecure
	 * @throws RangeException if salt is not 64 characters
	 */


	public function setSalt($newSalt) {
		//verify salt is hex
		if((ctype_xdigit($newSalt)) === false) {
			throw(new InvalidArgumentException ("salt is empty or insecure"));
		}
		//verify salt is exactly 64 characters
		if(strlen($newSalt) !== 64) {
			throw(new RangeException("salt is not a valid length"));
		}
		//Store salt
		$this->salt = $newSalt;
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
		$query = "INSERT INTO member(memberAccessLevel, email, emailActivation, passwordHash,salt) VALUES (:memberAccessLevel, :email, :emailActivation, :passwordHash, :salt)";

		$statement = $pdo->prepare($query);

		//attaches the atributes to the right places in the template

		$parameters = array(
			"memberAccessLevel" => $this->accessLevel,
			"email" => $this->email,
			"emailActivation" => $this->emailActivation,
			"passwordHash" => $this->passwordHash,
			"salt" => $this->salt,
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
		$query = "UPDATE member SET accessLevel = :accessLevel, email = :email, emailActivation = :emailActivation, passwordHash = :passwordHash, salt = :salt";
		$statement = $pdo->prepare($query);
		//attaches attributes to the right place in the template
		$parameters = array("accessLevel" => $this->accessLevel, "email" => $this->email, "emailActivation" => $this->emailActivation, "passwordHash" => $this->passwordHash, "salt" => $this->salt);
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
		$query = "SELECT memberId, accessLevel, email, emailActivation, passwordHash, salt FROM member WHERE memberId = :memberId";
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
				$member = new Member($row["memberId"], $row["accessLevel"], $row["email"], $row["emailActivation"], $row["passwordHash"],$row["salt"]);
			}
		} catch(Exception $exception) {
			//if the row cannot be created rethrow exception
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($member);

	}

	/**
	 * get member by member email
	 *
	 * @param PDO $pdo pdo connection object
	 * @param int $memberEmail members email account
	 * @return SplFixedArray all members with this email
	 * @throws PDOException if mySQL related errors occur
	 **/

	public static function getMemberByEmail(PDO $pdo, $email) {
		//sanatize the input
		$email = trim($email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(empty($email) === true) {
			throw (new InvalidArgumentException("email is empty or insecure"));
		}
		//create the query template
		$query = "SELECT memberId,accessLevel, email, emailActivation,passwordHash, salt FROM member WHERE email = :email ";
		$statement = $pdo->prepare($query);
		//attached atributes to the right place in the template
		$parameters = array("email" => $email);
		$statement->execute($parameters);
		//call the function to build an array of the values
		try {
			$retrievedMember = new Member();
		} catch(Exception $exception) {
			//rethrow the exception if the retrieval failed
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return $retrievedMember;
	}

}