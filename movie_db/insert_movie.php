<?php

    include_once 'dbconnection.php';

    $title = $_POST['title'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];

    $query = $pdo -> prepare ("
            insert into Movies (title, year, genre)
                values (:title, :year, :genre)
            ");

    $success = $query -> execute ([
        'title' => $title,
        'year' => $year,
        'genre' => $genre
    ]);

?>