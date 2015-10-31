<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
		<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script type="text/javascript" src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/js-cookie/2.0.2/js.cookie.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/additional-methods.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<title>Conceptual Model </title>
	</head>
	<body>
		<main>
			<h1>Karma</h1>
		<table class="table">
			<caption>Conceptual Model</caption>
			<thead>
				<tr>
					<th>Entity</th>
					<th>Relationship</th>
					<th>Description</th>
					<th>Key Type</th>
					<th>Key Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>MEMBERS</td>
					<td>One-to-many</td>
					<td>One member can contact many members</td>
					<td>Primary</td>
					<td>memberId</td>
				</tr>
				<tr>
					<td>PROFILE</td>
					<td>One-to-one</td>
					<td>Each member has one profile.</td>
					<td>Primary</td>
					<td>profileId</td>
				</tr>
				<tr>
					<td>ADMINISTRATORS</td>
					<td>One-to-many</td>
					<td>One admin can contact many members</td>
					<td>Primary</td>
					<td>adminId</td>
				</tr
				<tr>
					<td>&nbsp</td>
					<td>One-to-Many</td>
					<td>Each admin can contact many admin</td>
					<td>Foreign</td>
					<td>messageId</td>
				</tr>
				<tr>
					<td>MESSAGES</td>
					<td>One-to-many</td>
					<td>Each member has many messages.</td>
					<td>Primary</td>
					<td>messageId</td>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>Foreign</td>
					<td>memberId</td>
				</tr>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>Foreign</td>
					<td>adminId</td>
				</tr>
				<tr>
					<td>NEED</td>
					<td>One-to-many</td>
					<td>One member can have many needs</td>
					<td>Primary</td>
					<td>needId</td>
				</tr>
				<tr>
					<td>&nbsp</td>
					<td>Many-to-many</td>
					<td>Many members can fulfill many needs</td>
					<td>Foreign</td>
					<td>memberId</td>
				</tr>
				<tr>
					<td>KARMA(weak-entity)</td>
					<td>Many-to-many</td>
					<td>Many members can fulfill many needs</td>
					<td>Foreign</td>
					<td>memberId</td>
				</tr>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>&nbsp</td>
					<td>Foreign</td>
					<td>needId</td>
				</tr>
			</tbody>
		</table>
		</main>
	</body>
</html>


