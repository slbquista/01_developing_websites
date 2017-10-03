<!DOCUMENT html>

<?php 
	$output = "";
	$my_name = "Finn Turnbull";
	$my_age = 21;
	$my_author = "Terry Pratchett";
?>

<html>
	<head>
		<title><?php print ($page_title); ?> </title>
		
		<link rel="stylesheet" type="text/css" href="output_and_styling.css">
	</head>

	<body>
		<?php 
			$output .= "<div id='line1'> Hello ";
			$output .= $my_name . ".</div><br />";
			$output .= "<div id='line2'>You are $my_age years old. </div><br />";
			$output .= "<div id='line3'>Your favourite author is " . $my_author .".</div><br />";
			
			print $output;
		?>
	</body>
</html>