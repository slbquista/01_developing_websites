<!--
    Created on : 19-Sep-2017
    Author     : Finn Turnbull
-->

<?php
    include_once 'dbconnection.php';
    
    session_start();
    
    
    $un = $_POST['username'];
    $pw = $_POST['password'];
    
    // Not for later - encrypt password
    
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        'username'=>$un,
        'password'=>$pw
    ]);
    
    if ($success && ($stmt->rowCount() > 0)) {
        echo "Successfully logged in.";
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $un;
        echo $_SESSION['loggedIn'];
        echo $_SESSION['username'];
    } else {
        echo "Failed to login.";
        $_SESSION['loggedIn'] = false;
        $_SESSION['username'] = "";
    }
?>