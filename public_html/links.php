<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117910499-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-117910499-1');
</script>
      

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Neil">

    <title>Links</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="css/mydefaultstyle.css" rel="stylesheet">
    
      <!-- Custom styles for this template -->
    <style>

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #b8c6d1;">
      <div class="container">
        <a class="navbar-brand" href="#">Perry's Parts Pavilion Access Center</a>
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
                            <a class="nav-link" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/Login/">
                  <?php
                    if (isset($_SESSION["email"])){
                        echo $_SESSION["email"];
                    }
                    else {
                        echo "Login";
                    }            
                    ?>  
                </a>
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
                
        try{
            
            $myfile = null;
            
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for matching username
            $stmt = $conn->prepare("SELECT * FROM Link");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            if (count($result) > 0) {
                    echo "<table><tr><th>Product</th><th>Category</th><th>Link</th></tr>\n";
                    for($i=0;$i<count($result);$i++) {
                        $row = $result[$i];
                        //Product name button
                        echo "<tr><td>".$row["Product"]."</td><td>".$row["Category"]."</td>";
                        //message details
                        echo "<td><a href='".$row["Link"]."/'>".$row["Product"]."</a>  </td></tr>\n";
                    }
                    echo "</table>";
                } else {
                    echo "You have no items";
                } 
            $result = null;
            $conn = null;
            }
                    catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }
        ?>
            </div>
        </div>
      </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>