<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Bootstrap Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"/>

		<!-- Optional Bootstrap theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous"/>

		<!--Font Awesome-->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<!-- ////////////////////////////////////////////////
		//// LINK TO YOUR CUSTOM CSS FILES HERE
		///////////////////////////////////////////////////// -->

		<!-- Custom CSS -->
		<link href="../../lib/css/landing.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!-- <[if lt IE 9]>
		<script type="text/javascript" src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script type="text/javascript" src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- js-cookie (for capstone) -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/js-cookie/2.0.2/js.cookie.min.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<!-- jQuery form validation and additional methods (for capstone) -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/additional-methods.min.js"></script>

		<!-- Latest compiled and minified Bootstrap JavaScript, all compiled plugins included -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

		<!-- jscroll plugin test -->
		<script src="<?php echo $PREFIX;?>lib/plugins/jscroll/jquery.jscroll.min.js" type="text/javascript"></script>

		<!-- Custom JavaScript@author:Derek  @author:jhung@cnm.edu -->
		<script src="<?php echo $PREFIX;?>lib/js/home-pg-side-toggle-testing.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>lib/js/site-scripts.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>php/controllers/register-controller.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>php/controllers/message-controller.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>php/controllers/need-controller.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>php/controllers/edit-profile-controller.js" type="text/javascript"></script>
		<script src="<?php echo $PREFIX;?>php/controllers/login-controller.js" type="text/javascript"></script>

		<!---jscroll with ajax-->
		<script src="//cdn.jsdelivr.net/jquery.infiniteajaxscroll/1.0.1/jquery-ias.min.js"></script>


		<!-- Page Title -->
		<title><?php echo $PAGE_TITLE; ?></title>
	</head>
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
							<a href="#about">About</a>
						</li>
						<li>
							<a href="#login">Login</a>
						</li>
						<li>
							<a href="#login">Signup</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>


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
				</div>
			</div><!-- /.container -->
		</div><!-- /.intro-header -->

		<!-- -------------------------------------------------- Page Content -------------------------------------- -->

		<a  name="login"></a>


						<!-- ------------------------------------login/register links--------------------------------- -->

						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<div class="panel panel-login">
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



	<!--about-->
		<a name="about-us"></a>
		<div class="about-us">
			<h1>About</h1>
		</div>

		<a  name="contact"></a>
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

			</div>
			<!-- /.container -->

		</div>
		<!-- /.banner -->

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
								<a href="#about">About</a>
							</li>
							<li class="footer-menu-divider">&sdot;</li>

							<li class="footer-menu-divider">&sdot;</li>
							<li>
								<a href="#contact">Contact</a>
							</li>
						</ul>
						<p class="copyright text-muted small">Copyright &copy; Kammify 2015. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</footer>


	</body>

</html>
