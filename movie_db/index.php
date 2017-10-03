<?php
    include_once 'dbconnection.php';
    
    session_start();
    
    $sql = "select * from Movies";
    $results = $pdo -> query($sql);
    
    $users = $results -> fetchALL(PDO::FETCH_OBJ);
    
    $output = "";
    $output .= "<ul>";
    $output .= "<li>" . "<b>" . 'Title ' . 'Year ' . 'Genre' . "</b>" . "</li>";
        foreach ($users as $user) {
            $output .= "<li>" . $user -> title . ' ' . $user -> year . ' ' . $user -> genre . "</li>";
        }
    $output .= "</ul>";
    
?>

<!DOCTYPE html>
<!--
    Created on : 19-Sep-2017
    Author     : Kevin McDonald
-->
<html lang="en">
    <head>
        <title>Movie Database</title>
        <meta name="viewport" content="width: device-width, intial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/movie_home.css" />
    </head>
    <body>
        <div id="header">
            <div class="inner">
                <div id="logo">LOGO</div>
                <nav>
                    <a href="">Home</a>
                    <?php
                        if ($_SESSION['loggedIn']) {
                            echo "<a href='insert.php'>Insert</a>";
                        }
                    ?>
                    
                    
                    <a href="login.html">Login</a>
                </nav>
            </div>
        </div>
        <div id="banner">
            <h1>Movies</h1>
            <h3>Database</h3>
        </div>

        <section class="inner container">
            <?php
                echo $output;
            ?>
        </section>
        <footer>
            <span id="copy">&copy; Kevin McDonald 2017</span>
        </footer>	
    </body>
</html>
