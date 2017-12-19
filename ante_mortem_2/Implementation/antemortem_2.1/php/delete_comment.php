<?php
    include_once 'db_connection.php';
	
	$id = $_POST['comment_id'];
	
    $query = $connection -> prepare ("
			delete from am_comments
				where comment_id = :comment_id;
			");
	
    $success = $query -> execute ([
		"comment_id" => $id
    ]);
	
	header('location: ../comic_pages.php');
?>