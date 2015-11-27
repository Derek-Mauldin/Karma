
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

				<!--Google Fonts-->
				<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100|Open+Sans:400,800,300,700' rel='stylesheet' type='text/css'>


				<!--font awesome-->
				<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

				<!--Link to custom CSS files here-->

				<link type="text/css" href="../lib/css/styles.css" rel="stylesheet">

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
				<script type="text/javascript" src="countryStateCity.js"></script>
				<title>Simple Karma Template</title>

				<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
				<![endif]-->
				<link rel="stylesheet" href="/css/bootply.css">
				<!--fb-->
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=482723745132387";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
				<!--end-->
			</head>
	<body>
		<div class="container">
			<h1>Edit Profile</h1>
			<hr>
			<div class="row">
				<!-- left column -->
				<div class="col-md-3">
					<div class="text-center">
						<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
						<h6>Upload a different photo...</h6>

						<input type="file" class="form-control">
					</div>
				</div>

				<!-- edit form column -->
				<div class="col-md-9 personal-info">
					<div class="alert alert-info alert-dismissable">
						<a class="panel-close close" data-dismiss="alert">×</a>
						<i class="fa fa-coffee"></i>
						This is an <strong>.alert</strong>. Use this to show important messages to the user.
					</div>
					<a href="#personalInfo">Edit Settings</>
					<h3 class="hidden" id="personalInfo"></h3>
					<a href="#personalInfo">Edit Profile</>


					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label">First name:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="first-name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Last name:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="last-name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Company:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Email:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="janesemail@gmail.com">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Time Zone:</label>
							<div class="col-lg-8">
								<div class="ui-select">
									<select id="user_time_zone" class="form-control">
										<option value="Hawaii">(GMT-10:00) Hawaii</option>
										<option value="Alaska">(GMT-09:00) Alaska</option>
										<option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
										<option value="Arizona">(GMT-07:00) Arizona</option>
										<option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
										<option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
										<option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
										<option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Username:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" value="user-namer">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password:</label>
							<div class="col-md-8">
								<input class="form-control" type="password" value="11111122333">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Confirm password:</label>
							<div class="col-md-8">
								<input class="form-control" type="password" value="11111122333">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input type="button" class="btn btn-primary" value="Save Changes">
								<span></span>
								<input type="reset" class="btn btn-default" value="Cancel">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-----Edit Profile------>
		<div class="container">
			<h1>Edit Profile</h1>
			<hr>
			<div class="row">
				<!-- left column -->

				<!-- edit form column -->
				<div class="col-md-9 personal-info">
					<div class="alert alert-info alert-dismissable">
						<a class="panel-close close" data-dismiss="alert">×</a>
						<i class="fa fa-coffee"></i>
						This is an <strong>.alert</strong>. Use this to show important messages to the user.
					</div>
					<a href="#personalInfo">Edit Settings</>
					<h3 class="hidden" id="personalInfo"></h3>
					<a href="#personalInfo">Edit Profile</>


					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label"></label>
							<div class="col-lg-8">
								<input class="form-control" type="About Me" value="about-me">
							</div

							<div class="form-group">
								<label class="col-lg-3 control-label">Request:</label>
								<div class="col-lg-8">
									<input class="form-control" type="text" value="request">
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Date Desired:</label>
									<div class="col-lg-8">
										<input class="form-control" type="text" value="">
									</div>
								</div>
								<fieldset style="width: 230px;">
									<legend><strong>Make your selection</strong></legend>
									<p>
									<form name="test" method="POST" action="processingpage.php">
										<table>
											<tr>
												<td style="text-align: left;">Country:</td>
												<td style="text-align: left;">
													<select name="country" id="country" onchange="setStates();">
														<option value="Canada">Canada</option>
														<option value="Mexico">Mexico</option>
														<option value="United States">United States</option>
													</select>
												</td>
											</tr><tr>
												<td style="text-align: left;">State:</td>
												<td style="text-align: left;">
													<select name="state" id="state" onchange="setCities();">
														<option value="">Please select a Country</option>
													</select>
												</td>
											</tr><tr>
												<td style="text-align: left;">City:</td>
												<td style="text-align: left;">
													<select name="city"  id="city">
														<option value="">Please select a Country</option>
													</select>
												</td>
											</tr>
										</table>
									</form>
								</fieldset>
								<div class="form-group">
									<label class="col-lg-3 control-label">Located</label>
									<div class="col-lg-8">
										<input class="form-control" type="text" value="myemail@gmail.com">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Availability</label>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Username:</label>
									<div class="col-md-8">
										<input class="form-control" type="text" value="username">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-8">
										<input class="form-control" type="password" value="11111122333">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-8">
										<input class="form-control" type="password" value="11111122333">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-8">
										<input type="button" class="btn btn-primary" value="Save Changes">
										<span></span>
										<input type="reset" class="btn btn-default" value="Cancel">
									</div>
								</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../../lib/js/countryStateCity.js"></script>
	</body>
</html>