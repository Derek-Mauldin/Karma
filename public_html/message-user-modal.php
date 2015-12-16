

		<div class="container">

			<!--------------------------------- Modal ---------------------------------------->

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

			<!-----------------------------Modal content----------------------------------------->


					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Message $user</h4>
						</div><!--/modal-header-->

						<div class="modal-body">
							<p class="modal-title">Does this message include an offer?
								<label class="radio-inline"><input type="radio" name="optradio">yes</label>
								<label class="radio-inline"><input type="radio" name="optradio">no</label>
							</p><!--/.panel-title-->

							<textarea class="col-md-12 formcontrol counted"  id="new_message" name="new_message" rows="3" placeholder=
							"Hi $receiver!<?= "\n \n" ?> Change Text Here  <?= "\n \n" ?> From $sender" >
							</textarea>
						</div><!--/.modal-body -->

							<div class="modal-footer">
								<button type="submit" id="form-submit"  class="btn btn-success btn-lg">Submit</button>
								<button type="button" class="btn btn-default btn-lg"  data-dismiss="modal" aria-hidden="true"> Cancel</button>
								 <div id="msgSubmit" class="h3 text-center hidden"></div> 
							</div><!--/modal-footer-->
						</div><!--/modal-content-->
					</div><!--/modal-dialog-->
				</div><!--/modal-fade-->
			</div><!--/container-->


