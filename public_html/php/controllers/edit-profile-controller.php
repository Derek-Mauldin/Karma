<?php
	require_once(dirname(__DIR__) . "/classes/autoload.php");
	require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
	require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
	require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

	try{
		// verify the XSRF challenge
		if(session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		//verify that the XSRF from the form is a valid token
		verifyXsrf();

		//start a connection to pdo
		$pdo = connectToEnctyptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

		//Get the member id from the session
		$memberId = $_SESSION['memberId'];

		//Check if the profileId passed from the form is valid and then get the profile if okay.
		if(@isset($memberId) !== false){
			$profile = Profile::getProfileByMemberId($pdo, $memberId);
			$member = Member::getMemberByMemberId($pdo, $memberId);
		} else {
			throw(new InvalidArgumentException('Member id not found or is invalid.'));
		}

		//Check if the user input values are valid
		if(empty($_POST['password'])      	=== true ||
			empty($_POST['profileHandle']) 	=== true ||
			empty($_POST['firstName']) 		=== true ||
			empty($_POST['lastName'])			=== true ||
			empty($_POST["email"])				=== true ||
			empty($_POST["confirmPassword"]) === true) {

			throw(new InvalidArgumentException('The form is not complete or is missing inputs'));
		}
			$profileBlurb = null;
			if(array_key_exists($_POST, "profileBlurb")) {
				$profileBlurb =  Filter::filterString($_POST['profileBlurb'], 'profileBlurb');
			}
			$profileHandle 	= Filter::filterString($_POST['profileHandle'], 'profileHandle');
			$firstName 			= Filter::filterString($_POST['firstName'], 'firstName');
			$lastName 			= Filter::filterString($_POST['lastName'], 'lastName');
			$email				= Filter::filterEmail($_POST['email'], 'email');
			$password			= Filter::filterString($_POST['password'], 'password');
			$confirmPassword = Filter::filterString($_POST['confirmPassword'], 'confirmPassword');


		if(($profile === null) || ($member === null)) {
			throw(new InvalidArgumentException("profile or member does not exist for the member id"));
		}

		//Verify that the handle has not been taken by another user
		$checkProfileHandle = Profile::getProfileByProfileHandle($pdo, $profileHandle);
		if($checkProfileHandle !== null){
			throw(new InvalidArgumentException('The user name you have chosen has already been taken by another user.'));
		}


			//Set the profiles values and member values to the form values
			$profile->setProfileBlurb($profileBlurb);
			$profile->setProfileHandle($profileHandle);
			$profile->setProfileFirstName($firstName);
			$profile->setProfileLastName($lastName);
			$profile->updateProfile($pdo);
		   $member->setEmail($email);
		   $member->update($pdo);


	}catch (Exception $exception){
		echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
	}
