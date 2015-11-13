<?php
/**
 *	user profile class for karma
 *
 *	contains all profile attributes that will allow a user to interact with the karma site
 *
 * @author Derek Mauldin <dmauldin2@cnm.edu>
 **/
class Profile {
	/**
	 * PRIMARY KEY - ID for this profile
	 *
	 * @var $profileId
	 **/
	private $profileId;
	/**
	 * FOREIGN KEY - memberId that this profile references
	 *
	 * @var $memberId
	 **/
	private $memberId;
	/**
	 * Blurb/description for this profile
	 *
	 * @var $profileBlurb
	 **/
	private $profileBlurb;
	/**
	 * profileHandle aka userName of this profile
	 *
	 * @var $profileHandle
	 **/
	private $profileHandle;
	/**
	 * First name of this user
	 *
	 * @var $profileFirstName
	 **/
	private $profileFirstName;
	/**
	 * Last name of this user
	 *
	 * @var $profileLastName
	 **/
	private $profileLastName;
	/**
	 * profile photo for this profile
	 *
	 * @var $profilePhoto
	 **/
	private $profilePhoto = null;
	/**
	 * photo type for this profile
	 *
	 * @var $profilePhoto
	 **/
	private $profilePhoteType = null;


	/**
	 * Constructor method for class profile
	 * @param $newProfileId -- integer -- this profiles profileId
	 * @param $newMemberId -- integer -- this profiles memebrId
	 * @param $newProfileBlurb -- string -- this prfiles profileBlurb
	 * @param $newProfileHandle -- string -- this profiles profileHandle
	 * @param $newProfileFirstName -- string -- this profile first name
	 * @param $newProfileLastName -- string --  this profile last name
	 * @param $newInputTagName -- the id/name of the input tag for the avatar photo
	 * @throws InvalidArgumentException
	 * @throws RangeException
	 * @throws Exception
	 **/
	public function __construct($newProfileId, $newMemberId, $newProfileBlurb, $newProfileHandle,
										 $newProfileFirstName, $newProfileLastName, $newInputTagName) {
		try {
			$this->setProfileId($newProfileId);
			$this->setMemberId($newMemberId);
			$this->setProfileBlurb($newProfileBlurb);
			$this->setProfileHandle($newProfileHandle);
			$this->setProfileFirstName($newProfileFirstName);
			$this->setProfileLastName($newProfileLastName);
			if($newInputTagName !== null) {
				$this->uploadPhoto($newInputTagName);
			}
		}  catch(InvalidArgumentException $invalidArgument) {
			throw(new InvalidArgumentException($invalidArgument->getmessage(), 0, $invalidArgument));
		}  catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		}  catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}  // construct


	/**
	 * accessor method for profileId
	 *
	 * @return mixed -- value of this profile ID
	 **/
	public function getProfileId() {
		return($this->profileId);
	}  // getProfileId


	/**
	 * accessor method for memberId
	 *
	 * @return mixed -- value of this profiles member ID
	 **/
	public function getMemberId() {
		return($this->memberId);
	}  // getMemberId


	/**
	 * accessor method for profileBlurb
	 *
	 * @return string -- contents of this profileBlurb
	 **/
	public function getProfileBlurb() {
		return($this->profileBlurb);
	}  // getProfileBlurb


	/**
	 * acessor method for profileHandle
	 *
	 * @return string -- this profile handle/user name
	 **/
	public function getProfileHandle() {
		return ($this->profileHandle);
	}  // getProfileHandle


	/**
	 * accessor method for profile first name
	 *
	 * @return string -- this profile first name
	 **/
	public function getProfileFirstName() {
		return($this->profileFirstName);
	}  // getProfileFirstName


	/**
	 * accessor method for profile last name
	 *
	 * @return string -- this profile last name
	 **/
	public function  getProfileLastName() {
		return($this->profileLastName);
	}  // getProfile


	/**
	 * accessor method for profile photo
	 *
	 * @return string -- path to profile photo
	 **/
	public function getProfilePhoto() {
		return($this->profilePhoto);
	}  // getProfilePhoto


	/**
	 * accessor method for profile photo type
	 *
	 * @return string -- value of profile photo type
	 **/
	public function getProfilePhotoType() {
		return($this->profilePhoteType);
	}  // getProfilePhotoType


	/**
	 * mutator method for profileId
	 *
	 * @param $newProfileId -- ID value of new Profile ID
	 * @throws InvalidArgumentException if newProfileId is not an integer
	 * @throws RangeException if newProfileId is not positive
	 *
	 **/
	public function setProfileId($newProfileId) {
		// base case: if the newProfileId is null, this is a new profile without a mySQL assigned ID
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		// validate that the new Profile ID is an integer
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new InvalidArgumentException("Profile ID is not a valid integer."));
		}
		// validate that the new Profile ID is positive
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID is not positive."));
		}
		// final check and store
		$this->profileId = intval($newProfileId);
	}  // setProfileId


	/**
	 * mutator method for memberId
	 *
	 * @param $newMemberId -- ID value of new Profile ID
	 * @throws InvalidArgumentException if newProfileId is not an integer
	 * @throws RangeException if newProfileId is not positive
	 *
	 **/
	public function setMemberId($newMemberId) {
		// validate the new Member ID is an integer
		$newMemberId = filter_var($newMemberId, FILTER_VALIDATE_INT);
		if($newMemberId === false) {
			throw(new InvalidArgumentException("Member ID is not a valid integer."));
		}
		// validate the new Member ID is positive
		if($newMemberId <= 0) {
			throw(new RangeException("Member ID is not positive."));
		}
		// final check and store
		$this->memberId = intval($newMemberId);
	}  //  setMemberId


	/**
	 * mutator method for Profile Blurb
	 *
	 * @param $newProfileBlurb
	 * @throws InvalidArgumentException if $newProfileBlurb is empty or insecure
	 * @throws RangeException if $newProfileBlurb is too large
	 **/
	public function setProfileBlurb($newProfileBlurb) {
		// make sure $newProfileBlurb is secure
		$newProfileBlurb = trim($newProfileBlurb);
		$newProfileBlurb = filter_var($newProfileBlurb, FILTER_SANITIZE_STRING);
		if(empty($newProfileBlurb) === true) {
			throw(new InvalidArgumentException("Profile Blurb content is empty or insecure."));
		}
		// validate the length of $newProfileBlurb
		if(strlen($newProfileBlurb) > 3000) {
			throw(new RangeException("Blurb content is too large."));
		}
		// store the new blurb
		$this->profileBlurb = $newProfileBlurb;
	}  // setProfileBlurb


	/**
	 * mutator method for Profile Handle
	 *
	 * @param $newProfileHandle
	 * @throws InvalidArgumentException if $newProfileHandle is empty or insecure
	 * @throws RangeException if $newProfileHandle is too large
	 **/
	public function setProfileHandle($newProfileHandle) {
		// make sure $newProfileHandle is secure
		$newProfileHandle = trim($newProfileHandle);
		$newProfileHandle = filter_var($newProfileHandle, FILTER_SANITIZE_STRING);
		if(empty($newProfileHandle) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}
		// validate the length of $newProfileHandle
		if(strlen($newProfileHandle) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}
		// store the new handle
		$this->profileHandle = $newProfileHandle;
	}  // setProfile Handle


	/**
	 * mutator method for Profile First Name
	 *
	 * @param $newProfileFirstName
	 * @throws InvalidArgumentException if $newFirstName is empty or insecure
	 * @throws RangeException if $newProfileFirstName is too large
	 **/
	public function setProfileFirstName($newProfileFirstName) {
		// make sure $newFirstName is secure
		$newProfileFirstName = trim($newProfileFirstName);
		$newProfileFirstName = filter_var($newProfileFirstName, FILTER_SANITIZE_STRING);
		if(empty($newProfileFirstName) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}
		// validate the length of $newProfileFirstName
		if(strlen($newProfileFirstName) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}
		// store the new First Name
		$this->profileFirstName = $newProfileFirstName;
	}  // setProfileFirstName


	/**
	 * mutator method for Profile Last Name
	 *
	 * @param $newProfileLastName
	 * @throws InvalidArgumentException if $newLastName is empty or insecure
	 * @throws RangeException if $newProfileLastName is too large
	 **/
	public function setProfileLastName($newProfileLastName) {
		// make sure $newProfileLastName is secure
		$newProfileLastName = trim($newProfileLastName);
		$newProfileLastName = filter_var($newProfileLastName, FILTER_SANITIZE_STRING);
		if(empty($newProfileLastName) === true) {
			throw(new InvalidArgumentException("Profile Handle is empty or insecure."));
		}
		// validate the length of $newProfileLastName
		if(strlen($newProfileLastName) > 15) {
			throw(new RangeException("Profile Handle is too Large."));
		}
		// store the new Last Name
		$this->profileFirstName = $newProfileLastName;
	}  // setProfileLastName


	/**
	 * mutator method for Profile Photo (path to photo)
	 *
	 * @param $newProfilePhoto -- string with the directory path for the photo
	 * @throws InvalidArgumentException if $newProfilePhoto is empty or insecure
	 * @throws OutOfRangeException if $newProfilePhoto is to long
	 *
	 */
	public function setProfilePhoto($newProfilePhoto) {
		// make sure $newProfilePhoto is secure
		$newProfilePhoto = trim($newProfilePhoto);
		$newProfilePhoto = filter_var($newProfilePhoto, FILTER_SANITIZE_STRING);
		if(empty($newProfilePhoto) === true) {
			throw(new InvalidArgumentException("Profile Photo is empty or insecure."));
		}
		// make sure the length of $newProfilePhoto is correct
		if(strlen($newProfilePhoto) > 255) {
			throw(new OutOfRangeException("Profile Photo path is to long."));
		}
		// if the file already exists, return
		if(file_exists($newProfilePhoto) === true) {
			return;
		}
		// store the path
		$this->profilePhoto = $newProfilePhoto;
	}  // setProfilePhoto
	/**
	 * mutator function for ProfilePhotType
	 *
	 * @param $newProfilePhotoType -- mime type for photo jpeg or png
	 * @throws InvalidArgumentException if the photo
	 */
	public function setProfilePhotoType($newProfilePhotoType) {
		// setup array with image types
		$goodMimeType = array("image/jpeg", "image/png");
		// check to see if $newProfilePhotoType is correct type
		if(in_array($goodMimeType, $newProfilePhotoType) === false) {
			throw(new InvalidArgumentException("Profile Photo is an unrecognized type.  Should be .JPEG or .PNG"));
		}
		// store image type
		$this->profilePhoteType = $newProfilePhotoType;
	}  // setProfilePhotoType


	/**
	 * function for using an uploaded photo
	 *
	 * @param string $inputTagName
	 * @throws ErrorException if there was an upload error
	 * @throws InvalidArgumentException for invalid image type - should be jpeg or png
	 * @throws InvalidArgumentException for invalid file extension
	 * @throws Error exception if createimage fails
	 * @throws Error exception if image save fails
	 *
	 */
	public function uploadPhoto($inputTagName)  {
		// if upload had an error throw exception
		if($_FILES[$inputTagName]["error"] !== UPLOAD_ERR_OK) {
			throw(new ErrorException("Image Upload Error"));
		}
		// setup image type arrays
		$goodTypes = ["image/jpeg", "image/png"];
		$goodExt   = ["jpg", "jpeg", "png"];
		// grab data from $_Files
		$imgType     = $_FILES[$inputTagName]["type"];
		$imgName     = $_FILES[$inputTagName]["name"];
		$imgFileName = $_FILES[$inputTagName]["tmp_name"];
		// setup extensions for processing
		$extension = end(explode(".", $imgName));
		$extension = strtolower($extension);
		// check image type
		if(in_array($imgType, $goodTypes) === false) {
			throw(new InvalidArgumentException("Invalid Image Type"));
		}
		// check extension
		if(in_array($extension, $goodExt) === false) {
			throw(new InvalidArgumentException("Invalid File Extension"));
		}
		// create image depending on type
		if($extension === "png" ) {
			$img = @imagecreatefrompng($imgFileName);
			$type = "image/png";
		} else {
			$img = @imagecreatefromjpeg($imgFileName);
			$type = "image/jpeg";
		}
		// if image create failed throw exception
		if($img === false){
			throw(new ErrorException("Create Image Failed"));
		}
		// crop image
		$cropArray = [0, 0, 256, 256];
		$avatar = imagecrop($img, $cropArray);
		// setup path name to store image
		$path = "/var/www/html/public_html/karma/avatars/avatar-" . $this->profileId;
		// save image depending on type
		if($type === "image/png") {
			$path = $path . ".png";
			$save = @imagepng($avatar, $path);
		} else {
			$path = $path . ".jpeg";
			$save = @imagejpeg($avatar, $path);
		}
		// if save fails throw exception
		if($save === false) {
			throw(new ErrorException("Image Save Failed"));
		}
		// store photo data in this profile
		$this->setProfilePhotoType($type);
		$this->setProfilePhoto($path);
		// free up resources
		imagedestroy($avatar);
	}  //  uploadPhoto


	/**
	 * this function inserts this profile from mySQL
	 *
	 * @param PDO $pdo is a PDO connection object
	 * @throws PDOException when profileId is null
	 */
	public function insertProfile(PDO $pdo) {
		//check if profileId is null if not throw PDOException
		if($this->profileId !== null) {
			throw(new PDOException("Profile Already Exists on Database"));
		}
		// create and prepare query template
		$query = "INSERT INTO profile(memberId, profileBlurb, profileHandle, profileFirstName, profileLastName, profielePhoto, profilePhotoType)
					 VALUES (:memberId, :profileBlurb, :profileHandle, :profileFirstName, :profileLastName, :profilePhoto, profilePhotoType)";
		$statement = $pdo->prepare($query);

		// bind profile variables to placeholder in the template
		$parameters = ["memberId" => $this->memberId, "profileBlurb" => $this->profileBlurb, "profileHandle" => $this->profileHandle,
			"profileFirstName" => $this->profileFirstName, "profileLastName" => $this->profileLastName,
			"profilePhoto" => $this->profilePhoto, "profilePhotoType" => $this->profilePhoteType];
		$statement->execute($parameters);

		// add mysql created id to this profile
		$this->profileId = intval($pdo->lastInsertId());
	}  // insertProfile


	/**
	 * this function deletes this profile from mySQL
	 *
	 * @param PDO $pdo is a PDO connection object
	 * @throws PDOException when profileId is null
	 */
	public function deleteProfile(PDO $pdo) {
		if($this->profileId === null) {
			throw (new PDOException("Unable to delete a profile that does not exist"));
		}
		// create and prepare query template
		$query = "DELETE FROM profile WHERE profileId = :profileid";
		$statement = $pdo->prepare($query);

		// bind profile variable to placeholder in the template
		$parameters = ["profileId" => $this->profileId ];
		$statement->execute($parameters);
	}  // deleteProfile


	/**
	 * this function updates this profile in mySQL
	 *
	 * @param PDO $pdo is a PDO connection object
	 * @throws PDOException when profileId is null
	 */
	public function updateProfile (PDO $pdo) {
		// profile with profileId set to null cannot be deleted
		if($this->profileId === null) {
			throw(new PDOException("Unable to update a profile that does not exist"));
		}
		// create and prepare query template
		$query = "UPDATE profile SET profileBlurb = :profileBlurb, profileHandle = :profileHandle,
		                             profileFirstName = :profileFirstName, proflieLastName = :profileLastName,
		                             profilePhoto = :profilePhoto, profilePhotoType = :profilePhotoType
		          WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		// bind profile variables to placeholders in template
		$parameters = ["profileBlurb" => $this->profileBlurb, "profileHandle" => $this->profileHandle,
							"profileFirstName" => $this->profileFirstName, "profileLastName" => $this->profileLastName,
							"profilePhoto" => $this->profilePhoto, "profilePhotoType" => $this->profilePhoteType];
		$statement->execute($parameters);
	}  // updateProfile


	/**
	 * This function retrieves a profile by profile ID
	 *
	 * @param PDO $pdo -- a PDO connection
	 * @param  int $profileId  -- profile ID to be retrieve
	 * @throws InvalidArgumentException when $profileId is not an integer
	 * @throws RangeException when $profileId is not positive
	 * @throws PDOException
	 * @return null|Profile
	 */
	public static function getProfileByProfileId(PDO $pdo, $profileId) {

		//  check validity of $prfileId
		$profileId = filter_var($profileId, FILTER_VALIDATE_INT);
		if($profileId === false) {
			throw(new InvalidArgumentException("Profile id is not an integer."));
		}
		if($profileId <= 0) {
			throw(new RangeException("Profile id is not positive."));
		}

		// prepare query
		$query =  "SELECT profileId, memberId, profileBlurb,
                        profileHandle, profileFirstName, pofileLastName,
                        profilePhoto, profilePhotoType
					  FROM profile WHERE profileId = :profileId";

		$statement = $pdo->prepare($query);
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		//  setup results from query
		try {
			$profile = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["memberId"], $row["profileBlurb"], $row["profileHandle"],
											  $row["profileFirstName"], $row["profileLastName"], $row["profileLastName"],
						                 $row["profilePhoto"], $row["profilePhotoType"]);
			}
		} catch(Exception $exception) {
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}

		return ($profile);
	}  // getProfileByProfileId


	/**
	 * this function retrieves a profile by using profileHandle
	 *
	 * @param PDO $pdo -- pdo connection object
	 * @param  string $profileHandle -- profileHandle  for profile to be retrieved
	 * @return  mixed -- null|profile
	 * @throws InvalidArgumentException if $profileHandle is insecure or empty
	 * @throws PDO Exception
	 **/
	public static function getProfileByProfileHandle(PDO $pdo, $profileHandle) {

		// check that $profileHandle is valid
		$profileHandle = filter_var($profileHandle, FILTER_SANITIZE_STRING);

		if($profileHandle === false) {
			throw(new InvalidArgumentException("Profile Handle is insecure or empty"));
		}

		// prepare query
		$query = "SELECT profileId, memberId, profileBlurb,
                       profileHandle, profileFirstName, pofileLastName,
							  profilePhoto, profilePhotoType
					 FROM profile WHERE profileHandle = :profileHandle";

		$statement = $pdo->prepare($query);
		$parameters = array("profileHandle" => $profileHandle);
		$statement->execute($parameters);

		try {

			// setup results from query
			$profile = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();

			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["memberId"], $row["profileBlurb"], $row["profileHandle"],
					                    $row["profileFirstName"], $row["profileLastName"], $row["profileLastName"],
					                    $row["profilePhoto"], $row["profilePhotoType"]);
			}
		} catch(Exception $exception) {
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}

		return ($profile);
	} // getProfileByProfileHandle


	/**
	 * This function retrieves a profile by member ID
	 *
	 * @param PDO $pdo -- a PDO connection
	 * @param  int $memberId  -- member ID for profile to be retrieve
	 * @throws InvalidArgumentException when $memberId is not an integer
	 * @throws RangeException when $memberId is not positive
	 * @throws PDOException
	 * @return null|Profile
	 */
	public static function getProfileByMemberId(PDO $pdo, $memberId) {
		$memberId = filter_var($memberId, FILTER_VALIDATE_INT);
		if($memberId === false) {
			throw(new InvalidArgumentException("Member id is not an integer."));
		}
		if($memberId <= 0) {
			throw(new RangeException("Member id is not positive."));
		}

		// prepare query
		$query = "SELECT profileId, memberId, profileBlurb,
                       profileHandle, profileFirstName, profileLastName,
                       profilePhoto, profilePhotoType
					 FROM profile WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);
		$parameters = array("profileId" => $memberId);
		$statement->execute($parameters);

		try {
			// setup results from query
			$profile = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["memberId"], $row["profileBlurb"], $row["profileHandle"],
											  $row["profileFirstName"], $row["profileLastName"], $row["profileLastName"],
											  $row["profilePhoto"], $row["profilePhotoType"]);
			}
		} catch(Exception $exception) {
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}

		return ($profile);
	}  // getProfileByMemberId


} // end of profile class
