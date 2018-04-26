INSERT INTO profile(profileId, profileEmail, profileHash, , profilePhone, profileUsername, profileTimestamp) VALUES
	(UNHEX(REPLACE),"gusldiaz@yahoo.com", *prof, "5756379455","SwiggitySwag",*timestamp );

UPDATE profile SET profilePhone = "5756379455",profileUsername = :SwiggitySwag,profileEmail = "gusldiaz@yahoo.com", profileHash = :profileHash, profileTimestamp = :profileTimestamp WHERE profileId = :profileId";

