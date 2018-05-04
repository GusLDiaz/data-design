ALTER DATABASE gliakos CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
	profileID BINARY(16) NOT NULL,
	profileEmail VARCHAR(128),
	profileHash CHAR(97) NOT NULL,
	profilePhone VARCHAR(32),
	profileTimestamp VARCHAR (128) NOT NULL,
	profileUsername VARCHAR(32) NOT NULL,
	UNIQUE(profileUsername),
	UNIQUE(profileEmail),
	PRIMARY KEY(profileId)
);

CREATE TABLE comment (
	commentId BINARY(16) NOT NULL,
	commentProfileId BINARY(16) NOT NULL,
	commentCommentId BINARY(16),
	commentContent VARCHAR(140) NOT NULL,
	commentTimestamp DATETIME(6) NOT NULL,
	commentViaTag TINYINT ,
	INDEX(commentProfileId),
	INDEX(commentCommentId),
	FOREIGN KEY(commentProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(commentCommentId) REFERENCES comment(commentId),
	PRIMARY KEY(commentId)
	);

