<?php
	require_once(dirname(__DIR__) . "/classes/autoload.php");
	require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
	require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
	require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

	try{
		//verify that the XSRF from the form is a valid token
		verifyXsrf();
		//start a connection to pdo
		$pdo = connectToEnctyptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

		//Get the member id from the session
		$memberId = $_SESSION['memberId'];

		//Check if the profileId passed from the form is valid and then get the profile if okay.
		if(@isset($memberId) !== false){
			$profile = Profile::getProfileByMemberId($pdo, $memberId);
		} else {
			throw(new InvalidArgumentException('Member id not found or is invalid.'));
		}

		//Check if the user input values are valid
		if(/*@isset($_POST['profileBlurb']) 	=== false ||*/
			@isset($_POST['profileHandle']) 	=== false ||
			@isset($_POST['firstName']) 		=== false ||
			@isset($_POST['lastName'])			=== false){
			throw(new InvalidArgumentException('The form is not complete or is missing inputs'));
		} else {
			if(@isset($_POST['profileBlurb']) === true) {
				$profileBlurb = Filter::filterString($_POST['profileBlurb'], 'profileBlurb');
			} else {
				$profileBlurb = null;
			}
			if(array_key_exists($_POST, "profileBlurb")) {
				$profileBlurb =  Filter::filterString($_POST['profileBlurb'], 'profileBlurb');
			}
			$profileHandle 	= Filter::filterString($_POST['profileHandle'], 'profileHandle');
			$firstName 			= Filter::filterString($_POST['firstName'], 'firstName');
			$lastName 			= Filter::filterString($_POST['lastName'], 'lastName');
		}

		if($profile === null) {
			throw(new InvalidArgumentException("profile for this member id does not exist"));
		}

		//Verify that the handle has not been taken by another user
		$checkProfileHandle = Profile::getProfileByProfileHandle($pdo, $profileHandle);
		if($checkProfileHandle !== null && $checkProfileHandle->getProfileId() !== $profile->getProfileId()){
			throw(new InvalidArgumentException('The handle you have chosen has already been taken by another user.'));
		} else if($profile->getProfileId() === null) {
//			$profile->insertProfile($pdo);
			throw(new InvalidArgumentException('The profile does not exist'));
		} else {
			//Set the profiles values to the form values
			$profile->setProfileBlurb($profileBlurb);
			$profile->setProfileHandle($profileHandle);
			$profile->setProfileFirstName($firstName);
			$profile->setProfileLastName($lastName);
			$profile->updateProfile($pdo);
		}

	}catch (Exception $exception){
		echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
	}
