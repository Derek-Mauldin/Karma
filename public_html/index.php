<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>
<div class="site">

	<div class="container">
		<div class="row">

			<!-- side panel -->
			<div class="col-md-4 hidden-xs hidden-sm">
				<?php require_once("php/template/side-panel.php"); ?>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- main page content -->
			<div class="site-content">
				<div class="col-md-8 col-xs-12">


					<!--Home Page-->
					<div id="home-page" style="display:none;">
						<h1>home page content</h1>

						<p>recent info</p>
					</div><!--/#home-page>

					<!---Profile Page------>
					<div class="container"id="profile-page" style="display:none;">
						<div class="row">
							<div class="container">
								<div class="row">

									<div class="col-md-6">
										<h4 class="listing-title">
											<i class="fa fa-pencil-square-o pull-right"></i>
										</div>
									</div>


									<div class="row">
										<div class="col-md-3 col-lg-3">
											<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="pull-left img-circle img-responsive ">
												<p class="text-center">$username</p>
												<p class="text-center">$location</p>
										</div>

										<div class=" col-md-6 col-lg-6 ">
											<h3>About Me</h3>
											<p>Blurb</p>
											<h3>Request Title</h3>
											<p>Details<br></p>
											<h4>Message $user</h4>

										<!-- message option is hidden when it is the user looking at their own profile-->
										<form accept-charset="UTF-8" action="" method="POST">
											<div class=" col-md-6 col-lg-6 ">
												<div class="form-input">
												<p>Does this message include an offer?
												<label class="radio-inline"><input type="radio" name="optradio">yes</label>
												<label class="radio-inline"><input type="radio" name="optradio">no</label>
												</p>

												<textarea class="span4" id="new_message" name="new_message"
															 placeholder="Hi $receiver!<?= "\n \n" ?>Change Text Here  <?= "\n \n" ?> From $sender"
															 rows="5"></textarea>
												<button class="btn btn-info" type="submit">Send Message</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--/#profile-page-


				<!--Message Page-->
					<div id="message-page" style="display:none;">
						<h1>Message Box</h1>

						<p>2nd line shows</p>
					</div><!--/#message-page-->


					<!-- Feed Page-->
					<div id="feed-page" style="display:none;">
						<h2>Karma Feed</h2>


						<div class="feed-wrapper">
							<div id="karma-feed" class="karma-feed">

								<!-- start listing here -->
								<div class="listing clearfix panel panel-default">
									<div class="panel-heading">
										<h4 class="listing-title">
											<i class="fa fa-times pull-right"></i><span class="request">REQUEST</span>&nbsp;Soccer
											Coach
										</h4>
									</div>
									<div class="panel-body">
										<a href="#"><img src="http://placehold.it/60x60" alt="thumbnail image"
															  class="img-thumbnail pull-left"></a>

										<p class="text-justify">One of a group of parents forming a club soccer team for kids ages
											9-12.We would like a coach.The season begins in May and we would like to start practice
											ASAP. We will provide snacks for the team.</p>
										<button class="btn btn-primary btn-md pull-right" type="button" data-toggle="modal"
												  data-target="#offerModal">Make Offer
										</button>
									</div>
								</div>
							</div>
							<!-- end listing -->
						</div>
						<!-- #karma-feed -->
					</div>
					<!-- .feed-wrapper-->
				</div>
				<!--#feed-->
			</div>
			<!-- end main page content -->
		</div>
		<!-- .row -->
	</div>
	<!-- .container -->

	<!--Another comment-->

	<!-- Offer Form Modal --> 
	<?php require_once("php/template/offer-modal.php"); ?>

</div><!--.sfooter-contenr-->
</div>
<footer>
	<?php require_once("php/template/footer.php"); ?>
</footer>
</body>
</html>
