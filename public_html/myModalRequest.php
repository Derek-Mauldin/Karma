

<div class="modal fade" id="requestModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span hidden="true">&times;</span></button>
					<h1>Request</h1>
			</div><!--/modal-header-->

			<div class="modal-body">
<!-- The div class="form-wrap" is the black box containing the form. It's set to a column width of 12 for small screens, and a column width of 6 for medium screens on up -->
	<!-- Form is centered within it's container, and is set to 10 be columns wide RELATIVE TO IT'S CONTAINER, and offset to the right by one column. See classes: col-xs-offset-1 & col-xs-10 -->
	<form method="post" action="php/controllers/need-controller.php" id="need-form" name="need-form" class="form-horizontal col-xs-10 col-xs-offset-1">

		<div class="form-group">
			<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
			<label for="messageSender" class="control-label">Username</label>
			<!-- the div class="input-group" contains both the text field and the icon to the left -->
			<div class="input-group">
				<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</div>
				<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
				<input type="text" class="form-control" id="username" name="username"  placeholder="User Name Here"/>
			</div>
		</div>

		<div class="form-group">
			<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
			<label for="messageReceiver" class="control-label">Need Title</label>
			<!-- the div class="input-group" contains both the text field and the icon to the left -->
			<div class="input-group">
				<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
				<div class="input-group-addon">
				</div>
				<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
				<input type="text" class="form-control" id="needTitle" name="needTitle"  placeholder="Need Title Here"/>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label" for="txtareaComments">Need Description</label>
			<textarea class="form-control" rows="5" id="needDescription"  name="needDescription" placeholder="500 characters max."></textarea>
		</div>

		<div class="form-group">
			<!-- the following <a> tag has been styled as a button with class="btn" -->
			<!--a id="reset-form" class="btn" role="button">Reset Form</a-->
			<button type="submit" class="btn" id="needSubmit" name="needSubmit">Submit</button>
		</div>
		<div id="needError" name="needError"></div>
	</form>
</div> <!-- CLOSE FORM WRAP -->
</div>
	</div>
		</div>
