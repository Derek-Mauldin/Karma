<div class="modal fade" id="messageModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span hidden="true">&times;</span></button>
				<h3 class="modal-title">message $user</h3>
			</div>
			<div class="modal-body">
				<form role="form" id="offerForm" data-toggle="validator" class="shake">
					<div class="form-group">?
						<textarea id="message" class="form-control" rows="5" placeholder="Hi!"required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<button type="submit" id="form-submit" class="btn btn-success btn-lg">Submit</button>
					<button type="button" class="btn btn-default btn-lg" data-dismiss="modal" aria-hidden="true">Cancel</button>
					<div id="msgSubmit" class="h3 text-center hidden"></div>
				</form>
			</div>
		</div>
	</div>
?</div>