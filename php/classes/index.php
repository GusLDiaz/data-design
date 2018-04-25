<?php
/**
 * Created by PhpStorm.
 * User: Gusli
 * Date: 4/19/2018
 * Time: 2:52 PM
 *
 * need: validate UUID (Ramsey)
 * state vars
 * constructor
 * doc blocks for it all
 * 	oml assignment.sql
 * accessor &mutator methods for every state var
 * JsonSerializable
 */
/**use validate UUID?
 *
 */
class Profile implements JSONSerializable {

//protected $profileId n null
//<dd>primary key</dd>
"*<dt>profileHash</dt>"
//protected $profileTimeStamp
//protected $profilePhone
//protected $profileEmail
//protected $profileUsername
		/**
		 * profile: primary key
		 * @var (Uuid) $profileId
		 */
		private $profileId;
		/**
		 * profile: Email (unique)
		 * @var string $profileEmail
		 */
		private $profileEmail;
		/**
		 * profile: hash-- what does this do?**
		 * @var ****** $profileHash
		 */
		private $profileHash;
		/**
		 * profile: username (unique)
		 * @var string $profileUsername
		 */
		private $profileUsername;
		/**
		 * @var string $profilePhone
		 */
		private $profilePhone;
		/**
		 * @var DateTime $profileTimestamp
		 */
		private $profileTimestamp;
	}
//public static function





public function __construct($profileId,$profileTimeStamp,$profilePhone,$profileUsername,$profileEmail)




	/**
	 * constructor
	 *
	 * @param string|Uuid
	 * @param string hash is used for password encryption
	 * @param string $newProfileEmail? string containing  email address
	 * @param string $newProfileUsername? string containing username
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @Documentation https://php.net/manual/en/language.oop5.
	 * @throws \Exception if some other exception occurs\
	 **/
	public function __construct($profileId,string $profileEmail, $profileHash, string $profileUsername) {
	try {
		$this->setProfileId($newProfileId);
		$this->setProfileEmail($newProfileIdEmail);
		$this->setProfileHash($newProfileHash);
		$this->setProfileUsername($newProfileUsername);
	}
		//determine what exception type was thrown
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
	/**
	 * @return string
	 */
	public function getProfileEmail(): string {
		return($this->profileEmail);
	}
	/**
	 * sanatize
	 * strlength
	 * @param string $authorEmail
	 */
	public function setProfileEmail(string $profileEmail): void {
		$this->profileEmail = $profileEmail;
	}
	/**
	 * what do you need for hash acc/mutator?
	 * @return string
	 */
	public function getProfileHash(): string {
		return($this->profileHash);
	}
	/**
	 * @param string $profileHash
	 */
	public function setProfileHash(string $profileHash): void {
		$this->authorHash = $profileHash;
	}
	/**

	 */
	public function getProfileUsername(): string {
		return ($this->profileUsername);
	}
	/**
	 * @param string $profileUsername
	 */
	public function setProfileUsername(string $profileUsername): void {
		$this->profileUsername = $profileUsername;
	}
	/**

	 */
	public function getProfileTimestamp(): DateTime {
		return ($this->profileTimestamp);
	}
	/**
	 * @param string $profileUsername
	 */
	public function setProfileTimestamp(DateTime $profileTimestamp): void {
		$this->profileTimestamp = $profileTimestamp;
	}



}



/**
 * @return array resulting state variables to serialize
 *  state variables for JSON serialization
 * *unset hash?? add for token
 **/
	public function jsonSerialize() {
	$fields = get_object_vars($this);
	$fields["profileId"] = $this->profileId->toString();
	unset($fields["profileHash"]);
	return ($fields);
}
/**
 *
 */
























































