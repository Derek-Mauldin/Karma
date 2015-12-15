<?php


/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

  <!---------------------------------------body-------------------------------------------------------->

	<body class="site">
		<div class="site-content">

	<!------------------------------------ side panel --------------------------------------------------->

		<div class="col-md-4 " id="sidebar-wrapper">
			<section id="menu" class="side-panel panel panel-default">
				<a class="sidebar-brand" href="#"><img id="logo" src="img/robot.png"/></a>

			<?php require_once("php/template/side-panel.php"); ?>
		</div><!-- /#sidebar-wrapper -->


	<!------------------------------------ main content --------------------------------------------------->

			<div class="container" id="main-content-wrapper">
				<div class="row" id="main-content">
					<div class="col-md-8 col-xs-12" id="main">


	<!-----------------------------------------home page-------------------------------------------------->

						<div class="container" id="home-page" style="display:none;">

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
						</div><!--/container #home-page-->

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
														</a>
														<ul class="dropdown-menu">
															<li><div id="ep" onclick="HideAllShowOne('ep')">
																	<a class="lead" href="javascript:ReverseDisplay('edit-profile-page')">
																		<i class="fa fa-pencil fa-fw"></i>Edit
																	</a>
																</div>
															</li>

															<li><a href="#"><i class="fa fa-trash-o fa-fw"> </i> Delete</a></li>
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
												<p class="text-center" id="image-footer">$username</p>
												<p class="text-center" id="image-footer">$location</p>
										</div><!--/#panel-image-section-->

	<!----------------------------------------------profile details------------------------------------------------>

										<div class=" col-md-9 col-lg-9" id="about-user">
											<h3>About Me</h3>
											<p>Blurb</p>
											<h3>Request Title</h3>
											<p>Details<br></p>
										</div><!--/#about-user-->
									</div>

	<!---------------------------------------------message user ---------------------------------------------------->

									<div class="panel-group" id="message-wrapper">
										<div class="panel panel-default" id="message-header-wrapper">
											<div class="panel-heading" id="message-header">
												<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Message $user</button>											</div><!--/.panel-heading-->


	<!----------------------------------------message user profile modal----------------------------------------->

											<?php require_once ("php/template/message-user-modal.php");?>


		<!---------------------------------------------/message user ---------------------------------------------------->

						</div><!--/.panel-default #message-header-wrapper-->
					</div><!--/.panel-group #message-wrapper-->
				</div><!--/.panel-default-->
			</div><!--panel-group #profile-panel-->
		</div><!--col-md-8 #profile-->
	</div><!--row #profile-wrapper-->
</div><!--/container #profile-page-->

	<!---------------------------------------------------mailbox-page-------------------------------------------------->

			<div id="message-page" style="display:none;">
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

											<div class="col-xs-2 col-md-2" id="profile-image">
												<img src="http://placehold.it/80" class="img-circle img-responsive" alt="profile-image"/>
											</div><!--/.col-xs-2 col-md-2 #profile-image-->

											<div class="col-xs-10 col-md-10" id="message-body">

											<div class="message-header"><a href="#">Offer</a>
												<div class="mic-info">
													By: <a href="#">$user</a> on 12 Dec 2015
												</div><!--/.mic-info-->
											</div><!--/.message-header-->

											<div class="message-body">
												I am taking algebra too and can tutor you this Friday or Saturday afternoon
											</div><!--/.message-body-->

											<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
											<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>

										</div><!--/.col-xs-10 col-md-10 #message-body-->
									</div><!--/.row #message-->
								</li><!--/.list-group-item #message-wrapper-->

								<li class="list-group-item" id="message-wrapper">
									<div class="row" id="messsage">

										<div class="col-xs-2 col-md-2" id="profile-image">
											<img src="http://placehold.it/80" class="img-circle img-responsive" alt=""/>
										</div><!--/.col-xs-2 col-md-2 #profile-image-->

										<div class="col-xs-10 col-md-10" id="message-body">

											<div class="message-sender-details"><a href="#">Offer</a>
												<div class="mic-info">
													By: <a href="#">$user</a> on 11 Dec 2015
												</div><!--/#mic-info-->
											</div><!--/.message-header-->

											<div class="message-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
												euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
											</div><!--/.message-body-->

											<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
											<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>

										</div><!--/.col-xs-10 col-md-2 #message-body-->
									</div><!--/.row #message-->
								</li><!--/.list-group-item #message-wrapper-->
							</ul><!--/.list-group #messages-->

		<!----------------------------------------compose form------------------------------------------------>

								<div class="col-xs-10 col-md-10" id="compose-wrapper"  style="display:none;">
									<div class="box box-primary">
										<div class="box-header with-border">
											<h3 class="box-title">Compose New Message</h3>
										</div><!-- /.box-header -->

										<div class="box-body">
											<div class="form-group">
												<input class="form-control" placeholder="To:">
										</div><!--/form-group-->

										<div class="form-group">
											<input class="form-control" placeholder="Subject:">
										</div><!--/form-group-->

										<div class="form-group">
                    					<textarea id="compose-textarea" class="form-control" style="height: 150px"></textarea>
										</div><!--/form-group-->

										<div class="form-group">
											<div class="btn btn-default btn-file">
												<i class="fa fa-paperclip"></i> Attachment
												<input type="file" name="attachment">
											</div><!--/btn-default-->
											<p class="help-block">Max. 32MB</p>
										</div><!--/form-group-->
									</div><!-- /.box-body-->

	<!----------------------------------mailbox compose footer----------------------------------------------------------->

										<div class="box-footer">
										<div class="pull-right">
											<button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
											<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
										</div><!--/pull-right-->

										<button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
									</div><!-- /.box-footer -->
								</div><!-- /. box -->
							</div><!-- /.col -->

	<!----------------------------------sent mail----------------------------------------------------------->

				<div class="sent-wrapper" id="sent-wrapper" style="display:none";>
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
														<tr>
															<td><input type="checkbox"></td>
															<td class="mailbox-name"><a href="read-mail.html">Evan Smith</a></td>
															<td class="mailbox-subject"><b>Offer Accepted</b>Hi! Yes, let's arrange a skype</td>
															<td class="mailbox-attachment"></td>
															<td class="mailbox-date">5 mins ago</td>
														</tr>
														<tr>
															<td><input type="checkbox"></td>
															<td class="mailbox-name"><a href="read-mail.html">Gerald Fongwe</a></td>
															<td class="mailbox-subject"><b>Offer Accepted</b> - Definitely!...</td>
															<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
															<td class="mailbox-date">28 mins ago</td>
														</tr>
														<tr>
															<td><input type="checkbox"></td>
															<td class="mailbox-name"><a href="read-mail.html">Derek Mauldin</a></td>
															<td class="mailbox-subject"><b>Offer Made</b> I would love to help out..</td>
															<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
															<td class="mailbox-date">11 hours ago</td>
														</tr>
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
				<div class="col-md-6 col-md-offset-3">

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
								<form id="edit-user-form" name="edit-user-form" action="php/controllers/edit-profile-controller.php" method="post" role="form" style="display: block;">

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
				</div><!--.edit-profile-wrapper-->
			</div><!--/.profile-form--->
		</div><!--/edit-profile-page-->

	<!-------------------------------------------- feed page------------------------------------------------->

		<div class="feed" id="feed-page" style="display:none;">

			<div class="container">
				<div class="row">

					<div id="custom-search-input">
						<div class="input-group col-md-8">
							<input type="text" class="  search-query form-control" placeholder="Search"/>
							<span class="input-group-btn">
								<button class="btn btn-danger" type="button">
									<span class=" glyphicon glyphicon-search"></span>
								</button>
                      </span>
						</div>
					</div>
				</div>
			</div>
			<h2>Karma Feed</h2>

	<!-------------------------------------------feed panel-------------------------------------------------->
			<div class="infinite-scroll">

				<?php require_once "php/controllers/need-scroller-controller.php" ?>

					<div class="listing-clearfix panel panel-default" id="panel-wrapper">
							<h4><span id='close'>x</span></h4>

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


					<div id="logout-page" style="display:none;">
						<h2>You are now Logged Out</h2>
					</div><!--/#logout-page-->

	<!------------------------------------------offer form modal--------------------------------------------------->

						<?php require_once("php/template/offer-modal.php"); ?>


			<!----------------------------------/main-content--------------------------------------------------->


					</div><!--container ##main-content-wrapper-->
				</div><!--/.row #main-content-->
			</div>
		</div><!--/.main-content-wrapper-->
	</div><!--/.site-content-->

	<!----------------------------------------------footer-------------------------------------------------------->

		<footer>
			<?php require_once("php/template/footer.php"); ?>
		</footer>

	</body><!--/.site-->
</html>

