<?php 
    session_start();
    if(!$_SESSION['loggedIn']){
        header('location: index.php');
    }
    
    include 'dbconnection.php';
    
    $query = $pdo->query("SELECT * FROM user_copy WHERE admin != 'Y'");
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $output = "";
    $output .="<table>";
    $output .="<thead><tr><th>id</th><th>Fname</th><th>Lname</th><th>Username</th><th>Make Admin?</th></tr></thead>";
    foreach($results as $result){
        $output .="<tr>";
        $output .="<td>".$result->id."</td>";
        $output .="<td>".$result->fname."</td>";
        $output .="<td>".$result->lname."</td>";
        $output .="<td>".$result->username."</td>";
        $output .="<td><form id='adminForm' action='update.php'>";
        $output .="<input type='hidden' name='id' value='$result->id' />";
        $output .="<input type='submit' value='Confirm' id='idButton' />";
        $output .="</form></td>";
        $output .="</tr>";
    }
    $output .="</table>";
?>
<!DOCTYPE html>
<!--
    Created on : 26-Sep-2017
    Author     : Kevin McDonald
-->
<html lang="en">
    <head>
        <title>Admin Page</title>
        <meta name="viewport" content="width: device-width, intial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/movie_home.css" />
    </head>
    <body>
        <div id="header">
            <div class="inner">
                <div id="logo">LOGO</div>
                <nav>
                    <a href="index.php">Home</a>
                    <a href='insert.php'>Insert</a>
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
