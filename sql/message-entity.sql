DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS need;

CREATE TABLE message (
	messageId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	messageSenderId INT UNSIGNED NOT NULL,
	messageReceiverId INT UNSIGNED NOT NULL,
	messageContent VARCHAR(20000) NOT NULL,
	messageDateTime DATETIME NOT NULL,
	INDEX(messageSenderId),
	INDEX(messageReceiverId),
	FOREIGN KEY(messageSenderId) REFERENCES profile(profileId),
	FOREIGN KEY(messageReceiverId) REFERENCES profile(profileId),
	PRIMARY KEY(messageId)

);

CREATE TABLE need (
	needId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	need VARCHAR(5000),
	INDEX (profileId),
	FOREIGN KEY (profileId) REFERENCES profile(profileId),
	PRIMARY KEY (needId)

);



