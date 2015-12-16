<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>
<link rel="stylesheet" href="lib/css/landing.css" >

<body>

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
			<div class="container topnav">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand topnav" href="#">Karmify</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#about-us">About</a>
						</li>
						<li>
						<li><a href="#myModal" data-toggle="modal" data-target="#myModal">Log-in</a></li>
						<li>
							<a href="#login">Signup</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Log-in</h4>
				</div>
				<div class="modal-body">
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
									<a href="https://twitter.com/KarmaCanDo?lang=en" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
								</li>
								<li>
									<a href="https://business.google.com/b/112680447560323078537/dashboard/getstarted?hl=en&service=plus" class="btn btn-default btn-lg"><i class="fa fa-google-plus"></i> <span class="network-name">Google +</span></a>
								</li>
								<li>
									<a href="https://www.facebook.com/Karmified-1648023685467561/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- /.container -->
		</div><!-- /.intro-header -->


		<!-- ------------------------------------login/register links--------------------------------- -->
		<!-- Page Content -->

		<a  name="login"></a>
		<div class="content-section-a">

			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-sm-6">
						<hr class="section-heading-spacer">
						<div class="clearfix"></div>

						<div class="panel panel-login">
							<div class="panel-heading">
								<div class="row">
									<!--<div class="col-xs-6">
										<a href="#login-form" class="active" id="login-form-link">Login</a>
									</div>-->
									<form id="login-form" name="login-form" action="php/controllers/login-controller.php" method="post" role="form">

										<div class="col-xs-6 text-center" >
											<a href="#register-form" class="text-center" id="register-form-link">Sign Up</a>
										</div><!--/.col-md-6-->
								</div><!--/.row-->
								<hr>
							</div><!--/.panel-heading-->

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">

										<!---register form-->

										<form id="register-form" name="register-form" action="../controllers/register-controller.php" method="post" role="form" >
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

					<div class="col-lg-5 col-lg-offset-2 col-sm-6">
						<img class="img-responsive" src="img/k.png" alt="">
					</div>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /.content-section-a -->



		<a  name="about-us"></a>

		<!-- /.content-section-a -->

		<a  name="contact"></a>

		<div class="content-section-b">

			<div class="container">

				<div class="row">
					<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
						<hr class="section-heading-spacer">
						<div class="clearfix"></div>
						<h2 class="section-heading" id="about-us">KARMA'S ONLY A BITCH IF YOU ARE</h2>

					</div>
					<div class="section-body" >
						<p class="learn-more" id="learn-more">A site designed to bring back the heart to society.  With a-pass-it-on lifestyle, members
							can offer help such as tutoring lessons and receive help as well.  Givers are encouraged.  No money.
							Just old-school frienships and good samaritans.  Takes the questions out of what people need.  Brings
							us closer to our neighbors. And, let's us stay at home while racking up some feel good karma.  </p>

					</div>
					<div class="col-lg-5 col-sm-pull-6  col-sm-6">
						<img class="img-responsive" src="img/girl-robot.png" alt="">
					</div>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /.content-section-b -->





		<div class="banner">

			<div class="container">

				<div class="row">
					<div class="col-lg-6">
						<h2>Connect to Get Karmified:</h2>
					</div>
					<div class="col-lg-6">
						<ul class="list-inline banner-social-buttons">
							<li>
								<a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
							</li>
							<li>
								<a href="../forms/register-form.php" class="btn btn-default btn-lg"><i class="fa fa-google-plus"></i> <span class="network-name">Google +</span></a>
							</li>
							<li>
								<a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
							</li>
						</ul>
					</div>
				</div>

			</div><!-- /.container -->

		</div><!-- /.banner -->

		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="list-inline">
							<li>
								<a href="#">Home</a>
							</li>
							<li class="footer-menu-divider">&sdot;</li>
							<li>
								<a href="#about-us">About</a>
							</li>
							<li class="footer-menu-divider">&sdot;</li>

							<li class="footer-menu-divider">&sdot;</li>
							<li><a href="#contact-us-modal" data-toggle="modal" data-target="#contact-us-modal">Contact</a></li>

						</ul>
						<p class="copyright text-muted small">Copyright &copy; Karmify 2015. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</footer>

		<?php require_once("ourlogin.php"); ?>
		<?php require_once("contact-us-modal.php"); ?>




	</body>

</html>
