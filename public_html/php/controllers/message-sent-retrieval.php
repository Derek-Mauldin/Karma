<?php

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");


try {
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

	// connect to database
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$profile = $_SESSION['profile'];


	// get needs from database

	$messagesSent = Message::getMessagesBySenderId($pdo, $profile->getProfileId());
	$messagesSent->rewind();
	$messagesSentCount = $messagesSent->count();


	// create each need panel and send to front
	for($i=1; $i <= $messagesSentCount; $i++) {

		$message = $messagesSent[$messagesSent->key()];
		$profileHandle = $profile->getProfileHandle();
		$messageContent = $message->getMessageContent();
		$messageDate = $message->getMessageDate()->format("Y-m-d H:i:s");

		echo <<< BLAME_ROCHELLE
		<tr>
		<td><input type="checkbox"></td>
		<td class="mailbox-name"><a href="read-mail.html">$profileHandle</a></td>
		<td class="mailbox-subject">$messageContent</td>
		<td class="mailbox-attachment"></td>
		<td class="mailbox-date">$messageDate</td>
		</tr>
BLAME_ROCHELLE;

		$messagesSent->next();

	}

} catch(Exception $exception) {
	echo $exception;

}