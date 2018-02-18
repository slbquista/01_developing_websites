<?php
    include_once "db_connection.php";
    session_start();
    
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	include_once "encrypt_pw.php";
	$password = encryptPW($password);
    
    $sql = "select * from am_users where username = :username
            AND password = :password";
    $stmt = $connection -> prepare ($sql);
    $success = $stmt->execute(['username' => $username, 'password' => $password]);
        
    if($success && $stmt -> rowCount() > 0){
		
        $_SESSION['loggedIn'] = true;
		
		$cookie_name = "username";
		$cookie_value = $username;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		
		if($user->admin == 'Y'){
			$_SESSION['admin'] = true;
		} else {
			$_SESSION['admin'] = false;
		}
		
		header('location: ../index.php?loggedin="yes"');
    } else {
        $_SESSION['loggedIn'] = false;
		
        $_SESSION['username'] = "";
		
		header('location: ../login.php');
    }
?>