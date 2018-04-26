ALTER DATABASE 'data-design' CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
	-- this creates the attribute for the primary key
	-- not null means the attribute is required!
	profileID BINARY(16) NOT NULL,
	profileEmail VARCHAR(128),
	profileHash CHAR(97) NOT NULL,
	profilePhone VARCHAR(32),
	profileTimestamp VARCHAR (128) NOT NULL,
	profileUsername VARCHAR(32),

	-- phone vs email - whether null values are flagged by unique or not (solved - doesn't apply for mySQL)
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
	-- can you index something that's optional (notnull?)
	INDEX(commentCommentId),
	FOREIGN KEY(commentProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(commentCommentId) REFERENCES comment(commentId),
	--analyse for recursion?
	PRIMARY KEY(commentId)
);

