
<nav class="navbar navbar-default sidebar" role="navigation">
	<div class="container-fluid" id="side">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>


		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<div class="nav navbar-nav">

	<!--side panel body links-->


	<div id="hp" onclick="HideAllShowOne('hp')">
		<a class="lead" href="javascript:ReverseDisplay('home-page')">Home</a>
	</div>

	<div id="pp" onclick="HideAllShowOne('pp')">
		<a class="lead" href="javascript:ReverseDisplay('profile-page')">Profile</a>
	</div>

	<div id="mp" onclick="HideAllShowOne('mp')">
		<a class="lead" href="javascript:ReverseDisplay('message-page')">Messages</a>
	</div>

	<div id="fp" onclick="HideAllShowOne('fp')">
		<a class="lead" href="javascript:ReverseDisplay('feed-page')">Feed</a>
	</div>

	<div id="lp">
		<a class="lead" id="logout" name="logout"  href="<?php echo $PREFIX; ?>php/controllers/logout-controller.php">Logout</a>
	</div>
</div>
</div>
</div>


			</nav>