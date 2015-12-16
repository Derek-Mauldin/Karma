<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Log-in</h4>

			</div>
			<div class="modal-body">

							<form id="login-form" name="login-form" action="php/controllers/login-controller.php" method="post" role="form">
								<div class="form-group">
									<input type="email" name="logInEmail" id="logInEmail" tabindex="1" class="form-control" placeholder="Email" value="">
								</div><!--/.form-group-->

								<div class="form-group">
									<input type="password" name="logInPassword" id="logInPassword" tabindex="2" class="form-control" placeholder="Password">
								</div><!--/form-group-->

								<div class="form-group text-center">
									<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
									<label for="remember"> Remember Me</label>
								</div><!--form-group-->

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div><!--/col-md-6-->
									</div><!--row-->
								</div><!---/form-group-->

								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="php/forms/recover-form.php" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div><!--/text-center-->
										</div><!--/col-md-12-->
									</div><!--/row-->
								</div><!--/form-group-->

								<div id="loginError" name="loginError"></div>
							</form><!-- #login-form -->


						</div><!--/col-1g-12-->
					</div><!--/row-->
				</div><!--/panel-body-->
			</div><!--/panel-login-->

