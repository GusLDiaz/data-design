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
		unset($fields["*/commentHash"]);
		return ($fields);
	}
protected $commentId;
protected $commentProfileId;
protected $commentCommentId;
protected $commentContent;
protected $commentTimestamp;
protected $commentViaTag;

public function __construct($commentId, $commentProfileId, $commentCommentId, string $commmentContent, DateTime $commentTimestamp, Tinyint $commentViaTag) {{
		try {
			$this->setCommentId($newCommentId);
			$this->setCommentCommentId($newCommentCommentId);
			$this->setCommentContent($newCommentContent);
			$this->setCommentViaTag($newCommentViaTag);
			$this->setCommentTimestamp($newCommentTimestamp);)

}catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
}
