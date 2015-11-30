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
	if(@isset($_POST["username"]) === false ||
		@isset($_POST["need-title"]) === false ||
		@isset($_POST["need-desciption"]) === false) {
		throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}

	$username = Filter::filterString($_POST["username"], "username");
	$needTitle = Filter::filterString($_POST["need-title"], "need-title");
	$needDescription = Filter::filterString($_POST["need-description"], "need-description");


	// connect to DB and find need by profile handle
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");
	$needs = Need::getNeedsByProfileId($pdo, $username);
	$need->setNeedDescription ($needDescription);
	$need->setneedTitle($needTitle);
	$need->update($pdo);


	echo "<p class=\"alert alert-success\">Welcome Back, " . $userName . "!</p>";

} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";

}