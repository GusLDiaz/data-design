<?php
/**
 * Created by PhpStorm.
 * User: Gusli
 * Date: 4/25/2018
 * Time: 9:15 PM
 */
/** php file for a comment (recursive-calling) class
 *
 */
class Comment implements JSONSerializable {
	use Ramsey\Uuid\Uuid;

	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["commentId"] = $this->commentId->toString();
		unset($fields["profileHash"]);
		return ($fields);
	}
//<h3>comment</h3>
//<dl>
//<dt>commentId</dt>
//<dd>primary key</dd>
//<dt>commentProfileId</dt>
//<dd>foriegn key</dd>
//<dt>commentCommentId</dt>
//<dd>foreign key calling replys</dd>
//<dt>commentContent</dt>
//<dt>commmentTimestamp</dt>
//<dd>register time</dd>
//<dt>commentViaTag</dt>

protected $commentId;
protected $commentProfileId;
protected $commentCommentId;
protected $commentContent;
protected $commentTimestamp;
protected $commentViaTag;

public function __construct($commentId, $commentProfileId, $commentCommentId, string $commmentContent, DateTime $commentTimestamp, ***int $commentViaTag) {
		try {
			$this->setCommentId($newCommentId);
			$this->setCommentCommentId($newCommentCommentId);
			$this->setCommentContent($newCommentContent);
			$this->setCommentViaTag($newCommentViaTag);
			$this->setCommentTimestamp($newCommentTimestamp);)