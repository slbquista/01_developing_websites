<?php
    session_start();
    
	// Remove all session variables
	session_unset(); 

	// Destroy the session 
	session_destroy();
	
	// Delete cookie named "username"
	//setcookie("username", "", time() - 3600, "/");
	
	header('location: ../index.php');
?>