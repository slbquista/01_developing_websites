<?php
    session_start();
    
	//$_SESSION['loggedIn'] = false;
	//$_SESSION['username'] = "";
	
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	
	header('location: ../index.php');
?>