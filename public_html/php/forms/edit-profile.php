<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once(dirname(dirname(__DIR__)) . "/php/template/head-utils.php");
?>


<div class="edit-content-wrapper">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<!--user editing links-->
			<div class="panel panel-edit">
				<div class="panel-heading">
					<div class="row">

						<!--edit-profile-link-->
						<div class="col-xs-6">
							<a href="#profile-form" class="active" id="profile-form-link">Profile</a>
						</div>

						<!--edit-settings-link-->
						<div class="col-xs-6">
							<a href="#edit-settings" id="edit-settings-link">Settings</a>
						</div>
					</div>
					<hr>
				</div>
				<!--/#panel-heading-->

				<div class="overall-form-wrapper">
					<form id="edit-user-form" name="edit-user-form" action="../controllers/edit-profile-controller.php"
							method="post" role="form"
							style="display: block;">

						<div class="row" id="profile-form">
							<div class="col-lg-12" id="profile-form">

								<div class="col-lg-12" id="avatar-input">

									<!--center avatar-->
									<div class="text-center" id="avatar-input">
										<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
										<h6>Upload a different photo...</h6>
										<input type="file" class="form-control">
									</div>
									<!--/#avatar-input-->

								</div>
								<!--/avatar-input-->
								<br>

								<div class="form-group" id="blurb-input">
									<input type="text" name="blurb" id="blurb" tabindex="1" class="form-control"
											 placeholder="About Me" value="">
								</div>
								<!--/.form-group #blurb-input-->

								<div class="form-group">
									<div class="row" id="edit-buttons-row">
										<div class="col-md-6 col-md-offset-2" id="edit-buttons">
											<button type="submit" id="submit-profile" name="submit-profile"
													  class="btn btn-default btn-md col-md-5">Reset
											</button>
											<button type="submit" class="btn btn-default btn-md col-md-5">Submit</button>
										</div>
										<!--/#edit-buttons-->

									</div>
									<!--/#edit-buttons-row-->

								</div>
								<!--/#edit-buttons-wrapper-->


							</div>
							<!--/#edit-profile-links-->

						</div>
						<!--/.edit-profile-wrapper-->


						<div id="edit-settings" style="display: none;">
							<!--<form name="edit-user-form" action="../controllers/edit-profile-controller.php" method="post" role="form" style="display: block;">
	-->
							<div class="form-group">
								<input type="text" name="firstName" id="firstName" tabindex="1" class="form-control"
										 placeholder="First Name" value="">
							</div>

							<div class="form-group">
								<input type="text" name="lastName" id="lastName" tabindex="2" class="form-control"
										 placeholder="Last Name" value="">
							</div>

							<div class="form-group">
								<input type="text" name="userName" id="userName" tabindex="3" class="form-control"
										 placeholder="Edit User Name" value="">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" tabindex="4" class="form-control"
										 placeholder="Edit Email Address" value="">
							</div>

							<hr>

							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="5" class="form-control"
										 placeholder="Enter Current Password", value="">
							</div>

							<div class="form-group">
								<input type="password" name="newPassword" id="newPassword" tabindex="5" class="form-control"
										 placeholder="New Password", value="">
							</div>

							<div class="form-group">
								<input type="password" name="confirmPassword" id="confirmPassword" tabindex="6"
										 class="form-control" placeholder="Confirm New Password" value="">
							</div>

							<div class="edit-buttons-wrapper">
								<div class="row" id="edit-buttons">
									<div class="col-md-6 col-md-offset-2" id="edit-buttons-inner">
										<button id="submit-profile" name="submit-profile" type="submit"
												  class="btn btn-default btn-md col-md-5">Reset
										</button>
										<button type="submit" class="btn btn-default btn-md col-md-5">Submit</button>

									</div><!--/.panel-edit-->


								</div><!--/#edit-content-->

							</div><!--/.edit-content-main-->


						</div><!--/#edit-settings-->

					</form>

				</div><!--/overall-form-wrapper-->

				<div id="editUserError" name="editUserError"></div>

			</div><!--/.panel-edit-->

		</div>

	</div>

</div><!--close content-wrapper--->


