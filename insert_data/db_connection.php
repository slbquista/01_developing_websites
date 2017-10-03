<?php

    try {
        $host = 'studentnet.dundeeandangus.ac.uk';
        $dbname = 'db_1516392';
        $username = '1516392';
        $password = 'gS5@9&Y4';
        
        $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username, $password);
        
    } catch (PDOException $ex) {
            die("Connection Failed");
        }
?>