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

	if(empty($_GET["emailActivation"]) === true ||
	   empty ($_GET["memberEmail"]) === true ){
		throw(new InvalidArgumentException("Missing Email Activation Code or Email Address"));
	}

	$_GET["emailActivation"] = Filter::filterString($_GET["emailActivation"], "email activation code");
	$_GET["memberEmail"] = Filter::filterEmail($_GET["memberEmail"], "email address");

	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$member = Member::getMemberByEmail($pdo, $_GET["memberEmail"]);

	if($member === null) {
		throw(new InvalidArgumentException("Incorrect or non-existant member ID"));
	}

	if($_GET["emailActivation"] !== $member->getEmailActivation()) {
		throw(new InvalidArgumentException("Incorrect Activation Code"));
	}

	$member->setEmailActivation(null);
	$member->setAccessLevel("U");
	$member->update($pdo);

	$profile = Profile::getProfileByMemberId($pdo, $member->getMemberId());
	$handle = $profile->getProfileHandle();


	$_SESSION["memberId"] = $member->getMemberId();


	echo 	"<div class='panel panel-default' id='panel-wrapper'>";
	echo 	"<div class='panel-heading' id='success'>";
	echo	"<h1 class='lead' id='success'>Welcome $handle!<br> Successful Registration!</h1>";
	echo "<a href='https://bootcamp-coders.cnm.edu/~dmauldin2/karma/public_html/index.php'>Click to go to Karma Home Page</a>";
	echo 	"</div></div>";


	header("Location:https://bootcamp-coders.cnm.edu/~dmauldin2/karma/public_html/index.php");

	echo "<p class=\"alert alert-info\">Registration Complete -- WELCOME TO KARMA!!!<p/>";

} catch(Exception $exception){
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";
}