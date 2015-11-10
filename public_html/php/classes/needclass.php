<?php

/**
* Small Cross Section of a Need like Message
*
* This Need can be considered a small example of what services like Messaqe store when messages are sent and
* received using Karma. This can easily be extended to emulate more features of Karma.
*
* @author Gerald Fongwe <gfongwe@cnm.edu>
**/
class Need {
	/**
	 * id for this Need; this is the primary key
	 * @var int $needId
	 **/
	private $needId;
	/**
	 * id of the Profile that sent this Need; this is a foreign key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * actual textual content of this Need
	 * @var string $need
	 **/
	private $need;


	/**
	 * constructor for this Need
	 *
	 * @param mixed $newNeedId id of this Need or null if a new Need
	 * @param int $newProfileId id of the Profile that sent this Need
	 * @param string $newNeed string containing actual need data
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 **/
	public function __construct($newNeedId, $newProfileId, $newNeed = null) {
		try {
			$this->setNeedId($newNeedId);
			$this->setProfileId($newProfileId);
			$this->setNeed($newNeed);
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
	 * accessor method for need id
	 *
	 * @return mixed value of need id
	 **/
	public function getNeedId() {
		return ($this->needId);
	}
}