<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--font styles-->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Acme">

		<!--javascript-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
				integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
				crossorigin="anonymous">
		<!--font-awesome-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
				integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<!--Animate.css-->
		<link rel="stylesheet" href="://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">

		<!--Link to custom CSS files here-->
		<link type="text/css" href="../css/sidepanel.css" rel="stylesheet">
		<link type="text/css" href="../css/footer.css" rel="stylesheet">
		<link type="text/css" href="./../css/style.css" rel="stylesheet">

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

		<!-- jQuery form validation and additional methods (for capstone) -->
		<script type="text/javascript" src="//cdnjs.cloudfare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script type="text/javascript"
				  src="//cdnjs.cloudfare/com/ajax/libs/jquery-validate/1.14.0/jquery.valiate.min.js"></script>
		<script type="text/javascript"
				  src="//cdnjs.cloudfare.com/ajax/libs/jquery-validate/1.14.0.additional-methods.min.js"></script>

		<!--jQuery Qtip-->
		<script type="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/imagesloaded.pkg.min.js"></script>
		<script type="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/jquery.qtip.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
				  integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
				  crossorigin="anonymous"></script>

		<!-- jscroll plugin -->
		<script src="../../lib/plugins/jscroll/jquery.jscroll.min.js" type="text/javascript"></script>

		<!--custom javascript-->
		<script src="../js/home.js"></script>


		<!-- Page Title -->
		<title>Homepage Outline</title>
	</head>

	<body class="sfooter">
		<div class="sfooter-content">
			<!--include the <head> tag-->
			<header>
				<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navLogo" href="../template/home-pg.php"><img id="navLogo"
							src="../../img/octopusicon.png"></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->

						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search"
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						</div>
						<ul class="nav navbar-nav navbar-right" id="sidebar">
							<li id="company">Kismet&nbsp;&nbsp;&nbsp;&nbsp;</li>
							<li>Home&nbsp;&nbsp;&nbsp;&nbsp;</li>
							<li>Profile&nbsp;&nbsp;&nbsp;&nbsp;</li>
							<li>Messages&nbsp;&nbsp;&nbsp;&nbsp;</li>
							<li>Settings</li>
							<li><br></li>
						</ul>
					</div>
				</nav>
			</header>
			<!--this is the sidebar-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 hidden-xs hidden-sm" id="sidepanel">
						<section class="side-panel panel panel-default">
							<ul>
								<li><br></li>
								<li><br></li>
								<li><br></li>
								<li><a href="#">Home</a></li>
								<li><br></li>
								<li><a href="#">Requests</a></li>
								<li><br></li>
								<li><br></li>
								<li><br></li>
								<li><br></li>
								<li><br></li>
							</ul>
						</section>
					</div>

					<!-- main content area -->
					<div class="clearfix"
				</div>
				<div class="col-md-8 col-xs-12">
					<main>
						<p><br></p>

						<p><br></p>
						<!-- load feed -->

								<div class="listing clearfix panel panel-default">
									<div class="panel-heading"><p><i class="fa fa-times"></i>
											<span>REQUEST</span>&nbsp;Soccer Coach</p>
									</div>
									<div class="container" id="left" a href="#">

										<figure>
											<img class="profileImage" src="http://placehold.it/60x60" alt="thumbnail image">
											<figcaption>$handle</figcaption>
										</figure>
										</a>
									</div>


									<div id="right">
										<button class="btn btn-primary btn-md btn" type="button"
												  data-toggle="modal" data-target="#myModal">Make Offer
										</button>
									</div>

									<div class="listing clearfix panel panel-default">

											<div id="center">One of a group of parents forming a club soccer team for kids ages 9-12. We would like
											a coach. The season begins
											in May and we would like to start practice ASAP. We will provide snacks for the team.
											</div>


										<!--Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
											  aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<?php include_once "../html/form.html" ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>

							<div class="listing clearfix panel panel-default">
								<div class="panel-heading"><i class="fa fa-times pull-right"></i>

									<p class="listing-request"><span>REQUEST</span>&nbsp;Listing request here</p>
								</div>
								<div class="panel-body">
									<img src="http://placehold.it/60x60" alt="thumbnail image"
										  class="img-thumbnail pull-left">

									<p class="listing-text col-md-8 text-justify">
										Listing text here
									</p>
									<button class="panel-offer btn btn-primary btn-md btn-pull-right" type="button"
											  data-toggle="modal" data-target="#myModal">
										Make Offer
									</button>
								</div>
								<!--Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
									  aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<?php include_once "../html/form.html" ?>
									</div>
								</div>
							</div>

							<div class="listing clearfix panel panel-default">
								<div class="panel-heading"><i class="fa fa-times pull-right"></i>

									<p class="listing-request">
										<span>REQUEST</span>&nbsp;
										Listing request here</p>
								</div>
								<div class="panel-body">
									<img src="http://placehold.it/60x60" alt="thumbnail image"
										  class="img-thumbnail pull-left">

									<p class="listing-text col-md-8 text-justify">
										Listing text here
									</p>
									<button class="panel-offer btn btn-primary btn-md btn-pull-right" type="button"
											  data-toggle="modal" data-target="#myModal">
										Make Offer
									</button>
								</div>
								<!--Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
									  aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<?php include_once "../html/form.html" ?>
									</div>
								</div>
							</div>

							<div class="listing clearfix panel panel-default">
								<div class="panel-heading"><i class="fa fa-times pull-right"></i>

									<p class="listing-request">
										<span>REQUEST</span>&nbsp;
										Listing request here</p>
								</div>
								<div class="panel-body">
									<img src="http://placehold.it/60x60" alt="thumbnail image"
										  class="img-thumbnail pull-left">

									<p class="listing-text col-md-8 text-justify">
										Listing text here
									</p>
									<button class="panel-offer btn btn-primary btn-md btn-pull-right" type="button"
											  data-toggle="modal" data-target="#myModal">
										Make Offer
									</button>
								</div>
							</div>

							<!--Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
								  aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<?php include_once "../html/form.html" ?>
								</div>
							</div>
						</div>
				</div>
				</divmain>
			</div>

			<!--.sfooter-content-->

			<footer class="footer navbar-fixed-bottom">
				<div class="container">
					<a href="#">About </a>&nbsp;
					<a href="#">FAQ </a>&nbsp;
					<a href="#">Contact Us</a>
				</div>
			</footer>
	</body>
	<script type="text/javascript" src="../js/form-scripts.js"></script>
	<script type="text/javascript" src="../js/home.js"></script>

</html>