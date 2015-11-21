<!----------------------------------
*TEMPLATE for karma home page
*
*@author Jennifer Hung <jhung@cnm.edu>
*
------------------------------------>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<link rel="stylesheet" href="../../lib/css/login-mobile.css">
	<link rel="stylesheet" href="../../lib/css/navbar.css">


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
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
			  integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
			  crossorigin="anonymous"></script>
	<!--javascript-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
</head>
<body>
	<div class="navbar-wrapper">
		<div class="container-fluid">
			<nav class="navbar navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><a class="navbar-brand animate" href="#"><img class="img-responsive" id="navbar-brand-mobile" src="../../img/octopus-icon.png"/></a>
						</a>
					</div>

					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Messages <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Offers</a></li>
									<li><a href="#">Standard</a></li>
								</ul>
							</li>
							<li class=" down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<Li><a href=""#">About Us</a></Li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Report Abuse</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</li>

						</ul>
						<ul class="nav navbar-nav pull-right">
							<li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as  <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Change Password</a></li>
									<li><a href="#">My Profile</a></li>
								</ul>
							</li>
							<li class=""><a href="#">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</body>
</html>



