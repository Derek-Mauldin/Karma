<?php
/*grab current directory*/
$CURRENT_DIR = __DIR__;

/*set page title here*/
$PAGE_TITLE = "Message";

/*load head-utils.php*/
require_once(dirname(__DIR__) . "/template/head-utils.php");

?>

		<h1>Karma Message</h1>

		<!-- The div class="form-wrap" is the black box containing the form. It's set to a column width of 12 for small screens, and a column width of 6 for medium screens on up -->
		<div class="col-xs-12 col-md-7 form-wrap">
			<!-- Form is centered within it's container, and is set to 10 be columns wide RELATIVE TO IT'S CONTAINER, and offset to the right by one column. See classes: col-xs-offset-1 & col-xs-10 -->
			<form method="get" action="../controllers/message-controller.php" id="karmaMessage" name="karmaMessage" class="form-horizontal col-xs-10 col-xs-offset-1">

				<div class="form-group">
					<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
					<label for="messageSender" class="control-label">Sender User Name</label>
					<!-- the div class="input-group" contains both the text field and the icon to the left -->
					<div class="input-group">
						<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						</div>
						<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
						<input type="text" class="form-control" id="messageSender" name="messageSender"  placeholder="User Name Here" maxlength="150" />
					</div>
				</div>

				<div class="form-group">
					<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
					<label for="messageReceiver" class="control-label">Receiver User Name</label>
					<!-- the div class="input-group" contains both the text field and the icon to the left -->
					<div class="input-group">
						<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						</div>
						<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
						<input type="text" class="form-control" id="messageReceiver" name="messageReceiver"  placeholder="User Name Here" maxlength="150" />
					</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="txtareaComments">Whatcha Got!</label>
					<textarea class="form-control" rows="5" id="karmaMessage"  name="karmaMessage" maxlength="500" placeholder="500 characters max."></textarea>
				</div>

				<div class="form-group">
					<!-- the following <a> tag has been styled as a button with class="btn" -->
					<a id="reset-form" class="btn" role="button">Reset Form</a>
					<button type="submit" class="btn">Submit</button>
				</div>
				<div id="mError" name="mError"></div>
			</form>
		</div> <!-- CLOSE FORM WRAP -->
	</body


</html>