INSERT INTO profile(profileId, profileEmail, profileHash, , profilePhone, profileUsername, profileTimestamp) VALUES
	(UNHEX(REPLACE),"gusldiaz@yahoo.com", *prof, "5756379455","SwiggitySwag",*timestamp );

UPDATE profile SET profilePhone = "5756379455",profileUsername = "SwiggitySwag",profileEmail = "gusldiaz@yahoo.com", profileHash = "", profileTimestamp = "1998-08-05 09:00:00",<--:profileTimestamp
WHERE profileId = :profileId";

