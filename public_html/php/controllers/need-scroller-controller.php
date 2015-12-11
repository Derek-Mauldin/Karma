<?php

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

//$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
//$start = ($page * $limit) - $limit;
# query for page navigation





try {

	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$needs = Need::getAllneeds($pdo);

	echo "something";







} catch(Exception $exception) {

}
