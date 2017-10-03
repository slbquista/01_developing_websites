<!DOCUMENT html>

<?php 
	$page_title = "Arrays";
?>

<html>
	<head>
		<title><?php print ($page_title); ?> </title>
		
		<style>

		</style>
	</head>

	<body>
		<?php 
			$arr = array("Kevin", "Aarran", "Chris");
			for ($i = 0; $i < 3; $i++) {
				echo $arr[$i]."<br />";
			}
			
		?>
	</body>
</html>