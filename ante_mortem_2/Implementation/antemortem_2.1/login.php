<!DOCTYPE html>

<html>
	<head>
		<title>AM - Login</title>
		
		<!-- Viewport tag provides responsiveness -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="placeholder.css" media="screen">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
		
		<!-- Imports Google icons -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<!-- Imports jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>

	<body>
		<div id="header">
			<img src="img\banner_1.png" alt="Banner" id="banner">
			
			<button class="hamburger"><i class="material-icons">menu</i></button>
			
			<button class="cross"><i class="material-icons">close</i></button>
		</div>
		
		<div class="menu">
			<ul>
				<a href="index.php"><li>HOMEPAGE</li></a>
				<a href="description.php"><li>DESCRIPTION</li></a>
				<!-- <a href="comic_pages.php"><li>COMIC PAGES</li></a> -->
				<a href="comic_pages_2.php"><li>COMIC PAGES</li></a>
				<a href="biography.php"><li>BIOGRAPHY</li></a>
				<a href="register.php"><li>REGISTER</li></a>
				<!-- <a href="login.php"><li>LOGIN</li></a> -->
			</ul>
		</div>

		<script src="js\hamburger.js"></script>
		
		<div id="container">
			<div id="title" class="centered">
				<h1>Login Placeholder Page</h1>
			</div>

			<form id="attempt_login" method="POST" action="php/attempt_login.php">

				<label for="username">Username:</label>
				<input type="text" name="username" id="username">
				<br />

				<label for="pasword">Password:</label>
				<input type="password" name="password" id="password">
				<br />

				<input id="submit" type="submit" value="Submit">
			</form>
		
		<div id="footer">
			<p>
				Website by Finn Turnbull </br>
				Artwork by Aisling Allan.
			</p>
		</div>
	</body>
</html>