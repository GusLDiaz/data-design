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
 *   oml assignment.sql
 * accessor &mutator methods for every state var
 * JsonSerializable
 * get_by_
 *
 * update delete insert
 */

namespace Edu\Cnm\DataDesign;

use Ramsey\Uuid\Uuid;

class Profile implements \JsonSerializable {
	use ValidateUuid;

	/**use ValidateDate;
	 * use ValidateDate
	 */

	/**
	 * profile: primary key
	 * @var (Uuid) $profileId
	 */
	private $profileId;
	/**
	 * profile: Email (unique)
	 * @var string $profileEmail
	 */
	protected $profileEmail;
	/**
	 * profile: hash-- what does this do?**
	 * @var ****** $profileHash
	 */
	protected $profileHash;
	/**
	 * profile: username (unique)
	 * @var string $profileUsername
	 */
	protected $profileUsername;
	/**
	 * @var string $profilePhone
	 */
	protected $profilePhone;
	/**
	 * @var DateTime $profileTimestamp
	 */
	protected $profileTimestamp;


//public static function


//
//public function __construct($profileId,$profileTimeStamp,$profilePhone,$profileUsername,$profileEmail){
//


	/**
	 * constructor
	 *
	 * @param string|Uuid
	 * @param string hash is used for password encryption
	 * @param string $newProfileEmail ? string containing  email address
	 * @param string $newProfileUsername ? string containing username
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @Documentation https://php.net/manual/en/language.oop5.
	 * @throws \Exception if some other exception occurs\
	 **/
	public
	function __construct($newProfileId, string $newProfileEmail, $newProfileHash, string $newProfileUsername, DateTime $newProfileTimestamp) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfileUsername($newProfileUsername);
			$this->setprofileTimestamp($newProfileTimestamp);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * @return string
	 */
	public function getProfileEmail(): string {
		return ($this->profileEmail);
	}

	/**
	 * sanatize
	 * strlength
	 * @param string $authorEmail
	 */
	public function setProfileEmail(string $newProfileEmail): void {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("email is empty or insecure"));
		}
		// verify the email will fit in the database
		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("profile email is too large"));
		}

		$this->profileEmail = $newProfileEmail;
	}
	}

	/**
	 * what do you need for hash acc/mutator?
	 * @return string
	 */
	public function getProfileHash(): string {
		return ($this->profileHash);
	}

	/**
	 * @param string $profileHash
	 */
	public function setProfileHash(string $profileHash): void {
		$this->profileHash = $profileHash;
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
		$this->profileTimestamp = $newProfileTimestamp;
	}

	/**
	 * accessor method for phone
	 *new profile phone or just phone
	 * @return string value of phone or null
	 **/
	public function getProfilePhone(): ?string {
		return ($this->profilePhone);
	}

	/**
	 * mutator method for phone
	 *
	 * @param string $newProfilePhone new value of phone
	 * @throws \InvalidArgumentException if $newPhone is not a string or insecure
	 * @throws \RangeException if $newPhone is > 32 characters
	 * @throws \TypeError if $newPhone is not a string
	 **/
	public function setProfilePhone(?string $newProfilePhone): void {
		//if $profilePhone is null return it right away
		if($newProfilePhone === null) {
			$this->profilePhone = null;
			return;
		}
		// verify the phone is secure
		$newProfilePhone = trim($newProfilePhone);
		$newProfilePhone = filter_var($newProfilePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfilePhone) === true) {
			throw(new \InvalidArgumentException("profile phone is empty or insecure"));
		}
		// verify the phone will fit in the database
		if(strlen($newProfilePhone) > 32) {
			throw(new \RangeException("profile phone is too large"));
		}
		// store the phone
		$this->profilePhone = $newProfilePhone;
	}

	/**
	 *
	 * mutator method for profile hash password
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if profile hash is not a string
	 */
//public function setProfileHash(string $newProfileHash): void {
//	//enforce that the hash is properly formatted
//	$newProfileHash = trim($newProfileHash);
//	if(empty($newProfileHash) === true) {
//		throw(new \InvalidArgumentException("profile password hash empty or insecure"));
//	}
//	//enforce the hash is really an Argon hash
//	$profileHashInfo = password_get_info($newProfileHash);
//	if($profileHashInfo["algoName"] !== "argon2i") {
//		throw(new \InvalidArgumentException("profile hash is not a valid hash"));
//	}
//	//enforce that the hash is exactly 97 characters.
//	if(strlen($newProfileHash) !== 97) {
//		throw(new \RangeException("profile hash must be 97 characters"));
//	}
//	//store the hash
//	$this->profileHash = $newProfileHash;
//}


	/**
	 * inserts profile in SQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		$query = "INSERT INTO profile(profileId, profilePhone, profileUsername, profileEmail, profileHash, profileTimestamp)
VALUES :profileId, :profilePhone, :profileUsername, :profileEmail, :profileHash, :profileTimestamp)";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profilePhone" => $this->profilePhone, "profileUsername" => $this->profileUsername, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileTimestamp" => $this->profileTimestamp];
		$statement->execute($parameters);
	}

	/**
	 * deletes this Profile from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		$query = "DELETE FROM profile WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * updates this Profile from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 **/
	public function update(\PDO $pdo): void {
		// create query template
		$query = "UPDATE profile SET profilePhone = :profilePhone,profileUsername = :profileUsername,profileEmail = :profileEmail, profileHash = :profileHash, profileTimestamp = :profileTimestamp WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileActivationToken" => $this->profileActivationToken, "profileAtHandle" => $this->profileAtHandle, "profileAvatarUrl" => $this->profileAvatarUrl, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profilePhone" => $this->profilePhone];
		$statement->execute($parameters);
	}


	/**
	 * gets the Profile by profile id
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param string $profileId profile Id to search for
	 * @return Profile|null Profile or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
//	public
//	static function getProfileByProfileId(\PDO $pdo, string $profileId): ?Profile {
//		// sanitize the profile id before searching
//		try {
//			$profileId = self::validateUuid($profileId);
//		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
//			throw(new \PDOException($exception->getMessage(), 0, $exception));
//		}
	/**
	 * @return array resulting state variables to serialize
	 *  state variables for JSON serialization
	 * *unset hash?? add for token
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["profileId"] = $this->profileId->toString();
		return ($fields);
	}











































