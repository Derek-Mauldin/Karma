<div class="modal fade" id="contactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span hidden="true">&times;</span></button>
				<h3 class="modal-title">Contact Us</h3>
			</div>

			<div class="modal-body">
				<form role="form" id="contactForm" data-toggle="validator" class="shake">
					<div class="form-group">
						<!-- The div class="form-wrap" is the black box containing the form. It's set to a column width of 12 for small screens, and a column width of 6 for medium screens on up -->
						<div class="col-xs-12 col-md-7 form-wrap">
							<!-- Form is centered within it's container, and is set to 10 be columns wide RELATIVE TO IT'S CONTAINER, and offset to the right by one column. See classes: col-xs-offset-1 & col-xs-10 -->
							<form method="get" action="#" id="contact-us" name="contact-us" class="form-horizontal col-xs-10 col-xs-offset-1">

								<div class="form-group">
									<!-- Labels for each field are places within a <label> tag. Use the "for" attribute. the class="control-label" is for styling. -->
									<label for="contactUsName" class="control-label">Name</label>
									<!-- the div class="input-group" contains both the text field and the icon to the left -->
									<div class="input-group">
										<!-- this div and span contains the glyphicon to the left. aria-hidden is so that screen readers don't read this element -->
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										</div>
										<!-- text field input. pay attention to the id, placeholder text, type, and placeholder attributes -->
										<input type="text" class="form-control" id="contactUsName" name="contactUsName" placeholder="Your name here." maxlength="150"/>
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
									<!-- the following <a> tag has been styled as a button with class="btn" -->
									<a id="reset-form" class="btn" role="button">Reset Form</a>
									<button type="submit" class="btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
			</div>
		</div>