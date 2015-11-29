<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
unset($_SESSION["profile"]);
unset($_SESSION["userName"]);

session_destroy();

// what should go here
header("Location:index.php");