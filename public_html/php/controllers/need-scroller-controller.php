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
	$needCount = $needs->count();

	for($i=0; $i<= 1; $i++) {

	//	$need = $needs->current();

		echo "<div class='listing clearfix panel panel-default'>";
		echo "<div class='panel-heading'>";
	   echo "<h4 class='listing-title'><i class='fa fa-times pull-right'></i><span class='request'>REQUEST</span>&nbsp;</h4>";
		echo "</div>";

		echo "<div class='panel-body''>";
		echo "<a href=''#'><img src='http://placehold.it/60x60' alt='thumbnail image' class='img-thumbnail pull-left'></a>";
		echo "<p class='text-justify'></p>";
		echo "<button class='btn btn-primary btn-md pull-right' type='button' data-toggle='modal' data-target='#offerModal'>Make Offer</button>";
		echo "</div>";
		echo "</div>";



	}






} catch(Exception $exception) {

}
