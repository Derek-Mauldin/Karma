DROP TABLE IF EXISTS karma;
DROP TABLE IF EXISTS need;
DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS member;


CREATE TABLE member (
memberId INT UNSIGNED AUTO_INCREMENT NOT NULL,
memberAccessLevel CHAR(1) NOT NULL,
memberEmail VARCHAR(255) NOT NULL,
memberEmailActivation CHAR(16),
memberHash CHAR(128) NOT NULL,
memberSalt CHAR(64) NOT NULL,
UNIQUE(memberEmail),
PRIMARY KEY(memberId)
);


CREATE TABLE profile (
profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
memberId INT UNSIGNED NOT NULL,
profileBlurb VARCHAR(500),
profileHandle VARCHAR(15) NOT NULL,
profileFirstName VARCHAR(50) NOT NULL,
profileLastName VARCHAR(50) NOT NULL,
profilePhoto VARCHAR(255),
profilePhotoType VARCHAR(20),
UNIQUE(profilePhoto),
UNIQUE(profileHandle),
INDEX(memberId),
FOREIGN KEY(memberId) REFERENCES member(memberId),
PRIMARY KEY(profileId)
);



CREATE TABLE message (
messageId INT UNSIGNED AUTO_INCREMENT NOT NULL,
messageSenderId INT UNSIGNED NOT NULL,
messageReceiverId INT UNSIGNED NOT NULL,
messageContent VARCHAR(8192) NOT NULL,
messageDateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
INDEX(messageSenderId),
INDEX(messageReceiverId),
FOREIGN KEY(messageSenderId) REFERENCES profile(profileId),
FOREIGN KEY(messageReceiverId) REFERENCES profile(profileId),
PRIMARY KEY(messageId)
);



CREATE TABLE need (
needId INT UNSIGNED AUTO_INCREMENT NOT NULL,
profileId INT UNSIGNED NOT NULL,
needDescription VARCHAR(5000),
needFulfilled TINYINT UNSIGNED,
needTitle VARCHAR (64),
INDEX(needTitle),
INDEX(profileId),
FOREIGN KEY(profileId) REFERENCES profile(profileId),
PRIMARY KEY(needId)
);



CREATE TABLE karma (
profileId INT UNSIGNED NOT NULL,
needId INT UNSIGNED NOT NULL,
karmaAccepted TINYINT UNSIGNED,
karmaActionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
INDEX(profileId),
INDEX(needId),
FOREIGN KEY(profileId) REFERENCES profile(profileId),
FOREIGN KEY(needId) REFERENCES need(needId),
PRIMARY KEY(profileId, needId)
);
