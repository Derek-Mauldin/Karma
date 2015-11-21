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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
				integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
				crossorigin="anonymous">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
				integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://bootsnipp.com/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">

		<!--link rel="stylesheet" href="../css/navbar.css">-->
		<link rel="stylesheet" href="./../css/side-panel.css">
		<link rel="stylesheet" href="./../css/footer.css">
		<link rel="stylesheet" href="./../css/nav3.css">


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

		</head>>
	<body>
		<nav class="navbar navbar-fixed-top navbar-bootsnipp animate" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="animbrand">
						<a class="navbar-brand animate" href="http://bootsnipp.com">Bootsnipp</a>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					<ul class="nav navbar-nav navbar-right">
						<li class="visible-xs">
							<form action="http://bootsnipp.com/search" method="GET" role="search">
								<div class="input-group">
									<input type="text" class="form-control" name="q" placeholder="Search for snippets">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span></button>
              </span>
								</div>
							</form>
						</li>
						<li class=""><a href="http://bootsnipp.com/about" class="animate">About</a></li>
						<li>
							<a href="#" class="dropdown-toggle animate " data-toggle="dropdown">Tools <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<!--            <li class=""><a href="http://bootsnipp.com/blog" class="animate">Blog <span class="pull-right glyphicon glyphicon-pencil"></span></a></li>
												<li class=""><a href="http://bootsnipp.com/resources" class="animate">List of resources <span class="pull-right glyphicon glyphicon-align-justify"></span></a></li>
												<li><a href="http://getbootstrap.com" target="_blank" class="animate">Download Bootstrap <span class="pull-right glyphicon glyphicon-cloud-download"></span></a></li>
												<li class="dropdown-header">Bootstrap Templates</li>
												<li class=""><a href="http://bootsnipp.com/templates" class="animate">Browse Templates <span class="pull-right glyphicon glyphicon-shopping-cart"></span></a></li>
												<li class="dropdown-header">Builders</li>
								-->
								<li class=""><a href="http://bootsnipp.com/forms" class="animate">Form Builder <span class="pull-right glyphicon glyphicon-tasks"></span></a></li>
								<li class=""><a href="http://bootsnipp.com/buttons" class="animate">Button Builder <span class="pull-right glyphicon glyphicon-edit"></span></a></li>
								<li class=""><a href="http://bootsnipp.com/iconsearch" class="animate">Icon Search <span class="pull-right glyphicon glyphicon-search"></span></a></li>
								<li class="dropdown-header">Dan's Tools</li>
								<li class=""><a href="http://www.cleancss.com/diff-compare-merge/" class="animate">Diff / Merge <span class="pull-right glyphicon glyphicon-transfer"></span></a></li>
								<li class=""><a href="http://www.hexcolortool.com/" class="animate">Color Picker <span class="pull-right glyphicon glyphicon-pencil"></span></a></li>
								<li class=""><a href="http://www.danstools.com/keyword-tool/" class="animate">Keyword Tool <span class="pull-right glyphicon glyphicon-list-alt"></span></a></li>
								<li class=""><a href="http://www.cssfontstack.com/Web-Fonts/" class="animate">Web Fonts <span class="pull-right glyphicon glyphicon-font"></span></a></li>
								<li class=""><a href="http://www.htaccessredirect.net/" class="animate">.htaccess Generator <span class="pull-right glyphicon glyphicon-console"></span></a></li>
								<li class=""><a href="http://www.favicon-generator.org/" class="animate">Favicon Generator <span class="pull-right glyphicon glyphicon-picture"></span></a></li>
								<li class=""><a href="http://www.website-performance.org/" class="animate">Site Speed Test <span class="pull-right glyphicon glyphicon-dashboard"></span></a></li>

							</ul>
						</li>
						<li class="dropdown">
							<a href="http://bootsnipp.com/snippets" class="dropdown-toggle animate" data-toggle="dropdown">Snippets <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="http://bootsnipp.com/snippets/featured" class="animate">Featured <span class="pull-right glyphicon glyphicon-star"></span></a></li>
								<li class=""><a href="http://bootsnipp.com/tags" class="animate">Tags  <span class="pull-right glyphicon glyphicon-tags"></span></a></li>
								<li class="dropdown-header">By Bootstrap Version</li>
								<li><a href="http://bootsnipp.com/tags/3.3.0" class="animate">3.3.0</a></li>
								<li><a href="http://bootsnipp.com/tags/3.2.0" class="animate">3.2.0</a></li>

							</ul>
						</li>

						<li class=""><a href="http://bootsnipp.com/register" class="animate">Register</a></li>
						<li id="nav-login-btn" class=""><a href="http://bootsnipp.com/login" class="animate">Login</a></li>

						<li class="hidden-xs"><a href="#toggle-search" class="animate"><span class="glyphicon glyphicon-search"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="bootsnipp-search animate">
				<div class="container">
					<form action="http://bootsnipp.com/search" method="GET" role="search">
						<div class="input-group">
							<input type="text" class="form-control" name="q" placeholder="Search for snippets and hit enter">
          <span class="input-group-btn">
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span></button>
          </span>
						</div>
					</form>
				</div>
			</div>
		</nav>
		<div class="container" style="margin-bottom:20px; margin-top:20px;max-width:1200px">
			<div class="row">
				<div class="col-md-12">
					<div style="margin-top:10px">
						<!-- Bootstrap core JavaScript
================================================== -->
						<!-- Placed at the end of the document so the pages load faster -->
						<script src="./../js/side-panel.js"></script>
						<script src="../js/nav3-needstweak.js"></script>


						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
						<script src="../../dist/js/bootstrap.min.js"></script>
						<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
						<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>




