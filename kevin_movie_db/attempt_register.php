<?php

include 'dbconnection.php';

$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$un = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$salt = "km01passwordSalt";
$pw = $pw . $salt;
$pw = sha1($pw);

$sql = "INSERT INTO user_copy (fname, lname, username, password, admin)
       VALUES (:fname, :lname, :un, :pw, 'N')";
$stmt = $pdo->prepare($sql);
$success = $stmt->execute([
    "fname" => $fname,
    "lname" => $lname,
    "un" => $un,
    "pw" => $pw
]);
$count = $stmt->rowCount();
if($success && $count > 0){
    echo "Registration successful";
    echo "<a href='index.php'>Home</a>";
}else{    
    echo "Registration failed";
}
