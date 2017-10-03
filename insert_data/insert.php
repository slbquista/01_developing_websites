<?php

    include_once 'db_connection.php'; //Might need to change this!

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare(" 
                     INSERT INTO users (fname, lname, username, password)
                     VALUES (:fname, :lname, :username, :password)
                ");

    $success = $query->execute([
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
        'password' => $password
            ]);
    
    $count = $query -> rowCount();
    
    
    if ($count > 0) {
        echo "Insert successful!";
    } else {
        echo "Insert failed!";
    }
?>