<?php 
    include 'dbconnection.php';
    
    session_start();
    
    $query = $pdo->query("SELECT * FROM movie");
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $output = "";
    $output .="<table>";
    foreach($results as $result){
        $output .="<tr>";
        $output .="<td>".$result->title."</td>";
        $output .="<td>".$result->year."</td>";
        $output .="<td>".$result->genre."</td>";
        $output .="</tr>";
    }
    $output .="</table>";
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
                        if($_SESSION['loggedIn']){
                            echo "<a href='insert.php'>Insert</a>";
                            echo "<a href='admin.php'>Admin</a>";
                        }
                    ?>
                    <a href="login.html">Login</a>
                    <a href="register.html">Register</a>
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
