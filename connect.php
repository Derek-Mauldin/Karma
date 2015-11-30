<?php
require_once 'config.ini';
$conn= new mysqli($hn,$un, $pw, $db);

if($conn->connect_error)die($conn->connect_error);
else {
	echo "successful connection";
}
?>