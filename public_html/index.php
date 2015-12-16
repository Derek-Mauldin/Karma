<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<body>

	<!-- Navigation -->
	<?php require_once("php/template/main-nav.php")?>

	<!-- Header -->
	<a name="about"></a>
	<div class="intro-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="intro-message">
						<h1>Karmify</h1>
						<h3>Depolarizing Society One Click at a Time</h3>
						<hr class="intro-divider">
						<ul class="list-inline intro-social-buttons">
							<li>
								<a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
							</li>
							<li>
								<a href="https://google.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-google-plus"></i> <span class="network-name">Google +</span></a>
							</li>
							<li>
								<a href="https://www.facebook.com/Karmified-1648023685467561/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div><!--.row-->
		</div><!-- /.container -->
	</div><!-- /.intro-header -->

	<a name="login"></a>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<!--begin login register panel-->
				<div class="panel panel-login">

					<!--login /regeister select panel -->
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#login-form" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#register-form" id="register-form-link">Register</a>
							</div><!--/.col-md-6-->
						</div><!--/.row-->
						<hr>
					</div><!--/.panel-heading-->

					<!--begin login/register form container-->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="login-form" name="login-form" action="<?php echo $PREFIX;?>php/controllers/login-controller.php" method="post" role="form">
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

								<form id="register-form" name="register-form" action="<?php echo $PREFIX;?>php/controllers/register-controller.php" method="post" role="form">
									<div class="form-group">
										<input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="First Name" value="">
									</div><!--/form-group-->

									<div class="form-group">
										<input type="text" name="lastName" id="lastName" tabindex="2" class="form-control" placeholder="Last Name" value="">
									</div><!--/form-group-->

									<div class="form-group">
										<input type="text" name="userName" id="userName" tabindex="3" class="form-control" placeholder="Please Choose a User Name" value="">
									</div><!--/form-group-->

									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="Email Address" value="">
									</div><!--/form-gorup-->

									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password">
									</div><!--/form-group-->

									<div class="form-group">
										<input type="password" name="confirmPassword" id="confirmPassword" tabindex="6" class="form-control" placeholder="Confirm Password">
									</div><!--/form-group-->

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="7" class="form-control btn btn-register" value="Register Now">
											</div><!--/col-md-6-->
										</div><!--/row-->
									</div><!--/form-group-->
									<div id="registerError" name="registerError"></div>
								</form><!--#register-form-->

							</div><!--/col-1g-12-->
						</div><!--/row-->
					</div><!--/panel-body-->
				</div><!--/panel-login-->

			</div><!--/col-md-6-->
		</div><!--/row-->
	</div><!--/container-->

	<a name="contact"></a>
	<?php require_once("php/template/footer.php");?>

</body>
</html>
