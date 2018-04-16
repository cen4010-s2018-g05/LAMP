<?php
session_start();
?>
<!DOCTYPE html>
<html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Group 5 Logout</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../css/mydefaultstyle.css" rel="stylesheet">
    
      <!-- Custom styles for this template -->
    <style>

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05">Group 5</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Login/index.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div> 
      </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

    <?php
            $Znumber = $_SESSION["znum"];    
            //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //deleting last visit
            $stmt = $conn->prepare("DELETE FROM Visit WHERE 
            Znumber=:Znumber");
            $stmt->bindParam(':Znumber', $Znumber);
            $stmt->execute();            
                
    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
    echo "You have logged out.";           
    ?>
            </div>
        </div>
      </div>

    </body>
</html>