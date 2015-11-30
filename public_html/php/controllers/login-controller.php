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

require_once(dirname(__DIR__) . "classes/autoload.php");
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


	//ensures that the fields are filled out
	if(@isset($_POST["email"]) === false ||
		@isset($_POST["password"]) === false) {
	throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}

	$_POST["email"] = Filter::filterEmail($_POST["email"],"email");
	$_POST["password"] = Filter::filterString($_POST['password'], "password");

	// connect to DB and find member by email
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$member = Member::getMemberByEmail($pdo, $_POST["email"]);
	if($member === null) {
	throw(new InvalidArgumentException("Email or Password is invalid"));
	}

	// get member hash and compare
	$hash = hash_pbkdf2("sha512", $_POST["password"], $member->getSalt(), 4096, 255);
	if($hash !== $member->getHash()) {
	throw(new InvalidArgumentException("Email or Password is invalid"));
	}

	// get member profile
	$profile = Profile::getProfileByMemberId($pdo, $member->getMemberId());

	// add $profile and user name to the session
	$_SESSION["user"] = $profile;
	$_SESSION["memberId"] = $member->getMemberId();

	echo "<p class=\"alert alert-success\">Welcome Back, " . $userName . "!<p/>";

	} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";

}