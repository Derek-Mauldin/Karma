<?php

/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Welcome to Karma";

/*load head-utils.php*/
require_once("../../php/template/head-utils.php");
?>

<!---------------------------------------body-------------------------------------------------------->

<body class="site">
	<div class="site-content">

		<!------------------------------------ side panel --------------------------------------------------->

		<div class="col-md-4 " id="sidebar-wrapper">
			<h1><a class="sidebar-brand" href="../../home.php">Karmify</a></h1>

			<section id="menu" class="side-panel panel panel-default">

				<?php require_once("../../php/template/side-panel.php"); ?>
		</div><!-- /#sidebar-wrapper -->


		<!------------------------------------ main content --------------------------------------------------->

		<div class="container" id="recover-wrapper">
			<div class="row">
				<div class="col-md-8 col-xs-12" id="recover">

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



<?php require_once("../../php/template/footer.php");?>
	</body>
</html>

