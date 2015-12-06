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
 require_once(dirname(dirname(__DIR__)) . "/lib/php/sendEmail.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

try {

	// verify the XSRF challenge
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	verifyXsrf();


	//ensures that the fields are filled out
	if(empty($_POST["messageSender"]) === true ||
		empty($_POST["messageReceiver"]) === true ||
		empty($_POST["kMessage"]) === true ) {
		throw(new InvalidArgumentException("The entries on the form are not complete. Please verify and try again"));
	}

	$messageSender = Filter::filterString($_POST["messageSender"], "messageSender");
	$messageReceiver = Filter::filterString($_POST["messageReceiver"], "messageReceiver");
	$kMessage = Filter::filterString($_POST["kMessage"], "kMessage");


	// connect to DB and find Sender and receiver  by profile handle
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");
	$sProfile = Profile::getProfileByProfileHandle($pdo,$messageSender);
	$rProfile = Profile::getProfileByProfileHandle($pdo,$messageReceiver);

	if(($sProfile === null) || ($rProfile === null)) {
		throw(new InvalidArgumentException("sender or receiver does not exist"));
	}

	// create message and insert into the DB
	$message = new Message(null, $sProfile->getProfileId(), $rProfile->getProfileId(),$kMessage);
	$message->insert($pdo);


	// create email message to sender user
	$messageSubject = "Message alert from karma";
	$message = <<< EOF
<h1>This is a message alert from karma</h1>
<p>A Karma user has sent you a message.  Please log in to your Karma account to see your message.</p>
EOF;


	// send email to receiver of message
	$member = Member::getMemberByMemberId($pdo, $rProfile->getMemberId());
	sendEmail($member->getEmail(), $rProfile->getProfileFirstName(), $rProfile->getProfileLastName(), $messageSubject, $message);

	// successful insert alert
	echo "<p class=\"alert alert-info\">Successful Insertion of new message</p>";

	// unsuccessful insert alert
} catch(Exception $exception) {
	echo "<p class=\"alert alert-danger\">Exception: " . $exception->getMessage() . "</p>";

}