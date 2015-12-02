<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Profile Edit";

/*load head-utils.php*/
require_once(dirname(__DIR__) . "/template/head-utils.php");
?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#profileForm" class="active" id="profile-form-link">Profile</a>
								</div>
								<div class="col-xs-6">
									<a href="#edit-settings" id="edit-settings-link">Settings</a>
								</div>
							</div>
							<hr>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">

									<form id="editProfileForm" name="editProfileForm" action="../controllers/edit-profile-controller.php"
											method="post" role="form" style="display: block;">
										<div class="col-lg-12">
											<div class="text-center">
												<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
												<h6>Upload a different photo...</h6>
												<input type="file" class="form-control">
											</div>
										</div>
										<br>

										<div class="form-group">
											<input type="text" name="blurb" id="blurb" tabindex="1" class="form-control"
													 placeholder="About Me" value="">
										</div>
										<div class="form-group">

											<div class="row">
												<div class="col-md-6 col-md-offset-2" id="edit-buttons">
													<button type="submit" class="btn btn-default btn-md col-md-5">Reset</button>
													<button type="reset" class="btn btn-default btn-md col-md-5">Submit</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<div id="edit-settings" style="display: none;">
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
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="5" class="form-control"
										 placeholder="Change Password">
							</div>
							<div class="form-group">
								<input type="password" name="confirmLPassword" id="confirmPassword" tabindex="6"
										 class="form-control" placeholder="Confirm Password">
							</div>
							<div class="edit-button-group">
								<div class="row">
									<div class="col-md-6 col-md-offset-2" id="edit-buttons">
										<button id="submitProfile" name="submitProfile" type="submit" class="btn btn-default btn-md col-md-5">Reset</button>
										<button type="reset" class="btn btn-default btn-md col-md-5">Submit</button>
									</div>
									<div id="editProfileError" name="editProfileError"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>