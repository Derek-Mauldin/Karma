<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!--javascript-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

		<!--font awesome-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<!--Link to custom CSS files here-->
		<link type="text/css" href="../../lib/css/styles.css" rel="stylesheet">

		<!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
		<!--WARNING: Respond.js doesn't work if you view the page via file://-->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script type="text/javascript" src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!--js-cookie (for capstone) -->
		<script type="text/javascript" src="//cdnjs.cloudfare.com/ajax/libs/js-cookie/2.0.2/js.cookie.min.js"></script>

		<!--jQuery (necessary for bootstrap's javaScript plugins)-->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<script type="//cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.1.0/jquery.infinitescroll.min.js"></script>

		<!-- jQuery form validation and additional methods (for capstone) -->
		<script type="text/javascript" src="//cdnjs.cloudfare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudfare/com/ajax/libs/jquery-validate/1.14.0/jquery.valiate.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudfare.com/ajax/libs/jquery-validate/1.14.0.additional-methods.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

		<title>Simple Karma Template</title>

	</head>
	<body class="sfooter">
		<div class="sfooter-content">
			<header>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<form action="" class="search-form">
								<div class="form-group has-feedback">
									<label for="search" class="sr-only"></label>
									<input type="text" class="form-control" name="search" id="search" placeholder="search">
									<span class="glyphicon glyphicon-search form-control-feedback"></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</header>

			<div class="row">
				<div id="wrapper">

					<!-- Sidebar -->
					<div id="sidebar-wrapper">
						<ul class="sidebar-nav">
							<li class="sidebar-brand">
								<a href="#"><img id="logo" src="../img/orange-robot-logo-sm.png"/>
								</a>
							</li>
							<!-- Search body -->


							<li>
								<a href="javascript:ReverseDisplay('home-page')">
									Home
								</a>
							</li>
							<li>
								<a href="javascript:ReverseDisplay('profile-page')">
									Profile
								</a>
							</li>
							<li>
								<a href="javascript:ReverseDisplay('message-page')">
									Messages
								</a>
							</li>
							<li>
								<a href="javascript:ReverseDisplay('feed-page')">
									Member Feed
								</a></li>
							<li class="sidebar-brand">
								<a id="brand" href="#">Kismet</a>
							</li>
						</ul>

					</div>
					<!-- /#sidebar-wrapper -->

					<!-- Page Content -->
					<div id="page-content-wrapper">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-12">

									<!--side-bar toggle-->
									<a href="#menu-toggle" class="btn btn-default"
										id="menu-toggle">Toggle side-menu</a>

									<!--Kismet Home Page--->
									<div id="home-page" style="display:none;">
										<p>Home Page Content</p>
									</div>
									<!---Profile Page------>
									<div id="profile-page" style="display:none;">
										<p>Profile Content</p>
									</div>

									<!--Message Page-->
									<div id="message-page" style="display:none;">
										<p>Message Page Content</p>
									</div>

									<!-------Kismet Feed------>
									<div id="feed-page" style="display:none;">


										<div class="feed-wrapper">

											<div class="panel-wrapper">
												<div class="panel-heading">
													<i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;Soccer Coach
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">One of a group of parents forming a club soccer team for kids
													ages 9-12.
													We would like a coach.
													The season begins in May and we would like to start practice ASAP. We will
													provide snacks
													for the team.</p>
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>


											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>


											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>

											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>

											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>

											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>

											<div class="panel-wrapper">
												<div class="panel-heading">
													<p><i class="fa fa-times"></i><span class="request">REQUEST</span>&nbsp;title
														text here</p>
												</div>
											</div>

											<div class="panel-info">
												<div class="left">
													<div class="profile-image">
														<a href="#">
															<figure>
																<img class="profileImage" src="http://placehold.it/250x250"
																	  alt="thumbnail image">
																<figcaption>$handle</figcaption>
															</figure>
														</a>
													</div>
												</div>
												<div class="center">description
												</div>
												<div class="right">
													<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal"
															  data-target="#myModal">Make Offer
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!---Modal  -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
					  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<?php include_once "../../lib/html/form.html" ?>
					</div>
				</div>
			</div>
		</div>


		<!--.sfooter-content-->

		<footer class="footer navbar-fixed-bottom">
			<div class="container">
				<ul class="nav">
					<li class="navbar-text"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About Us</a>
					</li>
					<li class="navbar-text"><a href="#">FAQ</a></li>
					<li class="navbar-text"><a href="#">Contact Us</a></li>
					<li class="navbar-text"><a href="#">Terms of Use & Privacy Policy</a></li>
					<li class="navbar-text"><a href="#">Support</a></li>
				</ul>
			</div>
		</footer>



	</body>

</html>