<!----------------------------------
*TEMPLATE for karma home page
*
*@author Jennifer Hung <jhung@cnm.edu>
*
------------------------------------>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
			integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
			crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!--Link to custom CSS files here-->
	<link rel="stylesheet" href="../../lib/css/navbar.css">
	<link rel="stylesheet" href="../../lib/css/side-panel.css">

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

	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
			  integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
			  crossorigin="anonymous"></script>
	<!--javascript-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
</head>
<body class="sfooter">
	<div class="sfooter-content">
		<div class="navbar-wrapper">
			<div class="container-fluid">

				<nav class="navbar navbar-fixed-top">

					<div class="container">

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
									  aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><a class="navbar-brand animate" href="#"><img class="img-responsive" id="navbar-brand" src="../../img/octopusicon.png"/></a></a>
						</div>

						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#" class="">Home</a></li>
								<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Edit</a></li>
										<li><a href="#">Settings</a></li>
									</ul>
								</li>
								<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Messages <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Offers</a></li>
										<li><a href="#">Standard</a></li>
									</ul>
								</li>
							</ul>
						</div>

						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control pull-right" style="width: 300px; margin-right: 35px, border: 1px solid black; background-color: #e5e5e5;" placeholder="Search">
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default">
								<span class="glyphicon glyphicon-remove">
									<span class="sr-only">Close</span>
								</span>
							</button>
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Search</span>
								</span>
							</button>
							</span>
							</div>
						</form>
					</div><!-- /.navbar-collapse -->
					</nav><!-- /.container-fluid -->



		<!--sidebar-->
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
											Brand
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

									<li><a href="#"><span class="glyphicon glyphicon-send"></span> Link</a></li>
									<li class="active"><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
									<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

									<!-- Dropdown-->
									<li class="panel panel-default" id="dropdown">
										<a data-toggle="collapse" href="#dropdown-lvl1">
											<span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
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

									<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

								</ul>


								<footer>
									<div class="container">
										Footer Here
									</div>
								</footer>
							</div><!-- /.navbar-collapse -->
						</nav>
					</div>

					<!-- Main Content -->
					<div class="container-fluid">
						<div class="side-body">
							<h1> Main Content here </h1>
							<p>karma Request Feed</p>
						</div>
					</div>
				</div>
				<script src="../../lib/js/nav.js"></script>

</body>



			<!-- uncomment code for absolute positioning tweek see top comment in css
			 <div class="absolute-wrapper"></div>

					<!-- Main Content
					<div class="container-fluid">

						<div class="side-panel">
							<h1> Kismet Main Content </h1>
							<p> Karma Request Feed </p>
						</div>
					</div>
				</nav>
			</div>
		</div>













