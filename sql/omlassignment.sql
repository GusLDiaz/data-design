INSERT INTO profile(profileId, profileEmail, profileHash, , profilePhone, profileUsername, profileTimestamp) VALUES
	(UNHEX(REPLACE("8f767575-574c-4b07-9e84-39c05dcdbb2e","-","")),"gusldiaz@yahoo.com", "dadf", "5756379455","SwiggitySwag","1998-08-05 09:00:00" );

UPDATE profile SET profilePhone = "0000000000",profileUsername = "SwiggitySwag",profileEmail = "gusldiaz@yahoo.com", profileHash = "", profileTimestamp = "1998-08-05 10:00:00",<--:profileTimestamp
WHERE profileId = "(UNHEX(REPLACE("8f767575-574c-4b07-9e84-39c05dcdbb2e","-",""));

DELETE FROM profile WHERE profilePhone = "0000000000";

