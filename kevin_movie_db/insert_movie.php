<?php
/* 
    Created on : 19-Sep-2017
    Author     : Kevin McDonald
*/
include "dbconnection.php";

//  Get the values from our form (GET method)
$title = $_GET['title'];
$year = $_GET['year'];
$genre = $_GET['genre'];

//  Setup our SQL
$sql = "INSERT INTO movie (title, year, genre)
        VALUES (:title, :year, :genre)";

//  Prepare the statement
$stmt = $pdo->prepare($sql);

//  Bind values and execute
$success = $stmt->execute([
    'title' =>  $title,
    'year'  =>  $year,
    'genre' =>  $genre    
]);

//  Check successful binding and
//  that affected rows is greater than none
//  Output corresponding result.
if($success && $stmt->rowCount() > 0){
    echo "Inserted Successfully.";
}else{
    echo "There has been an error:";
}