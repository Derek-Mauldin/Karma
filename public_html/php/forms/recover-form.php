
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