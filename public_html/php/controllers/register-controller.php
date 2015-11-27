<?php
/**
 * Created by PhpStorm.
 * User: derekmauldin
 * Date: 11/27/15
 * Time: 12:39 PM
 *
 * controller for Karma user registration
 */

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(dirname(__DIR__))) . "/vendor/autoload.php");


try {

	// verify the XSRF challenge
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	verifyXsrf();


	// ensures that the form fields are filled out
	if(@isset($_POST["username"]) === false ||
		@isset($_POST["email"]) === false ||
		@isset($_POST["password"]) === false ||
		@isset($_POST["confirm-password"]) === false
	) {
		throw(new InvalidArgumentException("The form is not complete. Please verify and try again"));
	}

	// sanitize user input
	if(filter_var($_POST["username"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid username"));
	}
	if(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) === false){
		throw(new InvalidArgumentException("invalid email"));
	}
	if(filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password"));
	}
	if(filter_var($_POST["confirm-password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password confirmation"));
	}

















}catch (Exception $e) {
	echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
}