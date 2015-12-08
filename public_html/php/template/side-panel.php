<section id="menu" class="side-panel panel panel-default">
	<a class="sidebar-brand" href="#"><img id="logo" src="../../img/octopus-logo.png"/></a>

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

</section><!--/.side-panel-->