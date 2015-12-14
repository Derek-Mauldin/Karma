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

					<button type="submit" id="form-submit"  class="btn btn-success btn-lg"> Offer !</button>
					<button type="button" class="btn btn-default btn-lg"  data-dismiss="modal" aria-hidden="true"> Cancel</button>
					 <div id="msgSubmit" class="h3 text-center hidden"></div> 
				</form> 
			</div>
		</div>
	</div>
 </div>