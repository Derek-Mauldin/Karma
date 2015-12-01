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
						<!--Edit profile option only seen by owner of profile-->
						<span class="pull-right">
							<a href="../../php/forms/edit-profile.php" data-original-title="Edit profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
								<i class="glyphicon glyphicon-edit"></i></a>
						</span>

				<div class="panel-title">
					<h3 class="profile-username">$username</h3>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center">
							<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">
						</div>

				<div class=" col-md-9 col-lg-9 ">
					<h1>About Me</h1>
						<p>Blurb</p>
						<h1>Need Title</h1>
						<p>Need Description</p>
				</div>""
						<div class="panel-footer">
									<!-- message option is hidden when it is the user looking at their own profile-->
									<form accept-charset="UTF-8" action="" method="POST">
										<div class="message-header">
										<p>Does this message include a offer?</p>
										<label class="radio-inline"><input type="radio" name="optradio">yes</label>
										<label class="radio-inline"><input type="radio" name="optradio">no</label>
										</div>
										<div class="message-body">
										<textarea class="span4" id="new_message" name="new_message" placeholder="Hi $receiver! <?="\n \n"?>Change Text Here  <?="\n \n"?> From $sender" rows="5"></textarea>
										<button class="btn btn-info" type="submit">Send Message</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>