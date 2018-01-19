<!DOCTYPE html>

<html>
	<head>
		<title>AM - Description</title>
		
		<!-- Viewport tag provides scaling -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/description.css" media="screen"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		
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
				<!-- <a href="description.php"><li>DESCRIPTION</li></a> -->
				<a href="comic_pages.php"><li>COMIC PAGES</li></a>
				<!-- <a href="comic_pages_2.php"><li>COMIC PAGES</li></a> -->
				<a href="biography.php"><li>BIOGRAPHY</li></a>
				<?php
					session_start();
				
					if (!$_SESSION['loggedIn']) {
						echo "<a href='register.php'><li>REGISTER</li></a>";
						echo "<a href='login.php'><li>LOGIN</li></a>";
					} else {
						echo "<a href='php/logout.php'><li>LOGOUT</li></a>";
					}
				?>
			</ul>
		</div>
		
		<script src="js\hamburger.js"></script>
		
		<div id="container">
			<div id="title" class="centered">
				<h1>Ante Mortem</h1>
			</div>
			
			
			<div id="description">
				<p>
					Where does it come from? </br> </br>
					Based on an old role playing game, this comic follows the story of an assassin, a thief, and the son and daughter of the mayor of Halfmoon. </br> </br>
					Set in a Steampunk world of Victorian style, the town of Halfmoon hides many dark secrets below the surface - not least the Guild of Assassins and a thriving underworld of thieving, bribery and trading.
				</p>
				
				<button class="accordion">Finn Turnbull</button>
				<div class="panel">
					<p>Home educated, I grew up in Portugal. Interests include gaming and eSports. Currently studying at Dundee and Angus college - Software Development.</p>
				</div>

				<button class="accordion">Aisling Allan</button>
				<div class="panel">
					<p>Home educated after primary school, I grew up in Scotland. Interests include drawing and painting. Currently studying at Dundee and Angus college.</p>
				</div>

				<script src="js\accordion.js"></script>
			</div>
			
		</div>
		
		<div id="footer">
			<p>
				Website by Finn Turnbull </br>
				Artwork by Aisling Allan.
			</p>
		</div>
	</body>
</html>