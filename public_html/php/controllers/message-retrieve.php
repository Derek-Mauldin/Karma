<?php

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");


try {

	// connect to database
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	// get needs from database
	$needs = Need::getAllneeds($pdo);
	$needs->rewind();
	$needCount = $needs->count();

	// create each need panel and send to front
	for($i=1; $i <= $needCount; $i++) {

		$needTitle = $needs[$needs->key()]->getNeedTitle();
		$needDescription = $needs[$needs->key()]->getNeedDescription();

		echo "<div class='listing clearfix panel panel-default'>";
		echo "<div class='panel-heading'>";
		echo "<h4 class='listing-title'><i class='fa fa-times pull-right'></i><span class='request'>REQUEST</span>&nbsp;$needTitle</h4>";
		echo "</div>";

		echo "<div class='panel-body''>";
		echo "<a href=''#'><img src='http://placehold.it/60x60' alt='thumbnail image' class='img-thumbnail pull-left'></a>";
		echo "<p class='text-justify'>$needDescription</p>";
		echo "<button class='btn btn-primary btn-md pull-right' type='button' data-toggle='modal' data-target='#offerModal'>Make Offer</button>";
		echo "</div>";
		echo "</div>";

		$needs->next();

	}

} catch(Exception $exception) {
	echo $exception;

}