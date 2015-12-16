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

	$messagesReceived = Message::getMessagesByReceiverId($pdo, $profile->getProfileId());
	$messagesReceived->rewind();
	$messagesReceivedCount = $messagesReceived->count();


	// create each need panel and send to front
	for($i=1; $i <= $messagesReceivedCount; $i++) {

		$message = $messagesReceived[$messagesReceived->key()];

		$messageSenderId = $message->getMessageSenderId();
		$messageSender = Profile::getProfileByProfileId($pdo, $messageSenderId);
		$messageSenderUserName = $messageSender->getProfileHandle();
		$messageContent = $message->getMessageContent();

		$messageDate = $message->getMessageDate()->format("Y-m-d H:i:s");

	echo <<< BLAME_ROCHELLE
		<li class="list-group-item" id="message-wrapper">
		<div class="row" id="message" >

      <div class="col-xs-10 col-md-10" id="message-body">
		<div class="message-header"><a href="#"></a>
		<div class="mic-info">
		By: <a href="#">$messageSenderUserName</a> on $messageDate;
		</div><!--/.mic-info-->
		</div><!--/.message-header-->

		<div class="message-body">
		$messageContent;
		</div><!--/.message-body-->

		<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
		<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
BLAME_ROCHELLE;

		$messagesReceived->next();

	}

	} catch(Exception $exception) {
			echo $exception;

}