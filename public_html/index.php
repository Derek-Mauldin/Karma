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

		<div class="col-md-4 ">
			<?php require_once("php/template/side-panel.php"); ?>
		</div><!-- /#sidebar-wrapper -->

	<!--------------------------------------- main------------------------------------------------------->

			<div class="container">
				<div class="row">
					<div class="col-md-8 col-xs-12">

	<!-----------------------------------------home page-------------------------------------------------->

					<div class="container" id="home-page" style="display:none;">
						<h3><?php $date=new datetime("now");
							echo ($date->format("l F jS Y"));?>
						</h3>

						<div class="panel-group" id="deed-wrapper">
							<div class="panel panel-primary" id="message header-wrapper">
								<div class="panel-heading" id=message-header">
									<h4 class="panel-title">Today's Daily Deed</h4>
								</div><!--/.panel-heading-->

								<p>Pick a piece of trash up from the ground.</p>
							</div><!--/.panel-primary-->
							</div>
						</div>

	<!----------------------------------------profile page------------------------------------------------->

					<div class="container" id="profile-page" style="display:none;">
						<div class="row" >
							<div class="col-md-8" id=" panel-default">

	<!--------------------------------------profile edit links---------------------------------------------->

								<div class="container" id="panel-header">
									<div class="row" id="editing-links">
										<div class="btn-group open" id="edit-button">
											<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
												<span class="fa fa-pencil-square-o fa-2x pull-right"></span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
												<li><a href="#"><i class="fa fa-trash-o fa-fw"> </i> Delete</a></li>
											</ul><!--/.dropdown-menu-->
										</div><!--/#edit-button-->
									</div><!--/#editing-links-->
								</div><!--/#panel-header-->

								<div class="col-md-3 col-lg-3" id="panel-img-section">
									<img id="profile-image" alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="pull-left img-circle img-responsive ">
									<p class="text-center" id="image-footer">$username</p>
									<p class="text-center" id="image-footer">$location</p>

			<!------------in settings, can set skype to be revealed upon acceptance of offer------------------>

									<p class="text-center" id="image-footer"><i class="fa fa-skype fa-2x"></i></p>
								</div><!--/#panel-image-section-->

								<div class=" col-md-9 col-lg-9" id="about-user">
									<h3>About Me</h3>
									<p>Blurb</p>
									<h3>Request Title</h3>
									<p>Details<br></p>

		<!------------- message option is hidden when it is the user looking at their own profile-------------->

									<div class="panel-group" id="message-wrapper">

										<div class="panel panel-primary" id="message-header-wrapper">
											<div class="panel-heading" id="message-header">
												<h4 class="panel-title">Message $user</h4>
											</div><!--/.panel-heading-->

		<!---------------------------------------------message user ---------------------------------------------------->

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
										</div><!--/#message-header-->
									</div><!--/#message-wrapper-->
								</div><!--/#about-user-->
							</div><!--/#panel-defaul-->
						</div><!--/.row-->
					</div><!--/.container#profile-page-->
				</div><!--/.col-md-8 col-xs-12-->
			</div><!--/.row--->

	<!---------------------------------------------------message-page-------------------------------------------------->

			<div id="message-page" style="display:none;">

				<div class="panel-group" id="message-wrapper">

					<div class="panel panel-primary" id="message-header-wrapper">
						<div class="panel-heading" id="message-header">
							<h4 class="panel-title">Mailbox</h4>
						</div><!--/.panel-heading-->

						<div class=" panel panel-default">
							<div class="panel-heading" id="edit-buttons">
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-pencil" style="padding-right:4px;"></span>Compose</a>
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-inbox" style="padding-right:4px;"></span>Inbox</a>
								<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-send" style="padding-right:4px;"></span>Send</a>
							</div>

						<div class="panel panel-default">
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-xs-2 col-md-2">
												<img src="http://placehold.it/80" class="img-circle img-responsive" alt="profile-image"/>
											</div><!--/.col-xs-2 col-md-1-->

										<div class="col-xs-10 col-md-10">
											<div class="message-sender-details"><a href="#">Offer</a>
												<div class="mic-info">
													By: <a href="#">$user</a> on 12 Dec 2015
												</div><!--/.mic-info-->
											</div><!--/.message-sender-details-->

											<div class="message-body">
												I am taking algebra too and can tutor you this Friday or Saturday afternoon
											</div><!--/.message-body-->

											<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
											<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>

										</div><!--/.col-xs-10col-md-10-->
									</div><!--/.row-->
								</li><!--/.list-group-item-->

								<li class="list-group-item">
									<div class="row">
										<div class="col-xs-2 col-md-2">
											<img src="http://placehold.it/80" class="img-circle img-responsive" alt=""/>
										</div><!--/.col-xs-2 col-md-2-->

										<div class="col-xs-10 col-md-10">
											<div class="message-sender-details"><a href="#">Offer</a>
												<div class="mic-info">
													By: <a href="#">$user</a> on 11 Dec 2015
												</div><!--/#mic-info-->
											</div><!--/.message-sender-details-->

											<div class="message-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
												euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
											</div><!--/.message-body-->

											<a href="#" class="btn btn-sm btn-hover btn-primary"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
											<a href="#" class="btn btn-sm btn-hover btn-default"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>

										</div><!--/.col-xs-10 col-md-1m-->
									</div><!--/.row-->
								</li><!--/.list-group-item-->
							</ul><!--/.list-group-->
						</div><!--/.panel-body-->
					</div><!--/.panel-default-->
				</div><!--/.container-->
			</div>
				</div>
				</div>

	<!-------------------------------------------- feed page------------------------------------------------->

		<div id="feed-page" style="display:none;">
			<h2>Karma Feed</h2>

	<!-------------------------------------------feed panel------------------------------------------->

					<div class="listing clearfix panel panel-default">
						<div class="panel-heading">
							<h4 class="listing-title">
								<i class="fa fa-times pull-right"></i><span class="request">REQUEST</span>&nbsp;Soccer Coach
							</h4><!--/.listing-title-->
						</div><!--/.panel-heading-->

						<div class="panel-body">
							<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image" class="img-thumbnail pull-left"></a>
							<p class="text-justify">One of a group of parents forming a club soccer team for kids ages
								9-12.We would like a coach.The season begins in May and we would like to start practice
								ASAP. We will provide snacks for the team.</p>
							<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal" data-target="#offerModal">Make Offer</button>
						</div><!--/.panel-body-->
					</div><!--/.panel-default-->
				</div><!--/.feed-page-->

		<!------------------------------------------logout page---------------------------------------------------->
			<div id="logout-page" style="display:none;">
				<h2>You are now Logged Out</h2>
			</div><!--/#logout-page -->

	<!------------------------------------------offer form modal------------------------------------------------->

			<?php require_once("php/template/offer-modal.php"); ?>

			</div>
		</div>
	</div>
</div>

	<!----------------------------------------------footer-------------------------------------------------------->

			<footer>
				<?php require_once("php/template/footer.php"); ?>
			</footer>
		</body>
	</html>

