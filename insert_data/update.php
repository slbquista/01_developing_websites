<?php
    include_once 'db_connection.php';
    
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    $query = $connection -> prepare("
            update users set password = :password
            where username = :username
        ");
    
    $success = $query -> execute([
        'password' => $password,
        'username' => $username
    ])
?>