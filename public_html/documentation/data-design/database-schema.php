<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
			<title>Karma Schema</title>
		</head>

		<body>
			<h1>Karma Database Schema</h1>

			<div>
				<h2>member</h2>
				<p>
					CREATE TABLE member ( <br />
					&emsp;memberId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
					&emsp;memberAccessLevel CHAR(1) NOT NULL,<br />
					&emsp;memberEmail VARCHAR(255) NOT NULL,<br />
					&emsp;<b>memberEmailActivation ????,</b><br />
					&emsp;<b>memberHash CHAR(?) NOT NULL,</b><br />
					&emsp;<b>memberSalt CHAR(?) NOT NULL,</b><br />
					&emsp;PRIMARY KEY(memberId)<br />
					);<br />
				</p>
			</div>
			<div>
				<h2>profile</h2>
				<p>
					CREATE TABLE profile (
					&emsp;profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,<br />
					&emsp;memberId INT UNSIGNED NOT NULL,<br />
					&emsp;profileBlurb VARCHAR(5000),<br />
					&emsp;profileHandle VARCHAR(15) NOT NULL,<br />
					&emsp;profileFirstName VARCHAR(50) NOT NULL,<br />
					&emsp;profileLastName VARCHAR(50) NOT NULL,<br />
					&emsp;<b>profilePhoto ?????</b>,<br />
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
				&emsp;<b>messageContent VARCHAR(20000) NOT NULL,</b></b><br />
				&emsp;messageDateTime DATETIME NOT NULL,<br />
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
					&emsp;INDEX(profileId),<br />
					&emsp;FOREIGN KEY(profileId) REFERENCES profile(profileId),<br />
					&emsp;PRIMARY KEY(needId)<br />
					);<br />
				</p>
			</div>
			<div>
				<h2>karma</h2>
				<p>
					&emsp;CREATE TABLE karma (<br />
					&emsp;profileId INT UNSIGNED NOT NULL,<br />
					&emsp;needId INT UNSIGNED NOT NULL,<br />
					&emsp;karmaAccepted TINYINT,<br />
					&emsp;karmaActionDate DATETIME,<br />
					&emsp;INDEX(profileId),<br />
					&emsp;INDEX(needId),<br />
					&emsp;FOREIGN KEY(profileId) REFERENCES profile(profileId),<br />
					&emsp;FOREIGN KEY(needId), REFERENCES need(needId)<br />
					);<br />
				</p>
			</div>
		</body>
	</html>
