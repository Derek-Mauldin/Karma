<!--TEMPLATE 2 for karma home page
@author Jennifer Hung <jhung@cnm.edu>-->
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>



		<!-- Bootstrap Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

		<!-- Optional Bootstrap  theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

		<!--Font styles-->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Acme"/>

		<!--Font-awesome-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
		<!--Animate.css-->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css"/>

		<!--link rel="stylesheet" href="../css/navbar.css">-->
		<link type="text/css" href="../../lib/css/side-panel.css" rel="stylesheet"/>
		<link type="text/css" href="../../lib/css/footer.css"rel="stylesheet"/>
		<link type="text/css" href="../../lib/css/nav2.css"rel="stylesheet"/>
		<link type="text/css" href="../../lib/css/main.css"rel="stylesheet"/>

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
		<script type="text/javascript" src="//cdnjs.cloudfare/com/ajax/libs/jquery-validate/1.14.0/jquery.valiate.min.js"></script>
		<script type="text/javascript"
				  src="//cdnjs.cloudfare.com/ajax/libs/jquery-validate/1.14.0.additional-methods.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		<!--javascript-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

	</head>
	<body class="sfooter">
		<div class="sfooter-content">
			<div class="row">
			<!-- uncomment code for absolute positioning tweek see top comment in css -->
			<!-- <div class="absolute-wrapper"> </div> -->
			<!-- Menu -->
			<div class="side-menu">

				<nav class="navbar navbar-default" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<div class="brand-wrapper">

							<!-- Hamburger -->
							<button type="button" class="navbar-toggle">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<!-- Brand -->
							<div class="brand-name-wrapper">
								<a class="navbar-brand" href="#"><img class="animate" id="logo" src="../../img/robot-logo.png">
								</a>
							</div>

							<!-- Search -->
							<a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
								<span class="glyphicon glyphicon-search"></span>
							</a>

							<!-- Search body -->
							<div id="search" class="panel-collapse collapse">
								<div class="panel-body">
									<form class="navbar-form" role="search">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search">
										</div>
										<button type="submit" class="btn btn-default "><span
												class="glyphicon glyphicon-ok"></span></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Main Menu -->
					<div class="side-menu-container">
						<ul class="nav navbar-nav">
							<li><a href="#">Member Handle</a></li>
							<li><a href="#">Daily Feed</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>

			</div>

			<!-- Main Content -->

			<!-- Main Content -->
			<div class="container-fluid">
				<div class="side-body">

				<main>
					<div class="feed wrapper">


					<div class="listing clearfix panel panel-default">
						<div class="panel-heading"><p><i class="fa fa-times"></i>
								<span>REQUEST</span>&nbsp;Soccer Coach</p>
						</div>
						<div class="container" id="left"><a href="#">
							<figure>
								<img class="profileImage" src="http://placehold.it/60x60" alt="thumbnail image">
								<figcaption>$handle</figcaption>
							</figure>
							</a>
						</div>
							<div id="right">
								<button class="btn btn-primary btn-md btn" type="button" data-toggle="modal" data-target="#myModal">Make Offer</button>
							</div>
							<div class="listing clearfix panel panel-default">
							<div id="center">One of a group of parents forming a club soccer team for kids ages 9-12. We would
like a coach. The season begins in May and we would like to start practice ASAP. We will provide snacks for the team.
							</div>
							<div class="panel-offer">
								<button class="listing-button" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
									Make Offer
								</button>
							</div>
							<!--Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<?php include_once "../html/form.html" ?>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!--.sfooter-content-->

				<footer class="footer navbar-fixed-bottom">
					<div class="container">
						<ul class="nav">
							<li class="navbar-text"><a href="#">About Us</a></li>
							<li class="navbar-text"><a href="#">FAQ</a></li>
							<li class="navbar-text"><a href="#">Contact Us</a></li>
							<li class="navbar-text"><a href="#">Terms of Use & Privacy Policy</a></li>
							<li class="navbar-text"><a href="#">Support</a></li>
						</ul>
					</div>
				</footer>
					</body>

							<!-- Bootstrap core JavaScript
							<!-- Placed at the end of the document so the pages load faster -->
							<script type="text/javascript" src="../js/form-scripts.js"></script>

							<script src="./../js/side-panel.js"></script>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
							<script src="../../dist/js/bootstrap.min.js"></script>

</html>


