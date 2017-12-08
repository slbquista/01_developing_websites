<?php
    include "dbconnection.php";
    session_start();
    
    $un = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    //$un = $_POST['username'];
    $pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $salt = "km01passwordSalt";
    $pw = $pw . $salt;
    $pw = sha1($pw);
    
    //  Note for later - encrypt password
    $sql = "SELECT * FROM user_copy WHERE username = :username
            AND password = :password";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['username' => $un, 'password' => $pw]);
        
    if($success && $stmt->rowCount() > 0){
        echo "Successfully Logged In";
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $un;
        echo $_SESSION['loggedIn'];
        echo $_SESSION['username'];
    }else{
        echo "failed to login.";
        $_SESSION['loggedIn'] = false;
        $_SESSION['username'] = "";
    }
    