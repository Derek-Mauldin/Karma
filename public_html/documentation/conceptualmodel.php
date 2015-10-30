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
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>k
		<title>Conceptual Model </title>
	</head>
	<body>
		<main>
		<h1>Conceptual Model</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Entity</th>
					<th>Relationship</th>
					<th>Key</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Members</td>
					<td>One-to-many relationship with other members</td>
					<td>Primary key - memberId</td>
				</tr>
				<tr>
					<td>Administration</td>
					<td>One-to-many relationship with members<br>
					    One-to-many relationship with admin</td>

					<td>Primary key - adminId</td>
				</tr
				<tr>
					<td>Messages</td>
					<td>Many-to-many relationship between members/admins</td>
					<td>Primary key- messageId<br>
						Foreign key- memberId<br>
						Foreign key - adminId</td>
				</tr>
			</tbody>
		</table>
		</main>
	</body>
</html>


