<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("../../php/template/head-utils.php");
?>

<div class="sfooter-content">
	<div class="container">
		<div class="row">
			<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
				<A href="../.././php/controllers/logout-controller.php">Logout</A>
				<br>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">$username</h3>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"></div>
								<div class=" col-md-9 col-lg-9 ">
									<div>Blurb</div>
									<!-- message option is hidden when it is the user looking at their own profile-->
										<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#messageModal">Message $user</button>
								</div>
							</div>

						<div class="panel-footer">
							<span class="pull-right"><a href="../../php/forms/edit-profile.php" data-original-title="Edit profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
								<i class="glyphicon glyphicon-edit"></i></a>
							</span>
						</div>
					</div>
				</div>
			</div>

	<!-- Offer Form Modal -->?
	<?php require_once("message-modal.php"); ?>
</div>
