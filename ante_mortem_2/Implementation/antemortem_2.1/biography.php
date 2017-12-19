<!DOCTYPE html>

<html>
	<head>
		<title>AM - Biography</title>
		
		<!-- Viewport tag provides scaling -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/biography.css" media="screen"> 
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
				<a href="description.php"><li>DESCRIPTION</li></a>
				<a href="comic_pages.php"><li>COMIC PAGES</li></a>
				<!-- <a href="comic_pages_2.php"><li>COMIC PAGES</li></a> -->
				<!-- <a href="biography.php"><li>BIOGRAPHY</li></a> -->
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
			<div class="biography">
				<h2>Elizabeth Valentine</h2>
				
				<div class="portraitContainer">
					<img class="portrait" src="img\elizabeth.png" align="right"/>
					<p>
						<b>Age:</b> 17. </br> </br>
						<b>Profession:</b> Guild Assassin and part time ballet teacher (though that's more of a hobby to keep her occupied.) </br> </br>
						<b>Description:</b> She's fairly tall, wiry with pale skin. Has unusually short black hair that's longer at the front and keeps falling over her face, grey/blue narrow eyes, sharp nose and jaw and full lips. She always carries weapons of some form, feeling vulnerable when she's not, and likes wearing long coats when she's not dressed in her Assassins uniform. She hates wearing dresses but has had to in the past. She also has a slight foreign accent but it's too watered down to tell where she's from.
					</p>
				</div>
				
				
			</div>

			<div class="biography">
				<h2>James Scrope</h2>
				
				<div class="portraitContainer">
					<img class="portrait" src="img\james.png" align="left"/>
					<p>
						<b>Age:</b> 16. </br> </br>
						<b>Profession:</b> Joined a gang of breakaway thieves who didn't like the way the Guild was becoming organised, and that you could pay for exemption from theft. </br> </br>
						<b>Description:</b> Physically he is unremarkable; tall and wiry, with short brown hair and brown eyes. He often wears an old dark coloured cloak that conceals his bounty well. He is generally scruffy. 
					</p>
				</div>
			</div>
			
			<div class="biography">
				<h2>Alice Marie Lionhart</h2>
				
				<div class="portraitContainer">
					<img class="portrait" src="img\alice.png" align="right"/>
					<p>
						<b>Age:</b> 6. </br> </br>
						<b>Profession:</b> She doesn't have one yet but she's very good at making things explode, though not always on purpose. She can also make basic weapons that tend to be more likely to harm the person firing it or at least miss. Because of her hobbies her workshop is at the end of the house no one uses and that is nearly always under construction. </br> </br>
						<b>Description:</b> Small and slender for her age with honey blond hair( when it's clean) that's often in pigtails, and greenish-blue eyes under her googles. Her mother puts her in pink dresses but she normally wears a leather apron, with lots of pockets, over them. Most of the time she's covered in filth. 
					</p>
				</div>
			</div>
			
			<div class="biography">
				<h2>George Lionhart</h2>
				
				<div class="portraitContainer">
					<img class="portrait" src="img\george.png" align="left"/>
					<p>
						<b>Age:</b> Unknown, but thought to be around 15. </br> </br>
						<b>Profession:</b> He doesn't really have a fixed one, but is known to do odd jobs and is a moderately good inventor, though he has not had much success with this as yet. </br> </br>
						<b>Description:</b> Tall, matted shoulder length sandy-brown hair that he rarely has cut. He has brown, serious eyes, and often prefers to wear old clothes which he can mess up.
					</p>
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