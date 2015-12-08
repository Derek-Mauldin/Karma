<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
unset($_SESSION["profile"]);

session_destroy();

echo "<p id=\"logOutInfo\" name=\"logOutInfo\" class=\"alert alert-info\">You are now Logged Out<p/>";

// what should go here
//header("Location:index.php");