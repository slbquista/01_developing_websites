<?php
    session_start();
    
    if (!$_SESSION['loggedIn']) {
        header('location: error.php');
    }
?>

<!DOCTYPE html>
<!--
    Created on : 19-Sep-2017
    Author     : Kevin McDonald
-->
<html>
    <head>
        <title>Movies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/movie_home.css" />
    </head>
    <body>
        <div id="header">
            <div class="inner">
                <div id="logo">LOGO</div>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="">Insert</a>
                    <a href="login.html">Login</a>
                </nav>
            </div>
        </div>
        <div id="banner">
            <h1>Movies</h1>
            <h3>Database</h3>
        </div>

        <section class="inner container">
            <form id="insert_movie" name="insert_movie" action="insert_movie.php" method="POST">
                <label for="title"><span>Title:</span></label>  
                <input type="text" name="title" id="title" />  
                <label for="title"><span>Year:</span></label>
                <input type="text" name="year" id="year" />
                <label for="title"><span>Genre:</span></label>  
                <input type="text" name="genre" id="genre" />
                <input type="submit" value="Submit" />
            </form>		
        </section>
        <footer>
            <span id="copy">&copy; Kevin McDonald 2017</span>
        </footer>
    </body>
</html>
