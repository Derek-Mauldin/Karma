<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<div class="col-md-12" id="registration-complete">
	<h1 class="panel-title" ><i class="fa fa-times pull-right" id="hide"></i>
		Registration Complete
	</h1>

<div class="col-md-3">
	<h1>Welcome, $user</h1>
		<?php include_once "index.php"?>
</div>
</div>


