
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
				<!--javascript-->
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

				<!--font awesome-->
				<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

				<!--Link to custom CSS files here-->
				<link type="text/css" href="../lib/css/navbar.css" rel="stylesheet">
				<link type="text/css" href="../lib/css/register.css" rel="stylesheet">

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

				<title>Kismet - Recover</title>
	</head>
		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand brand-shifted" href="#"><img class="brand-icon" src="../../img/orange-robot-logo-sm.png" alt="Kismet Logo"></a>
				</div>
				<!-- Navbar collapse -->
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class=""><a href="#">Kismet</a></li>
						<li class=""><a href="#">Contact</a></li>

					</ul>
					<ul class="nav navbar-nav navbar-right shifted">
						<li class=""><a href="#">Register</a></li>
						<li class=""><a href="#">Log In</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div><!-- /.Fixed navbar -->
	<div class="clearfix"</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
					<div class="alert-placeholder"></div>
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="text-center"><h2><b>Recover Account</b></h2></div>
									<form id="register-form" action="#" method="post" role="form" autocomplete="off">
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off" required/>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
													<input type="submit" name="recover-submit" id="recover-submit" tabindex="2" class="form-control btn btn-success" value="Recover Account" />
												</div>
											</div>
										</div>
										<input type="hidden" class="hide" name="token" id="token" value="b49912e5e03ef179a45cded02fdc1ecc">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div> <!-- /container -->
	<div class="container-fluid">
			<br>
			<div class="row">

				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
			</div>
		</div>
		<!-- Core Javascript -->
		<script src="http://cdn.phpoll.com/js/main.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
		<script>
			window.onload = function(){
				if (typeof pieChartData !== 'undefined') {
					var ctx = document.getElementById("chart-area").getContext("2d");
					window.myPie = new Chart(ctx).Pie(pieChartData,{
						animationEasing: "easeOutQuart",
						responsive: true,
						tooltipTemplate: "\"<%= label %>\" (<%= value %>%)"
					});
				}
				$('.validate-input').inputValidator();
			};
			(function($) {
				$(document).ready(function() {

					var cookieHeader = $('<a/>').attr('href', '#').attr('title', 'Click To Close').css({
						'padding': '8px',
						'position': 'fixed',
						'bottom': '0',
						'left': '0',
						'width': '100%',
						'background-color': '#353535',
						'color': '#FFF',
						'text-align': 'center'
					}).css('z-index', '9999').text('This site uses cookies to enhance user experience').addClass('close-cookie-banner');
					if ($.cookie('allow-cookies') === undefined) {
						$('body').append(cookieHeader);
					}
					$(document).on('click', '.close-cookie-banner', function(e) {
						e.preventDefault();
						$.cookie('allow-cookies', true, { expires: 1000, path: '/' });
						$(this).remove();
					});

				});
			})(jQuery);
		</script>
	</body>
</html>