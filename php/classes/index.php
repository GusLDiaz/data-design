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
class Profile /**implements JSONSerializable*/ {

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
public static function





public function __construct($profile...