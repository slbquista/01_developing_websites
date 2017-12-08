<?php 
    session_start();
    if(!$_SESSION['loggedIn']){
        header('location: index.php');
    }
    
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    include 'dbconnection.php';
    
    $sql = "UPDATE user_copy SET admin = 'Y' WHERE id = :id ";
    
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        "id" => $id
    ]);
    $count = $stmt->rowCount();
    if($success && $count > 0){
        echo "update successful";
    }else{
        echo "Failed to update";
    }