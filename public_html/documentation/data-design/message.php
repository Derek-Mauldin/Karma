<?php

/**
 * A cross section of what a message sent using Karma would like
 *
 * This Message can be considered a small example of what services like Karma would store when messages are sent and
 * received using Karma.
 *
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class Message {
	/**
	 * id for this Tweet; this is the primary key
	 * @var int $messageId
	 **/
	private $MessageId;
	/**
	 * id of the Profile that sent this Message; this is a foreign key
	 * @var int $MessageSenderId
	 **/
	private $MessageSenderId;
	/**
	 * id of the Profile that Received this Message; this is a foreign key
	 * @var int $MessageReceiverId
	 **/
	private $messageReceiver;
	 /**
	 * actual textual content of this Message
	 * @var string $messageContent
	 **/
	private $messageContent;
	/**
	 * date and time this Message was sent, in a PHP DateTime object
	 * @var DateTime $tweetDate
	 **/
	private $messageDate;
}