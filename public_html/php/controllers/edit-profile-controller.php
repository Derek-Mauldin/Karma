<?php
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

	//start a connection to pdo
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	//Get the member id from the session
	//$memberId = $_SESSION['memberId'];
	$memberId = 1;

	//Check if the memberId passed from the form is valid and then get the profile if okay.
	if(empty($memberId) !== true) {
		$profile = Profile::getProfileByMemberId($pdo, $memberId);
		$member = Member::getMemberByMemberId($pdo, $memberId);
	} else {
		throw(new InvalidArgumentException("member id is not available"));
	}

	// check that profile and member exists for this member id
	if(($profile === null) || ($member === null)) {
		throw(new InvalidArgumentException("profile or member does not exist for the member id"));
	}

	//Check if the user input values are valid
	if( empty($_POST['userName'])      === true ||
		 empty($_POST['firstName'])     === true ||
		 empty($_POST['lastName'])      === true ||
		 empty($_POST["email"])         === true ) {
		throw(new InvalidArgumentException('The form is not complete or is missing inputs'));
	}

	if($_POST["blurb"] !== "") {
		$profileBlurb = Filter::filterString($_POST['blurb'], 'blurb');
	}
	else {
		$profileBlurb = "";
	}
	$profileHandle = Filter::filterString($_POST["userName"], 'profileHandle');
	$firstName     = Filter::filterString($_POST['firstName'], 'firstName');
	$lastName      = Filter::filterString($_POST['lastName'], 'lastName');
	$email         = Filter::filterEmail($_POST['email'], 'email');


// Verify that the email address has not been taken by another user
	$checkMemberEmail = Member::getMemberByEmail($pdo, $email);
	if( ($checkMemberEmail !== null) && ($checkMemberEmail->getMemberId() !== $memberId) ) {
		throw(new InvalidArgumentException('The email address you have entered is already being used.'));
	}


	// Verify that the handle has not been taken by another user
	$checkProfileHandle = Profile::getProfileByProfileHandle($pdo, $profileHandle);
	if( ($checkProfileHandle !== null) && ($checkProfileHandle->getMemberId() !== $memberId) ) {
		throw(new InvalidArgumentException('The user name you have chosen has already been taken by another user.'));
	}

	// password change if requested
	if( 	($_POST["password"] !== "") &&
			($_POST["newPassword"] !== "") &&
			($_POST["confirmPassword"] !== "") ) {

			// confirm curent password
			$hash = hash_pbkdf2("sha512", $_POST["password"], $member->getSalt(), 4096, 128);
			if($hash !== $member->getPasswordHash()) {
				throw(new InvalidArgumentException("Current Password is incorrect"));
			}

			// change password
			$salt = bin2hex(openssl_random_pseudo_bytes(32));
			$hash = hash_pbkdf2("sha512", $_POST["newPassword"], $salt, 4096, 128);

			$member->setPasswordHash($hash);
		   $member->setSalt($salt);
			$member->update($pdo);

	}


	//Set the profiles values and member values to the form values
	$profile->setProfileBlurb($profileBlurb);
	$profile->setProfileFirstName($firstName);
	$profile->setProfileLastName($lastName);
	$profile->setProfileHandle($profileHandle);
	$profile->updateProfile($pdo);
	$member->setEmail($email);
	$member->update($pdo);


	echo "<p class=\"alert alert-info\">Profile Successfully Updated</p>";

} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";
}
