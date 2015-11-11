<?php
/**
 * Created by PhpStorm.
 * User: Evan
 * Date: 11/8/2015
 * Time: 5:29 PM
 */

class Member{

	private $memberId;

	private $accessLevel;

	private $email;

	private $emailActivation;

	private $passwordHash;

	private $salt;

	public function __construct($newMemberId, $newAccessLevel, $newEmail, $newEmailActivation, $newPasswordHash, $newSalt){
		try{
			$this->setMemberId($newMemberId);
			$this->setAcessLevel($newAccessLevel);
			$this->setEmail($newEmail);
			$this->setEmailActivation($newEmailActivation);
			$this->setPasswordHash($newPasswordHash);
			$this->setSalt($newSalt);
		} catch(InvalidArgumentException $invalidArgument) {
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range){
			throw (new RangeException($range->getMessage(), 0, $range));

		} catch(Exception $exception){
			throw (new Exception ($exception->getMessage(),0 , $exception));
		}
	}

	public function getMemberId(){
		return($this->memberId);
	}

	public function setMemberId($newMemberId){
		if($newMemberId === null){
			$this->memberId = null;
			return;
		}

		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if ($newMemberId === false){
			throw(new InvalidAgrumentException("Member Id is not a valid integer"));
		}

		if($newMemberId <= 0){
			throw(new RangeException ("Member Id is Not Positive"));
		}
		$this->memberId = intval($newMemberId);
	}
	public function getAccessLevel(){
		return($this->accessLevel);
	}

	public function setAccessLevel($newAccessLevel) {
		if($newAccessLevel === null) {
			$this->accessLevel = 2;
			return;
		}

		$newAccessLevel = filter_var($newAccessLevel, FILTER_VALIDATE_INT);
		if($newAccessLevel === false) {
			throw(new InvalidAgrumentException("Access Level is not a valid integer"));
		}

		if($newAccessLevel < 0 || $newAccessLevel > 2) {
			throw(new RangeException ("Access Level  is out of range"));
		}
		$this->accessLevel = intval($newAccessLevel);
	}

	public function getEmail(){
		return($this->email);
	}

	public function setEmail($newEmail){

		$newEmail = trim($newEmail);

		if($newEmail === null){
			throw(new InvalidArgumentException("email can't be null"));
		}

		$newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);

		if(empty($newEmail) === true) {
			throw(new InvalidArgumentException("email content is empty or insecure"));
		}

		if(strlen($newEmail) > 255) {
			throw(new RangeException("email address too long"));
		}

		$this->email = $newEmail;
	}

	public function getEmailActivation(){
		return($this->emailActivation);
	}

	public function setEmailActivation($newEmailActivation) {

		$newEmailActivation = trim($newEmailActivation);

		if($newEmailActivation === null) {
			throw(new InvalidArgumentException("email can't be null"));
		}

		$newEmailActivation = filter_var($newEmailActivation, FILTER_SANITIZE_STRING);

		if(empty($newEmailActivation) === true) {
			throw(new InvalidArgumentException("email content is empty or insecure"));
		}

		if(strlen($newEmailActivation) !== 16) {
			throw(new RangeException("email address too long"));
		}

		$this->emailActivation = $newEmailActivation;
	}
	public function getPasswordHash(){
		return($this->passwordHash);
	}

	public function setPasswordHash($newPasswordHash) {

		if((ctype_xdigit($newPasswordHash)) === false) {
			throw(new InvalidArgumentException ("password hash is empty or insecure"));
		}

		if(strlen($newPasswordHash) !== 128) {
			throw(new RangeException("password hash is not a valid length"));
		}

		$this->passwordHash = $newPasswordHash;
	}

	public function getSalt() {
		return($this->salt);
	}


	public function setSalt($newSalt) {
		if((ctype_xdigit($newSalt)) === false) {
			throw(new InvalidArgumentException ("salt is empty or insecure"));
		}
		if(strlen($newSalt) !== 64) {
			throw(new RangeException("salt is not a valid length"));
		}
		//Store volunteer hash
		$this->salt = $newSalt;
	}

	public function insert(PDO $pdo) {
		if($this->memberId !== null) {
			throw (new PDOException("not a new member"));
		}
		$query = "INSERT INTO member(accessLevel, email, emailActivation, passwordHash,salt) VALUES (:accessLevel, :email, :emailActivation, :passwordHash, :salt)";

		$statement = $pdo->prepare($query);

		$parameters = array(
			"accessLevel" => $this->accessLevel,
			"email" => $this->email,
			"emailActivation" => $this->emailActivation,
			"passwordHash" => $this->passwordHash,
			"salt" => $this->salt,
		);
		$statement->execute($parameters);
		$this->memberId = intval($pdo->lastInsertId());
	}

	public function delete(PDO $pdo) {
		if($this->memberId === null) {
			throw(new PDOException("unable to delete a member that does not exist"));
		}
		$query = "DELETE FROM member WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		$parameters = array("memberId" => $this->memberId);
		$statement->execute($parameters);
	}
	public function update(PDO $pdo) {
		if($this->memberId === null) {
			throw(new PDOException("unable to update a member that does not exist"));
		}
		$query = "UPDATE member SET accessLevel = :accessLevel, email = :email, emailActivation = :emailActivation, passwordHash = :passwordHash, salt = :salt";
		$statement = $pdo->prepare($query);
		$parameters = array("accessLevel" => $this->accessLevel, "email" => $this->email, "emailActivation" => $this->emailActivation, "passwordHash" => $this->passwordHash, "salt" => $this->salt);
		$statement->execute($parameters);
	}

	public static function getMemberByMemberId(PDO $pdo, $memberId) {
		$memberId = filter_var($memberId, FILTER_VALIDATE_INT);
		if($memberId === false) {
			throw(new InvalidArgumentException("member id is not an integer"));
		}
		if($memberId <= 0) {
			throw(new RangeException("MEMBER id is not positive"));
		}
		$query = "SELECT memberId, accessLevel, email, emailActivation, passwordHash, salt FROM member WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		$parameters = array("memberId" => $memberId);
		$statement->execute($parameters);
		try {
			$member = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$member = new Member($row["memberId"], $row["accessLevel"], $row["email"], $row["emailActivation"], $row["passwordHash"],$row["salt"]);
			}
		} catch(Exception $exception) {
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($member);

	}

	public static function getMemberByEmail(PDO $pdo, $email) {
		$email = trim($email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(empty($email) === true) {
			throw (new InvalidArgumentException("email is empty or insecure"));
		}
		$query = "SELECT memberId, accessLevel, email, emailActivation,passwordHash, salt FROM member WHERE email = :email ";
		$statement = $pdo->prepare($query);
		$parameters = array("email" => $email);
		$statement->execute($parameters);
		try {
			$retrievedMember = new Member();
		} catch(Exception $exception) {
			//rethrow the exception if the retrieval failed
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return $retrievedMember;
	}

}