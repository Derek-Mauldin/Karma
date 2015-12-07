<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>
<div class="wrapper">

	<!--------------------------------------- side panel--------------------------------------------------->
	<div class="container">
		<div class="row">

			<div class="col-md-4 hidden-xs hidden-sm">
				<?php require_once("php/template/side-panel.php"); ?>
			</div><!-- /#sidebar-wrapper -->

			<!----------------------------------------- main------------------------------------------------------->
			<div class="site-content">
				<div class="col-md-8 col-xs-12">

			<!-----------------------------------------home page---------------------------------------------------->

					<div class="container" id="home-page-wrapper" style="display:none;">
						<h2>dashboard</h2>
						<h2>home page content</h2>
						<p>recent info</p>
					</div><!--/#home-page-->

					<!-----------------------------------------profile page-------------------------------------------------->

					<div class="container" id="profile-page-wrapper" style="display:none;">
						<div class="row" id="profile-page" >
							<div class="col-md-8" id=" panel-default">

					<!---------------------------------------profile edit links----------------------------------------------->

								<div class="container" id="panel-header">
									<div class="row" id="editing-links">
										<div class="btn-group open" id="edit-button"><a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-pencil-square-o fa-2x pull-right"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
												<li><a href="#"><i class="fa fa-trash-o fa-fw"> </i> Delete</a></li>
											</ul><!--/.dropdown-menu-->
										</div><!--/#edit-button-->
									</div><!--/#editing-links-->
								</div><!--/#panel-header-->

								<div class="col-md-3 col-lg-3" id="panel-img-section"><img id="profile-image" alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="pull-left img-circle img-responsive ">
									<p class="text-center" id="image-footer">$username</p>
									<p class="text-center" id="image-footer">$location</p>
								</div><!--/#panel-image-section-->

								<div class=" col-md-9 col-lg-9" id="about-user">
									<h3>About Me</h3>
									<p>Blurb</p>
									<h3>Request Title</h3>
									<p>Details<br></p>

									<!---------------- message option is hidden when it is the user looking at their own profile------------------->

									<div class="panel-group" id="message-wrapper">
										<div class="panel panel-primary" id="message-header-wrapper">
											<div class="panel-heading" id="message-header">
												<h4 class="panel-title">Message $user</h4>
											</div><!--/.panel-heading #message-header-->

											<!---------------------------------------------profile message box ---------------------------------------------------->

											<form accept-charset="UTF-8" action="" method="POST">
												<div class="panel panel-default" id="message-content-wrapper">
													<div class="panel-heading" id="message-content">
														<p class="panel-title">Does this message include an offer?
															<label class="radio-inline"><input type="radio" name="optradio">yes</label>
															<label class="radio-inline"><input type="radio" name="optradio">no</label>
														</p><!--/.panel-title-->
													</div><!--.panel-heading #message-content-->

													<div class="panel panel-default">
														<div class="panel-body">
									<textarea class="col-md-12 formcontrol counted"  id="new_message" name="new_message" rows="5" placeholder=
									"Hi $receiver!<?= "\n \n" ?> Change Text Here  <?= "\n \n" ?> From $sender" >
									</textarea>
														</div>

														<button class="btn btn-info" type="submit">Send Message</button>

											</form><!--/form-->
										</div><!--/#message-header-wrapper-->
									</div><!--/#message-header-->
								</div><!--/#about-user-->
							</div><!--/#panel-default-->
						</div><!--/#profile-page-->
					</div><!--/#profile-page-wrapper-->

					<!-----------------------------------------------message-page-wrapper------------------------------------------------->

					<div class="container" id="message-page-wrapper" style="display:none;">
						<h1>Message Box</h1>

						<div class="container" id="message-box-wrapper">

							<div class="row" id="message-edit-wrapper">
								<div class="col-md-8" id="message-edit-buttons"
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-pencil" style="padding-right:4px;"></span>Compose</a>
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-inbox" style="padding-right:4px;"></span>Inbox</a>
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-send" style="padding-right:4px;"></span>Send</a>
							</div><!--/message-edit-wrapper-->

							<div class="panel panel-default widget">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-comment"></span>
									<h3 class="panel-title">Messages</h3>
								</div><!--/panel-heading-->

								<div class="panel-body">
									<ul class="list-group">

										<li class="list-group-item">
											<div class="row" id="list-group-item">
												<div class="col-xs-2 col-md-1">
													<img src="http://placehold.it/80" class="img-circle img-responsive" alt="profile-image"/></div>
												<div class="col-xs-10 col-md-10">
													<div><a href="#">Offer</a>
														<div class="mic-info">
															By: <a href="#">$user</a> on 12 Dec 2015
														</div>
													</div>

													<div class="comment-text">
														I am taking algebra too and can tutor you this Friday or Saturday afternoon
													</div>

													<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
													<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
												</div<!--list-group-item-->
										</li><!--list-group-item-->

										<li class="list-group-item">
											<div class="row" id="list-group-item">
												<div class="col-xs-2 col-md-1">
													<img src="http://placehold.it/80" class="img-circle img-responsive" alt=""/></div>
												<div class="col-xs-10 col-md-10" id="offer-label">
													<div>
														<a href="#">Offer</a>
														<div class="mic-info">
															By: <a href="#">$user</a> on 11 Dec 2015
														</div>
													</div>
													<div class="comment-text">
														Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
														euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
													</div>
													<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
													<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
												</div><!--/offer-label-->
											</div><!--list-group-item-->
										</li><!--list-group-item-->
									</ul><!--list-group-->
								</div><!--/panel-body-->
							</div><!--/panel-->
						</div><!--message-box-wrapper-->
					</div><!--message-page-wrapper-->

					<!--------------------------------------------------- feed page------------------------------------------------->

					<div id="feed-page-wrapper" style="display:none;">
						<h2>Karma Feed</h2>

						<div class="feed-wrapper">
							<div id="karma-feed" class="karma-feed">

								<!-- start listing here -->
								<div class="listing clearfix panel panel-default">
									<div class="panel-heading">
										<h4 class="listing-title">
											<i class="fa fa-times pull-right"></i><span class="request">REQUEST</span>&nbsp;Soccer Coach
										</h4><!--/listing-title-->
									</div><!--/panel-heading-->

									<div class="panel-body">
										<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image" class="img-thumbnail pull-left"></a>
										<p class="text-justify">One of a group of parents forming a club soccer team for kids ages
											9-12.We would like a coach.The season begins in May and we would like to start practice
											ASAP. We will provide snacks for the team.
										</p>
										<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#offerModal">Make Offer</button>
									</div><!--/panel-body-->
								</div><!--/panel-default-->
							</div><!--/karma-feed-->
						</div><!--/feed-wrapper-->
					</div><!--/feed-page-wrapper-->
				</div><!--/main-->

				<!------------------------------------------logout page---------------------------------------------------->

				<div id="logout-page-wrapper" style="display:none;">
					<h2>You are now Logged Out</h2>
				</div><!--/#logout-page-wrapper-->

			</div><!--/#main-content-->

			<!------------------------------------------offer form modal------------------------------------------------->?

			<?php require_once("php/template/offer-modal.php"); ?>

			<!----------------------------------------------footer-------------------------------------------------------->

			<footer>
				<?php require_once("php/template/footer.php"); ?>
			</footer>

		</div><!--/#body-content-->

