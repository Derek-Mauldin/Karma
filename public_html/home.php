<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>
<link rel="stylesheet" href="lib/css/styles.css">

<!---------------------------------------body-------------------------------------------------------->

<body class="site">
	<div class="site-content">

		<!------------------------------------ side panel --------------------------------------------------->

		<div class="col-md-4 " id="sidebar-wrapper">
			<h1><a class="sidebar-brand" href="home.php">Karmify</a></h1>

			<section id="menu" class="side-panel panel panel-default">

				<?php require_once("php/template/side-panel.php"); ?>
		</div><!-- /#sidebar-wrapper -->


		<!------------------------------------ main content --------------------------------------------------->

		<div class="container" id="main-content-wrapper">
			<div class="row" id="main-content">
				<div class="col-md-8 col-xs-12" id="main">


					<!-----------------------------------------home page-------------------------------------------------->

					<div class="container" id="home-page">

						<!-------------------------------------------date------------------------------------------------------->

						<div class="row" id= "date">
							<div class="col-md-8" id=" panel-default">
								<div class="panel panel-info" id="date-wrapper">
									<div class="panel-heading" id="date-header">
										<h4 class="date"><?php $date=new datetime("now");
											echo ($date->format("l F jS Y"));?>
										</h4><!--/.row #date-->

									</div><!--/.panel-heading #date-header-->
								</div><!--/panel-info #date-wrapper -->
							</div><!--/col-md-8 #panel-default-->
						</div><!--/row #date-->


					<!---------------------------------------home-page-content------------------------>
						<div class="row" id= "deed">

							<div class="col-md-8" id=" panel-default">

								<div class="panel panel-default" id="deed-wrapper">
									<div class="panel-heading" id="deed">
										<p class="lead">Daily Deed</p>
									</div><!--/.panel-heading #date-header-->

									<div class="panel-body">
										<h1 class="lead"><b>Learn someone's name.</b></h1><br>
										<p>.Brighten someone's day by showing you value them enough to remember
										their name.  +, It's an easy, great way to make a friend.</p>
										<p><a id="deed-names" href="http://www.forbes.com/sites/work-in-progress/2013/08/21/the-best-five-tricks-to-remember-names/">
											The 5 Best Tricks to Remember Names
											</a><!--/#deed-names-->
										</p>
										</div><!--/panel-default-->
									</div>
								</div>
							</div>


						<!-----suggested events-->
					<div class="row" id= "event">
						<div class="col-md-8" id=" panel-default">

							<div class="panel panel-default" id="local-event-wrapper">
								<div class="panel-heading" id="local-events">
									<p class="lead">Upcoming Event</p>
									</div>
									<div class="panel-body" id="local-events">
										<a target="self" href="http://albuquerque.eventful.com/events/magical-winter-ball-/E0-001-089154594-0">
											<img src="img/winterball.jpeg" alt="thumbnail image" class="img-thumbnail pull-right"></a>

										<h1 class="lead"><b>Magical Winter Ball</b></h1>
										<ul>
											<li><p><b>Date:</b>  Saturday, February 6, 2016</p></li>
											<li><p><b>Time:</b>  7:00 PM</p></li>
											<li><p><b>Benefiting: </b>  UNM Children's Hospital and 200 Boys & Girls Club kids</p></li>
											<li><p><b>Location: </b><a href="https://www.google.com/maps/place/330+Tijeras+Ave+NW,+Albuquerque,+NM+87102/@35.0862923,-106.6526038,17z/data=!3m1!4b1!4m2!3m1!1s0x87220cb8e491811b:0xcd114ef05251be5f">
														Downtown Albuquerque</a><br>
													330 Tijeras NW
													Albuquerque, New Mexico 87102
												</p></li>
											<li><p class="text-center"><a href="https://www.eventbrite.com/e/magical-winter-ball-tickets-19689374449?aff=ebapi"
														 class="btn btn-primary btn-lg active" role="button">Get Tickets</a></p></li>
										</ul>
								</div><!--/panel-info local-event-wrapper -->
						</div><!--/col-md-8 #panel-default-->
					</div><!--/row #date-->
				</div><!--/container #home-page-->
			</div>

				<!----------------------------------------profile page------------------------------------------------->

					<div class="container" id="profile-page" style="display:none;">
						<div class="row" id="profile-wrapper">
							<div class="col-md-8" id="profile">

								<!--------------------------------------profile panel-------------------------------------------------->

								<div class="panel-group" id="profile-panel">
									<div class="panel panel-default">

										<!--------------------------------------profile edit links---------------------------------------------->

										<div class="panel-heading" id="profile-heading-wrapper">
											<div class="container" id="profile-heading">
												<div class="row" id="profile-edit-wrapper">
													<div class="btn-group" id="edit-links">
														<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
															<span class="fa fa-pencil-square-o fa-2x pull-right"></span>
														</a><!--btn-primary-->
														<ul class="dropdown-menu">
															<li>
																<div id="ep" onclick="HideAllShowOne('ep')">
																	<a class="lead" href="javascript:ReverseDisplay('edit-profile-page')">
																		<i class="fa fa-pencil fa-fw"></i>Edit
																	</a><!--/.lead-->
																</div><!--/#ep-->
															</li><!---/li-->

															<li><a class="lead" href="#"><i class="fa fa-trash-o fa-fw"> </i> Delete</a></li>
														</ul><!--/.dropdown-menu-->
													</div><!--btn-group #edit-links-->
												</div><!--/.row #profile-edit-->
											</div><!--/panel-default #profile-heading-->
										</div><!--/.panel-heading id=#profile-heading-wrapper-->


										<!--------------------------------------profile image and footer------------------------------------------------>

										<div class="panel-body">
											<div class="col-md-3 col-lg-3" id="panel-img-section">
												<img id="profile-image" alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
													  class="pull-left img-circle img-responsive "/>
												<p class="text-center" id="image-footer-username" name="image-footer-username">username</p>
											</div><!--/#panel-image-section-->

											<!----------------------------------------------profile details------------------------------------------------>

											<div class=" col-md-9 col-lg-9" id="about-user">
												<h3 class="profile-info-display" id="profile-about-me" name=profile-about-me" >About Me</h3>
												<p class="profile-info-display" id="profile-blurb" name="profile-blurb">Blurb</p>
												<h3 class="profile-info-display" id="profile-request-title" name="profile-request-title">Request Title</h3>
												<p class="profile-info-display" id="profile-details" name="profile-details">Details<br></p>
											</div><!--/#about-user-->
										</div><!--/panel-body-->

										<!---------------------------------------------message user ---------------------------------------------------->

										<div class="panel-group" id="message-wrapper">
											<div class="panel panel-default" id="message-header-wrapper">
												<div class="panel-heading" id="message-header">
													<button type="button" class="hidden btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Message $user</button>
												</div><!--/.panel-heading-->
													<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#requestModal">Update Request</button>
											</div><!--/.panel-heading-->


												<!----------------------------------------message user profile modal----------------------------------------->

												<?php require_once ("message-user-modal.php");?>
											<?php require_once ("myModalRequest.php");?>

											<!---------------------------------------------/message user ---------------------------------------------------->

											</div><!--/.panel-default #message-header-wrapper-->
										</div><!--/.panel-group #message-wrapper-->
									</div><!--/.panel-default-->
								</div><!--panel-group #profile-panel-->
							</div><!--col-md-8 #profile-->
						</div><!--row #profile-page-->

					<!---------------------------------------------------mailbox-page-------------------------------------------------->

					<div id="message-page" >
						<div class="panel-group" id="mailbox-wrapper">

							<!--------------------------------------------------mailbox-header------------------------------------------------->

							<div class="panel panel-primary" id=mailbox-header-wrapper">
								<div class="panel-heading" id="mailbox-header">
									<h4 class="panel-title">Mailbox</h4>
								</div><!--/.panel-heading #mailbox-header-->

								<!----------------------------------------------mailbox buttons------------------------------------------------>

								<div class=" panel panel-default" id="mailbox-wrapper">
									<div class="panel-heading" id="buttons-wrapper">
										<a href="#compose-wrapper" id="compose-wrapper-link" class="btn btn-default" role="button"><span class="glyphicon glyphicon-pencil" style="padding-right:4px;"></span>Compose</a>
										<a href="#inbox-wrapper" id="inbox-wrapper-link" class="btn btn-default" role="button"><span class="glyphicon glyphicon-inbox" style="padding-right:4px;"></span>Inbox</a>
										<a href="#sent-wrapper" id="sent-wrapper-link" class="btn btn-default" role="button"><span class="glyphicon glyphicon-send" style="padding-right:4px;"></span>Sent</a>
									</div><!--/.panel-heading #button-wrapper-->

									<!----------------------------------------------mailbox------------------------------------------------------>

									<div class="panel panel-default" id="mailbox-body" >
										<div class="panel-body" id="mailbox ">

											<!------------------------------------------------inbox------------------------------------------------------>

											<ul class="list-group" id="inbox-wrapper">
												<li class="list-group-item" id="message-wrapper">
													<div class="row" id="message" >


												<li><!--/.list-group-item #message-wrapper-->

												<li class="list-group-item" id="message-wrapper">
													<div class="row" id="messsage"></div>

												</li><!--/.list-group-item #message-wrapper-->
											</ul><!--/.list-group #messages-->

											<!----------------------------------------compose form------------------------------------------------>

											<div class="col-xs-10 col-md-10" id="compose-wrapper" ">
											<div class="box box-primary">
												<div class="box-header with-border">
													<h3 class="box-title">Compose New Message</h3>
												</div><!-- /.box-header -->


													<!----------------------------------mailbox compose footer----------------------------------------------------------->
													<form method="get" action="../public_html/php/controllers/message-controller.php" id="karmaMessage" name="karmaMessage" class="form-horizontal col-xs-10 col-xs-offset-1">

														<div class="form-group">
															<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
															<label for="messageSender" class="control-label">Sender User Name</label>
															<!-- the div class="input-group" contains both the text field and the icon to the left -->
															<div class="input-group">
																<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
																<div class="input-group-addon">
																	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
																</div>
																<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
																<input type="text" class="form-control" id="messageSender" name="messageSender"  placeholder="User Name Here" maxlength="150" />
															</div>
														</div>

														<div class="form-group">
															<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
															<label for="messageReceiver" class="control-label">Receiver User Name</label>
															<!-- the div class="input-group" contains both the text field and the icon to the left -->
															<div class="input-group">
																<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
																<div class="input-group-addon">
																	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
																</div>
																<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
																<input type="text" class="form-control" id="messageReceiver" name="messageReceiver"  placeholder="User Name Here" maxlength="150" />
															</div>
														</div>

														<div class="form-group">
															<label class="control-label" for="txtareaComments">Whatcha Got!</label>
															<textarea class="form-control" rows="5" id="kMessage"  name="kMessage" placeholder="500 characters max."></textarea>
														</div>

														<div class="form-group">
															<!-- the following <a> tag has been styled as a button with class="btn" -->
															<a id="reset-form" class="btn" role="button">Reset Form</a>
															<button type="submit" id="messageSubmit" name="messageSubmit" class="btn">Submit</button>
														</div>
														<div class="box-footer">
															<div class="pull-right">
																<button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
															</div><!--/pull-right-->

															<button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
														<div id="mError" name="mError"></div>
													</form>


												</div><!-- /.box-footer -->
											</div><!-- /. box -->
										</div><!-- /.col -->

										<!----------------------------------sent mail----------------------------------------------------------->

										<div class="sent-wrapper" id="sent-wrapper">
											<div class="sent">
												<div class="col-md-10">

													<!----------------------------------------------sent header-------------------------------------------->

													<div class="box box-primary">
														<div class="box-header with-border">
															<h3 class="box-title">Sent </h3>
															<div class="box-tools pull-right">
																<div class="has-feedback">
																	<input type="text" class="form-control input-sm" placeholder="Search Mail">
																	<span class="glyphicon glyphicon-search form-control-feedback"></span>
																</div><!--/has-feeedback-->
															</div><!-- /.box-tools -->
														</div><!-- /.box-header -->

														<!-----------------------------------------------sent controls------------------------------------------->

														<div class="box-body no-padding">
															<div class="mailbox-controls">
																<!-- Check all button -->
																<button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
																<div class="btn-group">
																	<button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
																	<button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
																	<button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
																</div><!-- /.btn-group -->
																<button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
																1-3/1
																<div class="btn-group">
																	<button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
																	<button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
																</div><!-- /.btn-group -->
															</div><!-- /.pull-right -->
														</div><!--/mailbox-controls-->

														<!---------------------------------------------------sent messages------------------------------------->

														<div class="table-responsive mailbox-messages">
															<table class="table table-hover table-striped">
																<tbody>
																	<div id="messageSent" name="messageSent"></div>
																</tbody>
															</table><!-- /.table -->
														</div><!-- /.mail-box-messages -->
													</div><!-- /.box-body -->

													<!---------------------------------------------mailbox-footer--------------------------------------->

													<div class="box-footer no-padding">
														<div class="mailbox-controls">
															<!-- Check all button -->
															<button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
															<div class="btn-group">
																<button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
																<button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
																<button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
															</div><!-- /.btn-group -->
															<button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
															<div class="pull-right">
																1-3/1
																<div class="btn-group">
																	<button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
																	<button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>

																</div><!-- /.btn-group -->
															</div><!-- /.pull-right -->
														</div><!--/mailbox-controls-->
													</div><!--/box-footer-->
												</div><!-- /. box -->
											</div><!-- /.sent -->
										</div><!-- / #sent-wrapper -->
									</div><!-- /.mailbox-->
								</div><!-- /.mailbox-body -->
							</div><!--/.panel-body #mailbox-wrapper-->
						</div><!--/.panel-default #mailbox-body-->
					</div><!--/.mailbox-->
				</div><!--/.panel-primary #mailbox-header-wrapper-->

				<!-------------------------------------------edit-profile-page------------------------------------------->

				<div class=edit-profile-page" id="edit-profile-page" style="display:none;">
					<div class="row" id="edit-profile-wrapper">

							<!-----------------------------------------edit profile/settings links----------------------------------->

							<div class="panel panel-edit">
								<div class="panel-heading">
									<div class="row" id="forms-options">

										<!--------------------------------------------edit-profile-link------------------------------------------------->

										<div class="col-xs-6" id="profile-link">
											<a href="#profile-form" class="active" id="profile-form-link">Profile</a>
										</div><!--/col-md-6-->

										<!------------------------------------------edit-settings-link-------------------------------------------------->

										<div class="col-xs-6" id="settings-link-wrapper">
											<a href="#edit-settings" id="edit-settings-link">Settings</a>
										</div><!--col-md-6 #settings-link-wrapper-->
									</div><!--/row #forms-options-->
									<hr>
								</div><!--/#panel-heading-->

								<!---------------------------------------------edit user form wrapper--------------------------------->

								<div class="overall-form-wrapper">
									<form id="edit-user-form" name="edit-user-form" action="php/controllers/edit-profile-controller.php" method="post" role="form" ">

									<!-------------------------------------------------edit-profile-------------------------------------------->

									<div class="row" id="profile-form">
										<div class="col-lg-12" id="profile-form">

											<!-------------------------------------------center avatar-------------------------------------------------------->

											<div class="col-sm-4 col-md-4" id="avatar-input">
												<div class="text-center" id="avatar-input">
													<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
													<h6>Upload a different photo...</h6>
													<input type="file" class="form-control">
												</div><!--/#avatar-input-->
											</div><!--/avatar-input-->
											<br>

											<!-------------------------------------------blurb------------------------------------------------------>

											<div class="form-group" id="blurb-input">
												<input type="text" name="blurb" id="blurb" tabindex="1" class="form-control"
														 placeholder="About Me" value="">
											</div><!--/.form-group #blurb-input-->

											<div class="form-group" id="edit-buttons-wrapper">
												<div class="row" id="edit-buttons">
													<div class="col-md-6 col-md-offset-2" id="buttons">
														<button type="submit" id="submit-profile" name="submit-profile" class="btn btn-default btn-md col-5">Reset</button>
														<button type="submit" class="btn btn-default btn-md col-md-5">Submit</button>

													</div><!--col-md-6 col-md-offset-2 #buttons-->
												</div><!--/row #edit-buttons-->
											</div><!--/form-group #edit-buttons-wrapper-->
										</div><!--/#edit-profile-links-->
									</div><!--/.edit-profile-wrapper-->

									<!--------------------------------------------------edit-settings--------------------------------------------------->

									<div id="edit-settings" style="display: none;">
										<!--<form name="edit-user-form" action="../controllers/edit-profile-controller.php" method="post" role="form" style="display: block;">-->
										<div class="form-group">
											<input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="First Name" value="">
										</div><!--/.form-group-->

										<div class="form-group">
											<input type="text" name="lastName" id="lastName" tabindex="2" class="form-control" placeholder="Last Name" value="">
										</div><!--/.form-group-->

										<div class="form-group">
											<input type="text" name="userName" id="userName" tabindex="3" class="form-control" placeholder="Edit User Name" value="">
										</div><!--/.form-group-->

										<div class="form-group">
											<input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="Edit Email Address" value="">
										</div><!--/.form-group-->

										<hr>

										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Enter Current Password" , value="">
										</div><!--/.form-group-->

										<div class="form-group">
											<input type="password" name="newPassword" id="newPassword" tabindex="5" class="form-control" placeholder="New Password" , value="">
										</div><!--/.form-group-->

										<div class="form-group">
											<input type="password" name="confirmPassword" id="confirmPassword" tabindex="6"
													 class="form-control" placeholder="Confirm New Password" value="">
										</div><!--/.form-group-->

										<div class="edit-buttons-wrapper">
											<div class="row" id="edit-buttons">
												<div class="col-md-6 col-md-offset-2" id="edit-buttons-inner">
													<button id="submit-profile" name="submit-profile" type="submit" class="btn btn-default btn-md col-md-5">Reset
													</button>
													<button type="submit" class="btn btn-default btn-md col-md-5">Submit</button>

												</div><!--/.panel-edit-->
											</div><!--/#edit-content-->
										</div><!--/.edit-content-main-->
									</div><!--/#edit-settings-->
									</form>
								</div><!--/overall-form-wrapper-->
								<div id="editUserError" name="editUserError"></div>
							</div><!--/.panel-edit-->
						</div><!--.edit-profile-->
					</div><!--/.edit-profile-wrapper--->
				</div><!--/edit-profile-page-->

				<!-------------------------------------------- feed page------------------------------------------------->

				<div class="feed" id="feed-page" >
					<div class="container">
						<div class="row">

							<!--------------------------------------------search------------------------------------------------->

							<div id="custom-search-input">
								<div class="input-group col-md-8">
									<input type="text" class="  search-query form-control" placeholder="Search"/>
							<span class="input-group-btn">
								<button class="btn btn-danger" type="button">
									<span class=" glyphicon glyphicon-search"></span>
								</button><!--/btn-danger-->
                      </span><!--/input-group-btn-->
								</div><!--/input-group-->
							</div><!--/custom-search-input-->
						</div><!--/row-->
					</div><!--/container-->

					<!---------------------------------------title------------------------------------------------->

					<h2>Karma Feed</h2>

					<!-------------------------------------------feed panel-------------------------------------------------->

						<div class="infinite-scroll">

							<?php require_once "php/controllers/need-scroller-controller.php" ?>

							<div class="listing-clearfix panel panel-default" id="panel-wrapper">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

								<div class="panel-heading">

									<h4 class="listing-title">
										<span class="request">REQUEST</span>&nbsp;Soccer Coach
									</h4><!--/.listing-title-->
								</div><!--/.panel-heading-->

								<div class="panel-body">
									<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image" class="img-thumbnail pull-left"></a>
									<p class="text-justify">One of a group of parents forming a club soccer team for kids ages
										9-12.We would like a coach.The season begins in May and we would like to start practice
										ASAP. We will provide snacks for the team.</p>
									<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#offerModal">Make Offer</button>

								</div><!--/panel-body-->
							</div><!--/.panel-wrapper-->
						</div><!--/.feed-page-->


					<!------------------------------------------logout page------------------------------------------------------>


					<div id="logout-page">
						<h2>You are now Logged Out</h2>
					</div><!--/#logout-page-->

					<!------------------------------------------offer form modal--------------------------------------------------->

					<?php require_once("offer-modal.php"); ?>

					<!--------------------------------------request modal------------------>

					<?php require_once("myModalRequest.php"); ?>


					<!----------------------------------/main-content--------------------------------------------------->


				</div><!--container ##main-content-wrapper-->
			</div><!--/.row #main-content-->
		</div>
	</div><!--/.main-content-wrapper-->
	</div><!--/.site-content-->

	<!----------------------------------------------footer-------------------------------------------------------->


		<?php require_once("php/template/footer.php"); ?>


</body><!--/.site-->

</html>

