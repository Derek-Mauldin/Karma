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
	 * @var DateTime $messageDate
	 **/
	private $messageDate;


	/**
	 * constructor for this Message
	 *
	 * @param mixed $newMessageId id of this Message or null if a new Message
	 * @param int $newMessageSenderId id of the Profile that sent this Message
	 * @param int $newMessageReceiverId id of the Profile that received this Message
	 * @param string $newMessageContent string containing actual message data
	 * @param mixed $newMessageDate date and time Message was sent or null if set to current date and time
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 **/
	public function __construct($newMessageId, $newMessageSenderId, $newMessageReceiverId, $newMessageContent,
										 $newMessageDate = null) {
		try {
			$this->setMessageId($newMessageId);
			$this->setMesaageSenderId($newMessageSenderId);
			$this->setMessageReceiverId($newMessageReceiverId);
			$this->setMessageContent($newMessageContent);
			$this->setMessageDate($newMessageDate);
		} catch(InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			// rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			// rethrow generic exception
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * accessor method for message id
	 *
	 * @return mixed value of message id
	 **/
	public function getMessageId() {
		return ($this->MessageId);
	}


	/**
	 * mutator method for message id
	 *
	 * @param mixed $newMessageId new value of message id
	 * @throws InvalidArgumentException if $newMessageId is not an integer
	 * @throws RangeException if $newMessageId is not positive
	 **/
	public function setMessageId($newMessageId) {
		// base case: if the mesaage id is null, this a new message without a mySQL assigned id (yet)
		if($newMessageId === null) {
			$this->messageId = null;
			return;
		}

		// verify the message id is valid
		$newMessageId = filter_var($newMessageId, FILTER_VALIDATE_INT);
		if($newMessageId === false) {
			throw(new InvalidArgumentException("message id is not a valid integer"));
		}

		// verify the message id is positive
		if($newMessageId <= 0) {
			throw(new RangeException("message id is not positive"));
		}

		// convert and store the message id
		$this->messageId = intval($newMessageId);
	}


	/**
	 * accessor method for messagesender id
	 *
	 * @return int value of profile id
	 **/
	public function getMessageSenderId() {
		return ($this->messageSenderId);
	}

	/**
	 * mutator method for messageSender id
	 *
	 * @param int $newMessageId new value of profile id
	 * @throws InvalidArgumentException if $newMessageId is not an integer or not positive
	 * @throws RangeException if $newMessageId is not positive
	 **/
	public function setMessageSenderId($newMessageSenderId) {
		// verify the messagesender id is valid
		$newMessageSenderId = filter_var($newMessageSenderId, FILTER_VALIDATE_INT);
		if($newMessageSenderId === false) {
			throw(new InvalidArgumentException("messagesender id is not a valid integer"));
		}

		// verify the messagesender id is positive
		if($newMessageSenderId <= 0) {
			throw(new RangeException("messagesender id is not positive"));
		}

		// convert and store the messagesender id
		$this->messagesenderId = intval($newMessageSenderId);
	}
}

