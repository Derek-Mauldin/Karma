<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("../../php/template/head-utils.php");
?>
<div class="wrapper">

	<div class="container">
		<div class="row">

			<!-- side panel -->
			<div class="col-md-4 hidden-xs hidden-sm">
				<?php require_once("../../php/template/side-panel.php"); ?>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- main page content -->
			<div class="site-content">
				<div class="col-md-8 col-xs-12">


					<!--Home Page-->
					<div id="home-page" style="display:none;">
						<h2>dashboard</h2>
						<h2>home page content</h2>

						<p>recent info</p>
					</div><!--/#home-page>

					<!---Profile Page------>
					<div class="container"id="profile-page" style="display:none;">
						<div class="row">
							<div class="container">
								<div class="row">

									<div class="btn-group open">

											<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
												<span class="fa fa-pencil-square-o fa-2x pull-right"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
												<li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
												<li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>
												<li class="divider"></li>
												<li><a href="#"><i class="i"></i> Make admin</a></li>
											</ul>
									</div>


-
