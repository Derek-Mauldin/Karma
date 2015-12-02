<?php
/**
 *
 * controller for Karma login-form
 *
 * @throws InvalidArgumentException if the form is incomplete
 * @throws InvalidArgumentException if password is invalid
 * @throws InvalidArgumentException if email is invalid
 *
 **/

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

try {

		// verify the XSRF challenge
		if(session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		verifyXsrf();


	//ensures that the fields are filled out
	if(empty($_POST["logInEmail"]) === true ||
		empty($_POST["logInPassword"]) === true) {
	throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}

	$_POST["logInEmail"] = Filter::filterEmail($_POST["logInEmail"],"email");
	$_POST["logInPassword"] = Filter::filterString($_POST["logInPassword"], "password");

	// connect to DB and find member by email
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$member = Member::getMemberByEmail($pdo, $_POST["logInEmail"]);
	if($member === null) {
	throw(new InvalidArgumentException("Email or Password is invalid"));
	}

	// get member hash and compare
	$hash = hash_pbkdf2("sha512", $_POST["logInPassword"], $member->getSalt(), 4096, 128);
	if($hash !== $member->getPasswordHash()) {
	throw(new InvalidArgumentException("Email or Password is invalid"));
	}

	// get member profile
	$profile = Profile::getProfileByMemberId($pdo, $member->getMemberId());

	// add $profile and user name to the session
	$_SESSION["user"] = $profile;
	$_SESSION["memberId"] = $member->getMemberId();

	echo "<p class=\"alert alert-info\">Welcome Back<p/>";

	} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";

}