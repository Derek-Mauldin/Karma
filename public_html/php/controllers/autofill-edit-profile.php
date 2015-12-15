<?php
/**
 *
 * controller for Karma email activation
 *
 * @throws InvalidArgumentException if activation code is missing or invalid
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
	//verify that the XSRF from the form is a valid token
	verifyXsrf();

	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$profile = $_SESSION['profile'];
	$member = Member::getMemberByEmail($pdo, $profile->getMemberId());

	$values = array('blurb' => $profile->getProfileBlurb(), 'firstName' => $profile->getProfileFirstName(),
	                'lastName' => $profile->getProfileLastName(), 'userName' => $profile->getProfileHandle(),
	                'email' => $member->getEmail());

	echo json_encode($values);

} catch(Exception $exception){
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";
}