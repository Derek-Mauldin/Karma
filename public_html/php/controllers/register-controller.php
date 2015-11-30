<?php
/**
 *
 * controller for Karma register-form
 *
 * @throws InvalidArgumentException if the form is incomplete
 * @throws InvalidArgumentException if password and confirm-password do not match
 * @throws InvalidArgumentException if userName already exists in the database
 *
 **/

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/sendEmail.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");


try {

	// verify the XSRF challenge
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	verifyXsrf();

	// ensures that the form fields are filled out
	if(@isset($_POST["firstName"])        === false ||
		@isset($_POST["lastName"])         === false ||
		@isset($_POST["userName"])         === false ||
		@isset($_POST["email"])            === false ||
		@isset($_POST["password"])         === false ||
		@isset($_POST["confirm-password"]) === false
	) {
		throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}


	// trim  and sanitize input
	$_POST["firstName"]         = Filter::filterString("firstName", $_POST["firstName"]);
	$_POST["lastName"]          = Filter::filterString("lastName", $_POST["lastName"]);
	$_POST["userName"]          = Filter::filterString("userName", $_POST["userName"]);
	$_POST["password"]          = Filter::filterString("password", $_POST["password"]);
	$_POST["confirm-password"]  = Filter::filterString("confirm-password", $_POST["confirm-password"]);
	$_POST["email"]             = Filter::filterEmail("email", $_POST["email"]);


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
	$hash = hash_pbkdf2("sha512", $_POST["password"], $salt, 4096, 255);
	$emailActivation = bin2hex(openssl_random_pseudo_bytes(16));


	// create a new member and insert into mysql
	$member = new member(null, "s", $_POST["email"], $emailActivation, $hash, $salt);
	$member->insert($pdo);


	// create a new profile with the new member ID and insert into mysql
	$profile = new Profile(null, $member->getMemberId(), "", $_POST["userName"], $_POST["firstName"], $_POST["lastName"]);
	$profile->insertProfile($pdo);


	// create message for email activation
	$messageSubject = "Karmafied Account Activation";

	$message = <<< EOF
<h1>This is an Important Message about your Account Activation</h1>
<p>To certify this email address and activate your account, please visit: <a href="$confirmLink">Confirmation</a></p>
EOF;


	// send confirmation email to new member
	sendEmail($_POST["email"], $_POST["firstName"], $_POST["lastName"] ,$messageSubject, $message);


}catch (Exception $e) {
	echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
}