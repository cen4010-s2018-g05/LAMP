<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login page">
    <meta name="author" content="Neil">

    <title>Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../../css/mydefaultstyle.css" rel="stylesheet">

    
  </head>
    <body>
            <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Group 5</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login/login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div> 
      </div>
    </nav>
        <div class="container">
            
            
            <form action="addkeyword.php" method="post">
<?php
        try{    
            //validate code here
            $verified = true;
            
            if ($verified == true){
                
                $servername = "localhost";
                $username = "CEN4010_S2018g05";
                $password = "SQLgroup5";
                //connecting to mysql
                $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //get the names and categories all current inventory
                $stmt = $conn->prepare("SELECT Category, Product FROM Inventory");
                $stmt->execute();
                $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result= $stmt->fetchall();
                //result contains product-category pairs
                if (count($result) > 0) {
                    $totalrows = count($result);
                    echo '<input type="hidden" value="'.$totalrows.'" readonly>Add keyword to checked items';
                    
                    for($i=0;$i<count($result);$i++) {
                        $row = $result[$i];
                        //Product name button
                        echo ' <br>
                        <input type="checkbox" name="checkbox[]"   value="'.$row["Product"].'"> '.$row["Product"];
                    }
                    
                    echo '<br><input type="submit" value="submit">';
                } else {
                    echo "You have no items";
                } 
            }
                $conn = null;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }        
?>
                
                </form>
            </div>
    </body>
</html>    