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
	if(empty($_POST["username"]) === true ||
		empty($_POST["needTitle"]) === true  ||
		empty($_POST["needDescription"]) === true) {
		throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}

	$username = Filter::filterString($_POST["username"], "username");
	$needTitle = Filter::filterString($_POST["needTitle"], "needTitle");
	$needDescription = Filter::filterString($_POST["needDescription"], "needDescription");


	// connect to DB and find profile by profile handle
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");
	$profile = Profile::getProfileByProfileHandle($pdo,$username);

	$need = new Need(null, $profile->getProfileId(), $needDescription, 0, $needTitle);
	$need->insert($pdo);

   echo "<p class=\"alert alert-info\">Succesful need insertion</p>";

} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";

}