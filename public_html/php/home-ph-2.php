<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Bootstrap Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"/>

		<!-- Optional Bootstrap theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous"/>

		<!-- ////////////////////////////////////////////////
		//// LINK TO YOUR CUSTOM CSS FILES HERE
		///////////////////////////////////////////////////// -->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
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

		<!-- jscroll plugin -->
		<script src="../lib/plugins/jscroll/jquery.jscroll.min.js" type="text/javascript"></script>

		<!-- Custom JavaScript@author:Derek  @author:jhung@cnm.edu -->
		<script src="../lib/js/home-pg-side-toggle-testing.js" type="text/javascript"></script>

		<!-- Page Title -->
		<title>Karma Template</title>
	</head>

	<body class="sfooter">
		<div class="sfooter-content">

			<div class="container">
				<div class="row">

					<!-- side panel -->
					<div class="col-md-4 hidden-xs hidden-sm">
						<section id="menu" class="side-panel panel panel-default">
							<a class="sidebar-brand" href="#"><img id="logo" src="../img/orange-robot-logo-sm.png"/></a>

							<!--side panel body links-->
							<div id="hp" onclick="HideAllShowOne('hp')">
								<a class="lead" href="javascript:ReverseDisplay('home-page')">Home</a>
								<p><br></p>
							</div>

							<div id="pp" onclick="HideAllShowOne('pp')">
								<a class="lead" href="javascript:ReverseDisplay('profile-page')">Profile</a>
								<p><br></p>
							</div>

							<div id="mp" onclick="HideAllShowOne('mp')">
								<a class="lead" href="javascript:ReverseDisplay('message-page')">Messages</a>
								<p><br></p>
							</div>
						</section>
					</div><!-- /#sidebar-wrapper -->

					<!-- main page content -->
					<div class="col-md-8 col-xs-12">

						<!---Profile Page------>
						<div id="profile-page" style="display:none;">
							<p>Profile Content<br></p>
							<p>Edit Profile Settings</p>
							<p>Edit Profile Content</p>
						</div>

						<!-- Start Feed -->
						<div id="feed">
							<h2>Karma Feed</h2>
							<div class="feed-wrapper">
								<div id="karma-feed" class="karma-feed">

									<!-- start listing here -->
									<div class="listing clearfix panel panel-default">
										<div class="panel-heading">
											<h4 class="listing-title">
												<i class="fa fa-times pull-right"></i><span class="request">REQUEST</span>&nbsp;Soccer Coach
											</h4>
										</div>
										<div class="panel-body">
											<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image" class="img-thumbnail pull-left"></a>
											<p class="text-justify">One of a group of parents forming a club soccer team for kids ages 9-12.We would like a coach.The season begins in May and we would like to start practice ASAP. We will provide snacks for the team.</p>
											<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#offerModal">Make Offer</button>
										</div>
									</div><!-- end listing -->
								</div><!-- #karma-feed -->
							</div><!-- .feed-wrapper-->
						</div><!--#feed-->
					</div><!-- end main page content -->
				</div><!-- .row -->
			</div><!-- .container -->

			<!-- Modal --> 
			<div class="modal fade" id="offerModal" tabindex="-1" role="dialog"> 
				<div class="modal-dialog"> 
					<div class="modal-content">
						<div class="modal-header">  
							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span hidden="true">&times;</span></button> 
							<h3 class="modal-title">Give $user a hand</h3>  
						</div> 
						<div class="modal-body"> 
							<form role="form" id="offerForm" data-toggle="validator" class="shake"> 
								<div class="form-group"> 
									<textarea id="message" class="form-control" rows="5"  placeholder="Hi! I can can give you a Skype algebra tutoring session this Friday or Saturday afternoon."  required></textarea>  
									<div class="help-block with-errors"></div> 
								</div> 
								<button type="submit" id="form-submit"  class="btn btn-success btn-lg pull-left "> Offer </button>
								 <div id="msgSubmit" class="h3 text-center hidden"></div> 
							</form> 
						</div>
						 <div class="modal-footer">
							<button type="button" class="btn btn-default pull-right"  data-dismiss="modal" aria-hidden="true"> Cancel</button> 
							 <div class="clearfix"></div> 
						</div>
					</div>
				</div>
			 </div>

		</div><!--.sfooter-contenr-->

		<footer class="footer navbar-fixed-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-hidden col-md-12">
						<ul class="nav">
							<li class="navbar-text"><a href="#">About Us</a></li>
							<li class="navbar-text"><a href="#">FAQ</a></li>
							<li class="navbar-text"><a href="#">Contact Us</a></li>
							<li class="navbar-text"><a href="#">Terms of Use</a></li>
							<li class="navbar-text"><a href="#">Support</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>