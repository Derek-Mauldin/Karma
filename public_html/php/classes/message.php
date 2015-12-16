<?php

require_once((dirname(dirname(__DIR__))) . "/lib/php/date-utils.php");

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
	 *
	 * @var int $messageId
	 **/
	private $messageId;
	/**
	 * id of the messageSender that sent this Message; this is a foreign key
	 *
	 * @var int $messageSenderId
	 **/
	private $messageSenderId;
	/**
	 * id of the MessageReceiver that Received this Message; this is a foreign key
	 *
	 * @var int $MessageReceiverId
	 **/
	private $messageReceiverId;
	/**
	 * actual textual content of this Message
	 *
	 * @var string $messageContent
	 **/
	private $messageContent;
	/**
	 * date and time this Message was sent, in a PHP DateTime object
	 *
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
			$this->setMessageSenderId($newMessageSenderId);
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
		return ($this->messageId);
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
	 * accessor method for messageSender id
	 *
	 * @return int value of messageSender id
	 **/
	public function getMessageSenderId() {
		return ($this->messageSenderId);
	}

	/**
	 * mutator method for messageSender id
	 *
	 * @param int $newMessageSenderId new value of messageSender id
	 * @throws InvalidArgumentException if $newMessageSenderId is not an integer or not positive
	 * @throws RangeException if $newMessageSenderId is not positive
	 **/
	public function setMessageSenderId($newMessageSenderId) {

		// verify the messageSender id is valid
		$newMessageSenderId = filter_var($newMessageSenderId, FILTER_VALIDATE_INT);
		if($newMessageSenderId === false) {
			throw(new InvalidArgumentException("messageSender id is not a valid integer"));
		}

		// verify the messageSender id is positive
		if($newMessageSenderId <= 0) {
			throw(new RangeException("messageSender id is not positive"));
		}

		// convert and store the messageSender id
		$this->messageSenderId = intval($newMessageSenderId);
	}


	/**
	 * accessor method for messageReceiver id
	 *
	 * @return mixed value of messageReceiver id
	 **/
	public function getMessageReceiverId() {
		return ($this->messageReceiverId);
	}


	/**
	 * mutator method for messageReceiver id
	 *
	 * @param int $newMessageReceiverId new value of messageReceiver id
	 * @throws InvalidArgumentException if $newMessageReceiverId is not an integer or not positive
	 * @throws RangeException if $newMessageReceiverId is not positive
	 **/
	public function setMessageReceiverId($newMessageReceiverId) {

		// verify the messageReceiver id is valid
		$newMessageReceiverId = filter_var($newMessageReceiverId, FILTER_VALIDATE_INT);
		if($newMessageReceiverId === false) {
			throw(new InvalidArgumentException("messagereceiver id is not a valid integer"));
		}

		// verify the messageReceiver id is positive
		if($newMessageReceiverId <= 0) {
			throw(new RangeException("messageReceiver id is not positive"));
		}

		// convert and store the messageReceiver id
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
		if(strlen($newMessageContent) > 8192) {
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
			$this->messageDate = new DateTime('now');
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
		if($this->messageId !== null) {
			throw(new PDOException("not a new message"));
		}

		// create query template
		$query = "INSERT INTO message(messageSenderId, messageReceiverId, messageContent, messageDateTime)
                VALUES(:messageSenderId, :messageReceiverId, :messageContent, :messageDateTime)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->messageDate->format("Y-m-d H:i:s");
		$parameters = array("messageSenderId" => $this->messageSenderId, "messageReceiverId" => $this->messageReceiverId,
			                 "messageContent" => $this->messageContent, "messageDateTime" => $formattedDate);

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


	public function update(PDO $pdo) {

		if($this->messageId === null) {
			throw(new PDOException("Unable to update a message that does not exist"));
		}

		$query = "UPDATE message SET messageSenderId = :messageSenderId, messageReceiverId = :messageReceiverId,
		                             messageContent = :messageContent, messageDateTime = :messageDateTime
		          WHERE messageId = :messageId";
		$statement = $pdo->prepare($query);

		$formattedDate = $this->messageDate->format("Y-m-d H:i:s");
		$parameters = array("messageSenderId" => $this->messageSenderId, "messageReceiverId" => $this->messageReceiverId,
			"messageContent" => $this->messageContent, "messageDateTime" => $formattedDate,
			"messageId" => $this->messageId);
		$statement->execute($parameters);

	} // update



	/**
	 * funtion to retrieve message by message Id
	 *
	 * @param PDO $pdo PDO connection object
	 * @param int $messageId message id to search for
	 * @return mixed Message found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 **/

	public function getByMessageId(PDO $pdo, $newMessageId) {

		// base case: if the $messageId is null, this is a new message without a mySQL assigned ID
		if($newMessageId === null) {
			$this->messageId = $newMessageId;
			return;
		}

		// sanitize the messageId before searching
		$newMessageId = filter_var($newMessageId, FILTER_VALIDATE_INT);
		if($newMessageId === false) {
			throw(new PDOException("message id is not an integer"));
		}
		if($newMessageId <= 0) {
			throw(new PDOException("message id is not positive"));
		}

		// create query template
		$query = "SELECT messageId, messageSenderId, messageReceiverId, messageContent, messageDateTime
		          FROM message WHERE messageId = :newMessageId";
		$statement = $pdo->prepare($query);

		// bind the message id to the place holder in the template
		$parameters = array("newMessageId" => $newMessageId);
		$statement->execute($parameters);

		// grab the message from mySQL
		try {
			$message = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$message = new Message($row["messageId"], $row["messageSenderId"], $row["messageReceiverId"],
					$row["messageContent"], $row["messageDateTime"]);
			}
		} catch(Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($message);
	}


	/**
	 * function to retrieve a messages by senderId
	 *
	 * @param PDO $pdo is a PDO connection object
	 * @param int $senderId - senderId for messages to be retrieved
	 * @return SplFixedArray with all messages found
	 * @throws PDOException with mySQL related errors
	 **/

	public static function getMessagesBySenderId(PDO $pdo, $senderId) {

		// check validity of $senderId
		$senderId = filter_var($senderId, FILTER_VALIDATE_INT);
		if($senderId === false) {
			throw(new InvalidArgumentException("Message ID is not an integer."));
		}
		if($senderId <= 0) {
			throw(new RangeException("Message ID is not positive."));
		}

		// prepare and execute query
		$query = "SELECT messageId, messageSenderId, messageReceiverId, messageContent, messageDateTime
		          FROM message WHERE messageSenderId = :messageSenderId";
		$statement = $pdo->prepare($query);
		$parameters = array("messageSenderId" => $senderId);
		$statement->execute($parameters);

		// build an array of message
		$messages = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		while(($row = $statement->fetch()) !== false) {
			try {
				$message = new Message($row["messageId"], $row["messageSenderId"], $row["messageReceiverId"],
					                    $row["messageContent"], $row["messageDateTime"]);
				$messages[$messages->key()] = $message;
				$messages->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}

		return $messages;
	}

	/**
	 *function to retrieve message by  receiverId
	 *
	 * @param PDO $pdo PDO is a connection object
	 * @param int $receiverId - receiverId for message to be sent
	 * @return SplFixedArray with all messages found
	 * @throw  PDOException with mysql related errors
	 **/

	public static function getMessagesByReceiverId(PDO $pdo, $receiverId) {

		// check that the message receiverId is valid

		$receiverId = filter_var($receiverId, FILTER_VALIDATE_INT);
		if($receiverId === false)
			throw(new InvalidArgumentException("Message ID is not an integer."));
		if($receiverId <= 0) {
			throw(new RangeException("Message Id is not positive."));
		}
		// prepare and execute query
		$query = "SELECT messageId, messageSenderId, messageReceiverId, messageContent, messageDateTime
		          FROM message WHERE messageReceiverId = :messageReceiverId";
		$statement = $pdo->prepare($query);
		$parameters = array("messageReceiverId" => $receiverId);
		$statement->execute($parameters);

		// build an array of message
		$messages = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);

		while(($row = $statement->fetch()) !== false) {
			try {
				$message = new Message($row["messageId"], $row["messageSenderId"], $row["messageReceiverId"],
					$row["messageContent"], $row["messageDateTime"]);
				$messages[$messages->key()] = $message;
				$messages->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}

		return $messages;
	}

}
