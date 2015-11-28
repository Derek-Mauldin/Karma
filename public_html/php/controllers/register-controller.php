<?php
/**
 *
 * controller for Karma register-form
 *
 * @throws InvalidArgumentException if the form is incomplete
 * @throws InvalidArgumentException for invalid firstName
 * @throws InvalidArgumentException for invalid lastName
 * @throws InvalidArgumentException for invalid userName
 * @throws InvalidArgumentException for invalid email
 * @throws InvalidArgumentException for invalid password
 * @throws InvalidArgumentException for invalid confirm-password
 * @throws InvalidArgumentException if password and confirm-password do not match
 * @throws InvalidArgumentException if userName already exists in the database
 *
 */

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/mailer.php");


try {

	// verify the XSRF challenge
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	verifyXsrf();

	// ensures that the form fields are filled out
	if(@isset($_POST["firstName"]) === false ||
		@isset($_POST["lastName"]) === false ||
		@isset($_POST["userName"]) === false ||
		@isset($_POST["email"]) === false ||
		@isset($_POST["password"]) === false ||
		@isset($_POST["confirm-password"]) === false
	) {
		throw(new InvalidArgumentException("The form is not complete. Please verify and try again"));
	}

	// trim input
	trim($_POST["firstName"]);
	trim($_POST["lastName"]);
	trim($_POST["userName"]);
	trim($_POST["email"]);
	trim($_POST["password"]);
	trim($_POST["confirm-password"]);

	// sanitize  input
	if(filter_var($_POST["firstName"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid First Name"));
	}
	if(filter_var($_POST["lastName"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid Last Name"));
	}
	if(filter_var($_POST["userName"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid userName"));
	}
	if(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) === false){
		throw(new InvalidArgumentException("invalid email"));
	}
	if(filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password"));
	}
	if(filter_var($_POST["confirm-password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password confirmation"));
	}


	// verify that the password and password confirmation fields contain the same value
	if($_POST["password"] !== $_POST["confirm-password"]) {
		throw(new InvalidArgumentException("password and confirmation do not match"));
	}


	// check to see if user handle is already being used by a profile
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");
	$profile = Profile::getProfileByProfileHandle($pdo, $_POST["userName"]);
	if(is_object($profile) === true) {
		throw(new InvalidArgumentException("Try a different User Name"));
	}


	// create a salt, hash, and email activation code for a new member
	$salt = bin2hex(openssl_random_pseudo_bytes(164));
	$hash = hash_pbkdf2("sha512", $_POST["password"], $SALT, 4096, 255);
	$emailActivation = bin2hex(openssl_random_pseudo_bytes(16));


	// create a new member and insert into mysql
	$member = new member(null, "s", $_POST["email"], $emailActivation, $hash, $salt);
	$member->insert($pdo);


	// create a new profile with the new member ID and insert into mysql
	$profile = new Profile(null, $member->getMemberId(), "", $_POST["userName"], $_POST["firstName"], $_POST["lastName"]);
	$profile->insertProfile($pdo);


	// create message for email activation
	$message = <<< EOF
<h1>This is an Important Message about your Account Activation</h1>
<p>To certify this email address and activate your account, please visit: <a href="$confirmLink">Confirmation</a></p>
EOF;


	// send confirmation email to new member
	sendEmail($_POST["email"], $_POST["firstName"], $_POST["lastName"] ,$message);


}catch (Exception $e) {
	echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
}