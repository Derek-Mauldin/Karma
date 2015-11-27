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
	if(@isset($_POST["email"]) === false ||
		@isset($_POST["password"]) === false ||
		@isset($_POST["confirm-password"]) === false
	) {
		throw(new InvalidArgumentException("The form is not complete. Please verify and try again"));
	}

	// sanitize user input
	if(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) === false){
		throw(new InvalidArgumentException("invalid email"));
	}
	if(filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password"));
	}
	if(filter_var($_POST["confirm-password"], FILTER_SANITIZE_STRING) === false){
		throw(new InvalidArgumentException("invalid password confirmation"));
	}

	// verify that the password and password confirmation fields contain the same value
	if($_POST["password"] !== $_POST["confirm-password"]) {
		throw(new InvalidArgumentException("password and confirmation do not match"));
	}

	// create a salt, hash, and email activation code for a new member
	$salt = bin2hex(openssl_random_pseudo_bytes(164));
	$hash = hash_pbkdf2("sha512", $_POST["password"], $SALT, 4096, 255);
	$emailActivation = bin2hex(openssl_random_pseudo_bytes(16));

	// create a new member and insert into mysql
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");
	$member = new member(null, "s", $_POST["email"], $emailActivation, $hash, $salt);
	$member->insert($pdo);















}catch (Exception $e) {
	echo "<p class=\"alert alert-danger\">Exception: " . $e->getMessage() . "</p>";
}