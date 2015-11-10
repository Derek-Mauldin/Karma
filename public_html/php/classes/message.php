<?php

/**
 * A cross section of what a message sent using Karma would like
 *
 * This Message can be considered a small example of what services like Karma would store when messages
 * are sent and
 * received using Karma.
 *
 * @author Gerald Fongwe <gfongwe@cnm.edu>
 **/
class Message {
	/**
	 * id for this Message; this is the primary key
	 * @var int $messageId
	 **/
	private $MessageId;
	/**
	 * id of the messageSender that sent this Message; this is a foreign key
	 * @var int $MessageSenderId
	 **/
	private $MessageSenderId;
	/**
	 * id of the MessageReceiver that Received this Message; this is a foreign key
	 * @var int $MessageReceiverId
	 **/
	private $messageReceiverId;
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
	 * @return int value of messagesender id
	 **/
	public function getMessageSenderId() {
		return ($this->MessageSenderId);
	}

	/**
	 * mutator method for messageSender id
	 *
	 * @param int $newMessageSenderId new value of messagesender id
	 * @throws InvalidArgumentException if $newMessageSenderId is not an integer or not positive
	 * @throws RangeException if $newMessageSenderId is not positive
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


	/**
	 * accessor method for messageReceiver id
	 *
	 * @return mixed value of messageReceiver id
	 **/
	public function getMessageReceiverId() {
		return ($this->MessageReceiverId);
	}


	/**
	 * mutator method for messageReceiver id
	 *
	 * @param int $newMessageReceiverId new value of messageReceiver id
	 * @throws InvalidArgumentException if $newMessageReceiverId is not an integer or not positive
	 * @throws RangeException if $newMessagereceiverId is not positive
	 **/
	public function setMessageReceiverId($newMessageReceiverId) {
		// verify the messageReceiver id is valid
		$newMessageReceiverId = filter_var($newMessageReceiverId, FILTER_VALIDATE_INT);
		if($newMessageReceiverId === false) {
			throw(new InvalidArgumentException("messagereceiver id is not a valid integer"));
		}

		// verify the messagereceiver id is positive
		if($newMessageReceiverId <= 0) {
			throw(new RangeException("messagereceiver id is not positive"));
		}

		// convert and store the messagereceiver id
		$this->messageReceiverId = intval($newMessageReceiverId);
	}

	/**
	 * accessor method for message content
	 *
	 * @return string value of message content
	 **/
	public function getMessageContent() {
		return ($this->messageContent);
	}


	/**
	 * mutator method for message content
	 *
	 * @param string $newMessageContent new value of  content
	 * @throws InvalidArgumentException if $newMessageContent is not a string or insecure
	 * @throws RangeException if $newMessageContent is > 20000 characters
	 **/
	public function setMessageContent($newMessageContent) {
		// verify the Message content is secure
		$newMessageContent = trim($newMessageContent);
		$newMessageContent = filter_var($newMessageContent, FILTER_SANITIZE_STRING);
		if(empty($newMessageContent) === true) {
			throw(new InvalidArgumentException("message content is empty or insecure"));
		}

		// verify the message content will fit in the database
		if(strlen($newMessageContent) > 20000) {
			throw(new RangeException("message content too large"));
		}

		// store the message content
		$this->messageContent = $newMessageContent;
	}

	/**
	 * accessor method for message date
	 *
	 * @return DateTime value of message date
	 **/
	public function getMessageDate() {
		return ($this->messageDate);
	}

	/**
	 * mutator method for message date
	 *
	 * @param mixed $newMessageDate message date as a DateTime object or string (or null to load the current time)
	 * @throws InvalidArgumentException if $newMessageDate is not a valid object or string
	 * @throws RangeException if $newMessageDate is a date that does not exist
	 **/
	public function setMessageDate($newMessageDate) {
		// base case: if the date is null, use the current date and time
		if($newMessageDate === null) {
			$this->messageDate = new DateTime();
			return;
		}

		// store the message date
		try {
			$newMessageDate = validateDate($newMessageDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->messageDate = $newMessageDate;
	}


	/**
	 * inserts this Message into mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function insert(PDO $pdo) {
		// enforce the messageId is null (i.e., don't insert a message that already exists)
		if($this->MessageId !== null) {
			throw(new PDOException("not a new message"));
		}

		// create query template
		$query = "INSERT INTO message(messageId, messageSenderId, messageReceiverId, messageContent,
		messsageDate) VALUES(:messageId, :messageSenderId, :messageReceiverId, :messageContent,
		:messageDate)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->messageDate->format("Y-m-d H:i:s");
		$parameters = array("messageId" => $this->messageId, "messageSenderId" => $this->messageSenderId,
				"messageReceiverId" => $this->messagereceiverId, "messageContent" => $this->messageContent,
				"messageDate" => $formattedDate);
		$statement->execute($parameters);

		// update the null messageId with what mySQL just gave us
		$this->messageId = intval($pdo->lastInsertId());
	}


	/**
	 * deletes this Message from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function delete(PDO $pdo) {
		// enforce the messageId is not null (i.e., don't delete a message that hasn't been inserted)
		if($this->messageId === null) {
			throw(new PDOException("unable to delete a message that does not exist"));
		}

		// create query template
		$query = "DELETE FROM message WHERE messageId = :messageId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = array("messageId" => $this->messageId);
		$statement->execute($parameters);
	}

	/*
	public function update(PDO $pdo) {
		if($this->messageId === null) {
		throw(new PDOException("unable to update a message that does not exist"));
		}

		$query = "UPDATE message  SET messageSenderId = : messageSenderId = :messageSenderId,
	messagrreceiverId = :messageReceiverId,
	messageContent = :messageContent, messageDate = :messageDate WHERE messageId = :messageId";
		$statement = $pdo->prepare($query);

		$formattedDate = $this->messageDate->format("Y-m-d H:i:s");
		$parameters = array("messageId" => $this->messageId, "messageSenderId" => $this->messageSenderId,
				messageReceiverId => $this->messageReceiverId, "messageContent" => $this->messageContent,
				"messageDate" => $formattedDate);
		$statement->execute($parameters);
	}
*/

	/**
	 * gets the message by content
	 *
	 * @param PDO $pdo PDO connection object
	 * @param string $messageContent message content to search for
	 * @return SplFixedArray all messages found for this content
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getMessageByTweetContent(PDO $pdo, $messageContent) {
		// sanitize the description before searching
		$messageContent = trim($messageContent);
		$messageContent = filter_var($messageContent, FILTER_SANITIZE_STRING);
		if(empty($messageContent) === true) {
			throw(new PDOException("message content is invalid"));
		}

		// create query template
		$query = "SELECT messageId, messageSenderId, messageReceiverId, messageContent, messageDate
 	FROM message WHERE messageContent LIKE :messageContent";
		$statement = $pdo->prepare($query);

		// bind the message content to the place holder in the template
		$messageContent = "%$messageContent%";
		$parameters = array("messageContent" => $messageContent);
		$statement->execute($parameters);

		// build an array of messages
		$messages = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$message = new Message($row["messageId"], $row["messageSenderId"], $row["messageReceiverId"],
						$row["mesageContent"], $row["messageDate"]);
				$messages[$messages->key()] = $message;
				$messages->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($messages);
	}


	/**
	 * gets the Message by messageId
	 *
	 * @param PDO $pdo PDO connection object
	 * @param int $messageId message id to search for
	 * @return mixed Message found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getByMessageId(PDO $pdo, $messageId) {
		// sanitize the messageId before searching
		$messageId = filter_var($messageId, FILTER_VALIDATE_INT);
		if($messageId === false) {
			throw(new PDOException("message id is not an integer"));
		}
		if($messageId <= 0) {
			throw(new PDOException("message id is not positive"));
		}

		// create query template
		$query = "SELECT messageId, messageSenderId, messageReceiverId, messageContent, messageDate
		FROM message WHERE messageId = :messageId"; $statement = $pdo->prepare($query);

		// bind the message id to the place holder in the template
		$parameters = array("messageId" => $messageId);
		$statement->execute($parameters);

		// grab the message from mySQL
		try {
			$message = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$message = new Message($row["messageId"], $row["messageSenderId"], $row["messageReceiverId"],
				$row["messageContent"], $row["messageDate"]);
			}
		} catch(Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($message);
	}
}

