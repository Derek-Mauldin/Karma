<div id="login-overlay" class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Login to Karmify</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-xs-6">
					<div class="well">
						<form id="loginForm" method="POST" action="#" >
							<div class="form-group">
								<label for="username" class="control-label">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label for="password" class="control-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
								<span class="help-block"></span>
							</div>
							<div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" id="remember"> Remember login
								</label>
								<p class="help-block">(if this is a private computer)</p>
							</div>
							<button type="submit" class="btn btn-success btn-block">Login</button>
							<a href="/forgot/" class="btn btn-default btn-block">Register</a>
						</form>
					</div>
				</div>
