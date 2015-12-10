<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Activation Completion";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<div class="col-md-12" id="registration-complete">
	<h1 class="panel-title" ><i class="fa fa-times pull-right" id="hide"></i>
		Karma Activation
	</h1>
	<a type="button" class="btn btn-primary" href="<?php echo $PREFIX; ?>php/controllers/activation-controller.php" >ACTIVATE ACCOUNT</a>
</div>



