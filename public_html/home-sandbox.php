<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<body class="site">
	<div class="site-content">
		<div class="container">

			<header class="col-xs-12 hidden-xs hidden-sm">
				<h1><a href="home.php">Karmify</a></h1>
			</header>

			<!-- sidebar  -->
			<div class="col-md-4" id="sidebar-wrapper">
				<h1 class="hidden-md hidden-lg"><a class="sidebar-brand" href="home.php">Karmify</a></h1>
				<section id="menu" class="side-panel panel panel-default">
					<?php require_once("php/template/side-panel.php"); ?>
				</section>
			</div><!-- /#sidebar-wrapper -->

			<!-- main content -->
			<div id="main-content-wrapper">
				<div id="main-content">
					<div id="main" class="col-md-8 col-xs-12">

						<!-- home page -->
						<div id="home-page">
							<div class="panel panel-info" id="date-wrapper">
								<div class="panel-heading" id="date-header">
									<h4 class="date">
										<?php
										$date=new datetime("now");
										echo ($date->format("l F jS Y"));
										?>
									</h4><!--/.row #date-->
								</div><!--/.panel-heading #date-header-->
							</div><!--/panel-info #date-wrapper -->
						</div><!-- #home-page -->

						<!-- profile page -->
						<div id="profile-page">
							<div id="profile-wrapper">
								<div id="profile">

									<div class="panel-group" id="profile-panel">
										<div class="panel panel-default">

											<div class="panel-heading" id="profile-heading-wrapper">
												<div id="profile-heading">
													<div id="profile-edit-wrapper">
														<div class="btn-group" id="edit-links">
															<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
																<span class="fa fa-pencil-square-o fa-2x"></span>
															</a><!--btn-primary-->
															<ul class="dropdown-menu">
																<li>
																	<div id="ep" onclick="HideAllShowOne('ep')">
																		<a class="lead" href="javascript:ReverseDisplay('edit-profile-page')">
																			<i class="fa fa-pencil fa-fw"></i>Edit
																		</a><!--/.lead-->
																	</div><!--/#ep-->
																</li><!---/li-->
																<li><a class="lead" href="#"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
															</ul><!--/.dropdown-menu-->
														</div><!--btn-group #edit-links-->
													</div><!--/.row #profile-edit-->
												</div><!--/panel-default #profile-heading-->
											</div><!--/.panel-heading id=#profile-heading-wrapper-->

											<div class="panel-body">
												<div id="panel-img-section">
													<img id="profile-image" alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="pull-left img-circle img-responsive "/>
													<p id="image-footer-username" name="image-footer-username">username</p>
												</div><!--/#panel-image-section-->

												<div id="about-user">
													<h3 class="profile-info-display" id="profile-about-me" name="profile-about-me" >About Me</h3>
													<p class="profile-info-display" id="profile-blurb" name="profile-blurb">Blurb</p>
													<h3 class="profile-info-display" id="profile-request-title" name="profile-request-title">Request Title</h3>
													<p class="profile-info-display" id="profile-details" name="profile-details">Details<br></p>
												</div><!--/#about-user-->
											</div><!--/panel-body-->

											<div id="message-wrapper">
												<div class="panel panel-default" id="message-header-wrapper">
													<div class="panel-heading" id="message-header">
														<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Message $user</button>
													</div><!--/.panel-heading-->

													<?php require_once("php/template/message-user-modal.php");?>

												</div><!--/.panel-default #message-header-wrapper-->
											</div><!--/.panel-group #message-wrapper-->
										</div><!--/.panel-default-->
									</div><!--panel-group #profile-panel-->

								</div>
							</div>
						</div><!-- #profile-page -->

						<!-- message page -->
						<div id="message-page">
							<div id="mailbox-wrapper" class="panel-group">
								msg page
							</div>
						</div>

						<!-- edit profile page -->
						<div id="edit-profile-page">
							<div id="edit-profile-wrapper">
								profile pg
							</div>
						</div>

						<!-- feed page -->
						<div id="feed" class="feed">
							feed pg
						</div>

						<!-- offer form modal -->
						<?php require_once("php/template/offer-modal.php"); ?>

					</div><!-- #main -->
				</div><!-- #main-content -->
			</div><!-- #main-content-wrapper -->

		</div><!-- .container -->
	</div><!-- .site-content -->

	<!-- footer -->
	<?php require_once("php/template/footer.php");?>
</body>
</html>