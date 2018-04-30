<?php
/**
 * Created by PhpStorm.
 * User: Gusli
 * Date: 4/19/2018
 * Time: 2:52 PM
 *
 * doc blocks for it all
 *   oml assignment.sql (select)
 * accessor &mutator methods for every state va
 * get_by_
 */

namespace Edu\Cnm\DataDesign;

use Ramsey\Uuid\Uuid;

class Profile implements \JsonSerializable {
	use ValidateUuid;
	use ValidateDate;
	/**
	 * profile: primary key
	 * @var (Uuid) $profileId
	 */
	private $profileId;
	/**
	 * profile: Email
	 * @var string $profileEmail
	 */
	protected $profileEmail;
	/**
	 * profile: hash
	 * @var string $profileHash
	 */
	protected $profileHash;
	/**
	 * profile: username (unique)
	 * @var string $profileUsername
	 */
	protected $profileUsername;
	/**
	 * profile: phone
	 * @var string $profilePhone
	 */
	protected $profilePhone;
	/**
	 * @var \DateTime $profileTimestamp
	 */
	protected $profileTimestamp;

	/**
	 * constructor
	 *
	 * @param string|Uuid
	 * @param string hash is used for password encryption
	 * @param string $newProfileEmail ? string containing email address
	 * @param string $newProfileUsername ? string containing username
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @Documentation https://php.net/manual/en/language.oop5.
	 * @throws \Exception if some other exception occurs\
	 **/
	public function __construct($newProfileId, string $newProfileEmail, $newProfileHash, string $newProfileUsername, $newProfileTimestamp) {
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
	 * accessor method for profile Id
	 *
	 * @return mixed Id
	 */
	public function getProfileId() {
		return $this->profileId;
	}

	/**
	 * mutator method for Id/primary key
	 * @param mixed $profileId
	 * @throws \Exception if uuid is invalid
	 */
	public function setProfileId($newProfileId): void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->profileId = $newProfileId;
	}

	/**
	 * accessor method for email
	 *
	 * @return string
	 */
	public function getProfileEmail(): string {
		return ($this->profileEmail);
	}

	/**
	 * mutator method for email
	 * @param string $profileEmail
	 * @throws \InvalidArgumentException if email is empty
	 * @throws \RangeException if email is too large for database
	 */
	public function setProfileEmail(string $newProfileEmail): void {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("email is empty or insecure"));
		}
		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("profile email is too large"));
		}

		$this->profileEmail = $newProfileEmail;
	}

	/**
	 * accessor method for hash
	 *
	 * @return string profile hash
	 */
	public function getProfileHash(): string {
		return ($this->profileHash);
	}

	//
//	  mutator method for profile hash password
//
//	  @param string $newProfileHash
//	  @throws \InvalidArgumentException if the hash is not secure
//	  @throws \RangeException if the hash is not 128 characters
//	  @throws \TypeError if profile hash is not a string
	public function setProfileHash(string $newProfileHash): void {
		//check hash is formatted
		$newProfileHash = trim($newProfileHash);
		if(empty($newProfileHash) === true) {
			throw(new \InvalidArgumentException("profile password hash empty or insecure"));
		}
		//enforce the hash is really an Argon hash
		$profileHashInfo = password_get_info($newProfileHash);
		if($profileHashInfo["algoName"] !== "argon2i") {
			throw(new \InvalidArgumentException("not a valid hash"));
		}
		//check hash is exactly 97 characters.
		if(strlen($newProfileHash) !== 97) {
			throw(new \RangeException("profile hash must be 97 characters"));
		}
		$this->profileHash = $newProfileHash;
	}

	/**
	 * accessor method for username
	 *
	 * @return string $profileUsername
	 */
	public function getProfileUsername(): string {
		return ($this->profileUsername);
	}

	/**
	 * mutator method for usernames
	 *
	 * @param string $profileUsername
	 * @throws \InvalidArgumentException if username is null
	 * @throws \RangeException if username is greater than 32 characters
	 */
	public function setProfileUsername(?string $newProfileUsername): void {
		//if $profileUsername is null return it right away
		if($newProfileUsername === null) {
			$this->profileUsername = null;
			return;
		}
		$newProfileUsername = trim($newProfileUsername);
		$newProfileUsername = filter_var($newProfileUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileUsername) === true) {
			throw(new \InvalidArgumentException("username is empty "));
		}
		if(strlen($newProfileUsername) > 32) {
			throw(new \RangeException("username is too long"));
		}
		$this->profileUsername = $newProfileUsername;
	}

	/**
	 * accessor method for datetime
	 *
	 * @return \DateTime
	 */
	public function getProfileTimestamp(): \DateTime {
		return ($this->profileTimestamp);
	}

	/**
	 * mutator method for datetime
	 * validate date & time using magic method
	 * @param null $newProfileTimestamp
	 * @throws \Exception
	 */
	public function setProfileTimestamp($newProfileTimestamp = null): void {
		// base case: if the date is null, use the current date and time
		if($newProfileTimestamp === null) {
			$this->profileTimestamp = new \DateTime();
			return;
		}
		try {
			$newProfileTimestamp = self::validateDateTime($newProfileTimestamp);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->profileTimestamp = $newProfileTimestamp;
	}

	/**
	 * accessor method for phone
	 * new profile phone or just phone
	 * @return string value of phone or null
	 **/
	public function getProfilePhone(): ?string {
		return ($this->profilePhone);
	}

	/**
	 * mutator method for phone
	 *
	 * @param string $newProfilePhone new value of phone
	 * @throws \InvalidArgumentException if $newProfilePhone is not a string or insecure
	 * @throws \RangeException if $newProfilePhone is > 32 characters
	 * @throws \TypeError if $newProfilePhone is not a string
	 **/
	public function setProfilePhone(?string $newProfilePhone): void {
		//if $profilePhone is null return it right away
		if($newProfilePhone === null) {
			$this->profilePhone = null;
			return;
		}
		$newProfilePhone = trim($newProfilePhone);
		$newProfilePhone = filter_var($newProfilePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfilePhone) === true) {
			throw(new \InvalidArgumentException("profile phone is empty or insecure"));
		}
		if(strlen($newProfilePhone) > 32) {
			throw(new \RangeException("profile phone is too large"));
		}
		$this->profilePhone = $newProfilePhone;
	}


	/**
	 * inserts profile in SQL via PDO
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
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		$query = "UPDATE profile SET profilePhone = :profilePhone,profileUsername = :profileUsername,profileEmail = :profileEmail, profileHash = :profileHash, profileTimestamp = :profileTimestamp WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profilePhone" => $this->profilePhone, "profileUsername" => $this->profileUsername, "profileTimestamp" => $this->profileTimestamp];
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
	public static function getProfileByProfileId(\PDO $pdo, string $profileId): ?Profile {

		try {
			$profileId = self::validateUuid($profileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * @return array resulting state variables to serialize
	 *  state variables for JSON serialization
	 *
	 **/
	public function jsonSerialize(): array {
		$fields = get_object_vars($this);
		$fields["profileId"] = $this->profileId->toString();
		return ($fields);
	}
}










































