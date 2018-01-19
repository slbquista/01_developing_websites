<?php
    include_once 'db_connection.php';
	
	session_start();
	
	$username = $_COOKIE["username"]; //$_SESSION['username'];
	$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

    $query = $connection -> prepare ("
            insert into am_comments (username, comment)
                values (:username, :comment)
            ");

    $success = $query -> execute ([
        'username' => $username,
        'comment' => $comment
    ]);
	
	$count = $query -> rowCount();
    
    
    if ($count > 0) {
		header('location: ../comic_pages.php');
        //echo "Insert successful!";
    } else {
		//header('location: ../register.html');
        echo "Insert failed!";
    }
?>