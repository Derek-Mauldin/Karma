<!--modal-->
<div class="modal fade" id="contactUsModal">
	<div class="modal-dialog">

		<!--modal content-->
		<div class="modal-content">
			<div class="modal-header">

				<!--modal button-->
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Contact Us</h4>
			</div><!--/modal-content-->

			<!--modal-body-->
			<div class="modal-body">
				<form role="form" id="contactUsModal" data-toggle="validator" class="shake"> 

					<form method="get" action="php/controllers/message-controller.php" id="contact-us" name="contact-us" class="form-horizontal col-xs-10 col-xs-offset-1">
					<div class="form-group">

						<!--fields-->
						<label for="contactUsName" class="control-label">Name</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</div>
							<input type="text" class="form-control" id="contactUsName" name="contactUsName"  placeholder="Your name here." maxlength="150" />
						</div>
					</div>

					<div class="form-group">
						<label for="contactUsEmail" class="control-label">Email</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							</div>
							<input type="email" id="contactUsEmail" name="contactUsEmail" class="form-control" maxlength="150" placeholder="your.email@something.com"/>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label" for="txtareaComments">What's your beef!</label>
						<textarea class="form-control" rows="5" id="txtareaComments" maxlength="500" placeholder="500 characters max."></textarea>
					</div>

					<div class="form-group">
						<a id="reset-form" class="btn" role="button">Reset Form</a>
						<button type="submit" class="btn">Submit</button>
					</div>
				</form>
			</div> <!-- CLOSE FORM WRAP -->