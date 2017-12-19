<?php
    include_once 'db_connection.php';
	
	$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    //$fname = $_POST['fname'];
	$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    //$lname = $_POST['lname'];
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    //$username = $_POST['username'];
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	//$password = $_POST['password'];
	include_once "encrypt_pw.php";
	$password = encryptPW($password);

    $query = $connection -> prepare ("
            insert into am_users (fname, lname, username, password)
                values (:fname, :lname, :username, :password)
            ");

    $success = $query -> execute ([
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
		'password' => $password
    ]);
	
	$count = $query -> rowCount();
    
    
    if ($count > 0) {
		header('location: ../login.php');
    } else {
		header('location: ../register.php');
    }
?>