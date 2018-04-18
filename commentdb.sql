ALTER DATABASE mentorshipData CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
	-- this creates the attribute for the primary key
	-- not null means the attribute is required!
	profileID BINARY(16) NOT NULL,
	profileUsername
	profileEmail VARCHAR(128),
	profileDateJoined VARCHAR (128) NOT NULL,
	profilePhone VARCHAR(32),
	-- phone vs email - whether null values are flagged by unique or not (solved - doesn't apply for mySQL
	UNIQUE(profileUsername),
	UNIQUE(profileEmail)
	PRIMARY KEY(profileId)
);

CREATE TABLE comment (


