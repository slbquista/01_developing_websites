<?php
    include_once 'php/db_connection.php';
    session_start();
    
	//Code for displaying comic pages below
    $sql = "select * from am_pages";
    $results = $connection -> query($sql);
    
    $pages = $results -> fetchALL(PDO::FETCH_OBJ);
	
	$output = "";
	foreach ($pages as $page) {
		$output .= "<h2 style='color: white'>" . $page -> page_id . "</h2>" . "<img src='" . $page -> page_url . "' rel='page_1'/>";
	}
    
	//Code for inputting comments
	$output_2 = "";
	
	$output_2 .=	"<form id='create_comment' method='POST' action='php/create_comment.php'>
						<label for='comment' style='color: white;'>Comment:</label>
						<input type='text' name='comment' id='comment'>
						<br />

						<input id='submit' type='submit' value='Submit'>
					</form>";
	
	//Code for displaying comments
	$sql = "select * from am_comments";
    $results = $connection -> query($sql);
    
    $comments = $results -> fetchALL(PDO::FETCH_OBJ);
	
	$output_3 = "";
	
	foreach ($comments as $comment) {
		$output_3 .= "<h3 style='color: white'>" . $comment -> username . "</h2>" . "<p style='color: white'>" . $comment -> comment . "</p>";
			
			//Code for editing comments
			if ($_SESSION['admin']) {
				
				//Code for editing comments
				$output_3 .= "<form id='edit_comment' method='POST' action='php/edit_comment.php'>
								<label for='edit_comment' style='color: white;'>Edit comment:</label>
								<input type='text' name='edit_comment' id='edit_comment'>
								<br />
								
								<input type='hidden' name='comment_id' value='$comment->comment_id' />

								<input id='edit' type='submit' value='Edit'>
							  </form>";
			
				//Code for deleting comments
				$output_3 .= "<form id='edit_comment' method='POST' action='php/delete_comment.php'>
								<input type='hidden' name='comment_id' value='$comment->comment_id' />

								<input id='delete' type='submit' value='Delete'>
							  </form>";
			}
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>AM - Comic Pages</title>
		
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
				<h1>Comic Pages Placeholder Page</h1>
			</div>
			
            <?php
                //echo $output;
            ?>
			
			<?php
				if ($_SESSION['loggedIn']) {
					echo $output_3;
					
					echo $output_2;
				} else {
					echo "<p style='color: white'>Sorry you're not logged in</p>";
				}
			?>
	
		</div>
		
		<div id="footer">
			<p>
				Website by Finn Turnbull </br>
				Artwork by Aisling Allan.
			</p>
		</div>
	</body>
</html>