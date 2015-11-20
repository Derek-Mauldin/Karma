<!--TEMPLATE for karma home page
@author Jennifer Hung <jhung@cnm.edu>-->
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

	<!--link rel="stylesheet" href="../css/navbar.css">-->
	<link rel="stylesheet" href="../css/side-panel2.css">
	<link rel="stylesheet" href="./../css/footer.css">
	<link rel="stylesheet" href="./../css/nav2.css">


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
	<script type="text/javascript" src="//cdnjs.cloudfare.com/ajax/libs/jquery-validate/1.14.0.additional-methods.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

	<!--javascript-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

</head>
<body>
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
							<a class="navbar-brand" href="#">
								Kismet
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
									<button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
								</form>
							</div>
						</div>
					</div>

				</div>

				<!-- Main Menu -->
				<div class="side-menu-container">
					<ul class="nav navbar-nav">

						<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-flag"></span> Requests</a></li>

						<!-- Dropdown-->
						<li class="panel panel-default" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl1">
								<span class="glyphicon glyphicon-user"></span> Messages<span class="caret"></span>
							</a>

							<!-- Dropdown level 1 -->
							<div id="dropdown-lvl1" class="panel-collapse collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>

										<!-- Dropdown level 2 -->
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lvl2">
												<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
											</a>
											<div id="dropdown-lvl2" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="#">Link</a></li>
														<li><a href="#">Link</a></li>
														<li><a href="#">Link</a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>

						<li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Support</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

		</div>

		<!-- Main Content -->
		<div class="container-fluid">
			<div class="side-body">
				<h1> Kismet Main Content here </h1>


			</div>
		</div>
	</div>

	<!--Footer -->
	<footer class="footer">
		<div class="container">
			<p class="text-muted"><a href="#"</p>
		</div>
	</footer>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="./../js/side-panel.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>







