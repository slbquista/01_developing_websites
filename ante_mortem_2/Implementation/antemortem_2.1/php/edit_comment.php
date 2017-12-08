<?php
    include_once 'db_connection.php';
	
	// session_start();
	
	$id = $_POST['comment_id'];
	$edit_comment = filter_input(INPUT_POST, 'edit_comment', FILTER_SANITIZE_STRING);
	
	//echo $id;
	//echo $edit_comment;
	//echo "before query";
	
    $query = $connection -> prepare ("
			update am_comments
				set comment = ':edit_comment'
				where comment_id = 1
			");
	
	//echo "hello";
	
    $success = $query -> execute ([
        "comment" => $edit_comment,
		"comment_id" => $id
    ]);
	
	
	echo $query->rowCount() . " records UPDATED successfully";
	
	echo $success;
	
	// update am_comments
	// set comment = 'test2'
	// where comment_id = 1;

	/*
	$query = $connection -> prepare ("
            insert into am_users (fname, lname, username, password)
                values (:fname, :lname, :username, :password)
            ");

    $success = $query -> execute ([
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
		'password' => $password
    ]);*/
	
	// $count = $query -> rowCount();
    
    
    // if ($count > 0) {
		// header('location: ../comic_pages_2.php');
        // //echo "Insert successful!";
    // } else {
		// //header('location: ../register.html');
        // echo "Insert failed!";
    // }
?>