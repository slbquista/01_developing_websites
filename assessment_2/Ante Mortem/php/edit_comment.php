<?php
    include_once 'db_connection.php';
	
	$id = $_POST['comment_id'];
	$edit = filter_input(INPUT_POST, 'edit_comment', FILTER_SANITIZE_STRING);
	
    $query = $connection -> prepare ("
			update am_comments
				set comment = :edit_comment
				where comment_id = :comment_id
			");
	
	
    $success = $query -> execute ([
        "edit_comment" => $edit,
		"comment_id" => $id
    ]);
	
	header('location: ../comic_pages.php');
?>