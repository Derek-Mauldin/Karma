<!--Modal-->

<div class="modal fade" id="requestModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">

		<!--modal-content-->
		<div class="modal-content">
			<div class="modal-header">

				<!--modal-button-->
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span hidden="true">&times;</span></button>
					<h1>Request</h1>
			</div><!--/modal-header-->

			<!--modal-body-->
			<div class="modal-body">

	<!--form-->
				<form role="form" id="contactUsModal" data-toggle="validator" class="shake"> 
					<form method="get" action="php/controllers/message-controller.php" id="contact-us" name="contact-us" class="form-horizontal col-xs-10 col-xs-offset-1">


	<!--fields-->

		<div class="form-group">
			<label for="messageSender" class="control-label">Username</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</div>
				<input type="text" class="form-control" id="username" name="username"  placeholder="User Name Here"/>
			</div>
		</div>

		<div class="form-group">
			<label for="messageReceiver" class="control-label">Need Title</label>
			<div class="input-group">
				<div class="input-group-addon">
				</div>
				<input type="text" class="form-control" id="needTitle" name="needTitle"  placeholder="Need Title Here"/>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label" for="txtareaComments">Need Description</label>
			<textarea class="form-control" rows="5" id="needDescription"  name="needDescription" placeholder="500 characters max."></textarea>
		</div>

		<div class="form-group">
			<!--a id="reset-form" class="btn" role="button">Reset Form</a-->
			<button type="submit" class="btn" id="needSubmit" name="needSubmit">Submit</button>
		</div>
		<div id="needError" name="needError"></div>
	</form>
</div> <!-- CLOSE FORM WRAP -->
</div>
	</div>
		</div>
