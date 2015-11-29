<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
unset($_SESSION["profile"]);

session_destroy();

// what should go here
header("Location:index.php");