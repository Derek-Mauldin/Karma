<?php
require_once 'connect.php';


$sql = "INSERT INTO need(needId, profileId, needDescription,needFulfilled,needTitle)
VALUES ('12', '34', 'coach-decription','null','coach')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>