<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("php/template/head-utils.php");
?>

<div class="sfooter-content">

	<div class="container">
		<div class="row">

			<!-- side panel -->
			<div class="col-md-4 hidden-xs hidden-sm">
				<?php require_once("php/template/side-panel.php");?>
			</div><!-- /#sidebar-wrapper -->

			<!-- main page content -->
			<div class="col-md-8 col-xs-12">

				<!---Profile Page------>
				<div id="profile-page" style="display:none;">
					<p>Profile Content</p>
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
						<button type="submit" id="form-submit"  class="btn btn-success btn-lg"> Offer </button>
						<button type="button" class="btn btn-default btn-lg"  data-dismiss="modal" aria-hidden="true"> Cancel</button>
						 <div id="msgSubmit" class="h3 text-center hidden"></div> 
					</form> 
				</div>
			</div>
		</div>
		 </div>

</div><!--.sfooter-contenr-->

<footer class="footer navbar-fixed-bottom">
	<?php require_once("php/template/footer.php"); ?>
</footer>
</body>
</html>

