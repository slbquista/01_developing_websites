<!DOCUMENT html>

<?php 
	$page_title = "Times Table";
	$i = 1;
	$output = "";
	$table = "10";
	
	$base_number = "0";
?>

<html>
	<head>
		<title><?php print ($page_title); ?> </title>
		
		<style>
		table {border: 1px solid black;}
		
		tr {border: 1px solid black;}
		</style>
	</head>

	<body>
		<?php 
			echo "<table>";
				for ($i = 1; $i <= 12; $i ++) {
					
					if ($i == 5) {
						break;
					}
					
					$output = $i * $table . "<br />";
					
					echo "<tr><td>".$output."</td></tr>";
				}
			echo "</table>";
			
			echo "<table>";
				while ($base_number < 15) {
					$base_number++ . "<br />";
					
					echo "<tr><td>".$base_number."</td></tr>";
				}
			echo "</table>";
		?>
	</body>
</html>