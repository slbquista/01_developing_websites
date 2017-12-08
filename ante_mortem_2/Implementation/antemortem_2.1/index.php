<!DOCTYPE html>

<html>
	<head>
		<title>AM - Homepage</title>
		
		<!-- Viewport tag provides responsiveness -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="index.css" media="screen"> 
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
				<!-- <a href="index.php"><li>HOMEPAGE</li></a> -->
				<a href="description.php"><li>DESCRIPTION</li></a>
				<!-- <a href="comic_pages.php"><li>COMIC PAGES</li></a> -->
				<a href="comic_pages_2.php"><li>COMIC PAGES</li></a>
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
			<div class="menuItem">
				<h2>Description</h2>

				<p class="centered">Read more about this comic and the artist and authors behind it!</p>
				
				<div id="imageContainer1" class="centered"><a href="description.html"><img src="img\banner_2.png" alt="Explosions and Alice"></a></div>
			</div>
			
			<div class="menuItem">
				<h2>Comic Pages</h2>
				
				<div id="content1">
					<div id="imageContainer2">
						<a href="comic_pages_2.html"><img src="img\page_1.png" alt="First Page" align="right"></a>
						<p>So this is why you're here right?</br>Whether you're new and want to read from the beginning, or a regular who wants to catchup on the latest page, go here.</p>
					</div>
				</div>
			</div>
			
			<div class="menuItem">
				<h2>Character Bio</h2>
				
				<p class="centered">Interested in learning more about the characters and their story? You need go no farther.</p>
				
				<div id="content2">
					<div class="imageContainer3">
						<a href="biography.html"><img src="img\elizabeth.png" alt="Elizabeth"></a>
					</div>
				
					<div class="imageContainer3">
						<a href="biography.html"><img src="img\james.png" alt="James"></a>
					</div>
					
					<div class="imageContainer3">
						<a href="biography.html"><img src="img\alice.png" alt="Alice"></a>
					</div>
					
					<div class="imageContainer3">
						<a href="biography.html"><img src="img\george.png" alt="George"></a>
					</div>
				</div>
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