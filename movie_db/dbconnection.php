<?php   
/* 
    Created on : 19-Sep-2017
    Author     : Kevin McDonald
*/

    try {
        $host = "studentnet.dundeeandangus.ac.uk";
        $dbname = "db_1516392";
        $un = "1516392";
        $pw = "gS5@9&Y4";
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$un, $pw);
    } catch (PDOException $ex) {
        die("An error occured");
    }

