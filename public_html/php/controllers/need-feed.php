<?php

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/filter.php");

//$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
//$start = ($page * $limit) - $limit;
# query for page navigation;

try {

	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/karma.ini");

	$needs = Need::getAllneeds($pdo);
	$needCount = $needs->count();

	for($i=0; $i <= $needCount; $i++) {

	}

	echo "something";

} catch(Exception $exception) {

}

?>

			<!-- loop row data -->

<div class="listing clearfix panel panel-default">
	<div class="panel-heading">
		<h4 class="listing-title">
			<i class="fa fa-times pull-right"></i><span class="request">REQUEST</span>&nbsp;Soccer Coach
		</h4><!--/.listing-title-->
	</div><!--/.panel-heading-->

	<div class="panel-body">
		<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image" class="img-thumbnail pull-left"></a>
		<p class="text-justify">One of a group of parents forming a club soccer team for kids ages
			9-12.We would like a coach.The season begins in May and we would like to start practice
			ASAP. We will provide snacks for the team.</p>
		<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#offerModal">Make Offer</button>

	</div><!--/.panel-body-->
</div><!--/.panel-default-->
</div><!--/.feed-page-->