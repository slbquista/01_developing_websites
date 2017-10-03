<!DOCUMENT html>

<?php 
	$my_name = "Finn Turnbull";
	$my_age = 21;
	$my_author = "Terry Pratchett";
?>

<html>
	<head>
		<title><?php print ($page_title); ?> </title>
	</head>

	<body>
		<h1>PHP Variables</h1>
		
		<?php
			echo ("<h2>Welcome to the website of $my_name.</br></h2>");
			echo ("<p>I am $my_age years old.</p>");
			echo ("<b>My favourite author is $my_author.</b>");
		?>
		
		<p>That's the end of todays PHP section.</p>
	</body>
</html>