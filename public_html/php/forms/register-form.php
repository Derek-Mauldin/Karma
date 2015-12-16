<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Log In/Register";

/*load head-utils.php*/
require_once(dirname(__DIR__) . "/template/head-utils.php");

?>

<!---------------------------------------body-------------------------------------------------------->

<body class="site">

	<div class="site-content">
		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Navbar collapse -->
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="landing"><a href="../template/landing.php">Kismet</a></li>
						<li class="contact"><a href="contact-us-form.php">Contact</a></li>

					</ul>
					<ul class="nav navbar-nav navbar-right shifted">
						<li class="register-form.php"><a href="#">Register</a></li>
						<li class="register-form.php"><a href="#">Log In</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div><!-- /.Fixed navbar -->
		<div class="clearfix"</div>

	<div class="site-content">

		<!--------------------------------------login/register links----------------------------------->


		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="  col-xs-6" >
									<a href="#login-form" class="active" id="login-form-link">Login</a>
								</div>
								<div class="col-xs-6">
									<a href="#register-form" id="register-form-link">Register</a>
								</div><!--/.col-md-6-->
							</div><!--/.row-->
							<hr>
						</div><!--/.panel-heading-->

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">

	<!--------------------------------------login form---------------------------------------------------->

							<form id="login-form" name="login-form"
									action="../controllers/login-controller.php" method="post" role="form"
									style="display: block;">
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
											<input type="submit" name="login-submit" id="login-submit" tabindex="4"
													 class="form-control btn btn-login" value="Log In">
										</div><!--/col-md-6-->
									</div><!--row-->
								</div><!---/form-group-->

								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="recover-form.php" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div><!--/text-center-->
										</div><!--/col-md-12-->
									</div><!--/row-->
								</div><!--/form-group-->

								<div id="loginError" name="loginError"></div>
							</form>


							<form id="register-form" name="register-form" action="../controllers/register-controller.php"
									method="post" role="form" style="display: none;">
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
							</form>

						</div><!--/col-1g-12-->
					</div><!--/row-->
				</div><!--/panel-login-->
			</div><!--/panel-login-->
		</div><!--/col-md-6-->
	</div><!--/row-->
</div><!--/container-->
		</div><!--site-content-->
	</div><!--/site-->
</body>
</html>