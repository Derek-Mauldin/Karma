<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
			<title>Karma Schema</title>
		</head>

		<body>
			<h1>Karma Database Schema</h1>

			<p>
				DROP TABLE IF EXISTS karma<br />
				DROP TABLE IF EXISTS need<br />
				DROP TABLE IF EXISTS message<br />
				DROP TABLE IF EXISTS profile<br />
				DROP TABLE IF EXISTS member<br />
			</p>

			<div>
				<h2>member</h2>
				<p>
					CREATE TABLE member ( <br />
					&emsp;memberId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
					&emsp;memberAccessLevel CHAR(1) NOT NULL,<br />
					&emsp;memberEmail VARCHAR(255) NOT NULL,<br />
					&emsp;memberEmailActivation CHAR32,<br />
					&emsp;memberHash CHAR(128) NOT NULL,<br />
					&emsp;memberSalt CHAR(164) NOT NULL,<br />
					&emsp;UNIQUE(memeberEmail),<br />
					&emsp;PRIMARY KEY(memberId)<br />
					);<br />
				</p>
			</div>
			<div>
				<h2>profile</h2>
				<p>
					CREATE TABLE profile (<br />
					&emsp;profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
					&emsp;memberId INT UNSIGNED NOT NULL,<br />
					&emsp;profileBlurb VARCHAR(3000),<br />
					&emsp;profileHandle VARCHAR(15) NOT NULL,<br />
					&emsp;profileFirstName VARCHAR(50) NOT NULL,<br />
					&emsp;profileLastName VARCHAR(50) NOT NULL,<br />
					&emsp;profilePhoto VARCHAR(255),<br />
					&emsp;profilePhotoType VARCHAR(20),<br />
					&emsp;UNIQUE(profilePhoto),
					&emsp;UNIQUE(profileHandle),<br />
					&emsp;INDEX(memberId),<br />
					&emsp;FOREIGN KEY(memberId) REFERENCES member(memberId),<br />
					&emsp;PRIMARY KEY(profileId)<br />
					);<br />
				</p>
			</div>
			<div>
				<h2>message</h2>
				CREATE TABLE message (<br />
				&emsp;messageId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
				&emsp;messageSenderId INT UNSIGNED NOT NULL,<br />
				&emsp;messageReceiverId INT UNSIGNED NOT NULL,<br />
				&emsp;messageContent VARCHAR(8192) NOT NULL,<br />
				&emsp;messageDateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,<br />
				&emsp;INDEX(messageSenderId),<br />
				&emsp;INDEX(messageReceiverId),<br />
				&emsp;FOREIGN KEY(messageSenderId) REFERENCES profile(profileId),<br />
				&emsp;FOREIGN KEY(messageReceiverId) REFERENCES profile(profileId),<br />
				&emsp;PRIMARY KEY(messageId)<br />
				);<br />
			</div>
			<div>
				<h2>need</h2>
				<p>
					CREATE TABLE need (<br />
					&emsp;needId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
					&emsp;profileId INT UNSIGNED NOT NULL,<br />
					&emsp;need VARCHAR(5000),<br />
					&emsp;fulfilled BOOLEAN ,<br />
					&emsp;INDEX(need),<br />
					&emsp;INDEX(profileId),<br />
					&emsp;FOREIGN KEY(profileId) REFERENCES profile(profileId),<br />
					&emsp;PRIMARY KEY(needId)<br />
					);<br />
				</p>
			</div>
			<div>
				<h2>karma</h2>
				<p>
					CREATE TABLE karma (<br />
					&emsp;profileId INT UNSIGNED NOT NULL,<br />
					&emsp;needId INT UNSIGNED NOT NULL,<br />
					&emsp;karmaAccepted BOOLEAN ,<br />
					&emsp;karmaActionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,<br />
					&emsp;INDEX(profileId),<br />
					&emsp;INDEX(needId),<br />
					&emsp;FOREIGN KEY(profileId) REFERENCES profile(profileId),<br />
					&emsp;FOREIGN KEY(needId), REFERENCES need(needId)<br />
					);<br />
				</p>
			</div>
		</body>
	</html>
