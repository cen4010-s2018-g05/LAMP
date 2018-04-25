<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login page">
    <meta name="author" content="Neil">

    <title>Add New Item</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../css/mydefaultstyle.css" rel="stylesheet">

    
  </head>
    <body>
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/">Group 5</a>
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

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
    <?php
        try{
           include "fastvalidate.php";
            if ($verified == true){
             echo '
        
        <h3>Add new Item</h3>
        <form id="part1" action="makefileindir.php" method="post">
        <p>    
        Category name:<input type="text" name="cat" value="Misc" required><br>
        Product name:<input type="text" name="item" value="" required><br>
        SKU:<input type="text" name="sku" value=""><br>
        Newark:<input type="text" name="newark" value=""><br>
        Quantity:<input type="text" name="qty" value=""><br>
        Cost:<input type="text" name="cost" value="" required><br>
        Retail:<input type="text" name="retail" value=""><br>
        Bulk:<input type="text" name="bulk" value=""><br>
        Jobber:<input type="text" name="jobber" value=""><br>
        ISBN:<input type="text" name="isbn" value=""><br>
        Vendor:<input type="text" name="vendor" value=""><br>
        Location1:<input type="text" name="loc1" value=""><br>
        Location2:<input type="text" name="loc2" value=""><br>
        Location3:<input type="text" name="loc3" value=""><br>
        Short Description:<textarea name="short" value=""></textarea><br>
        Long Description:<textarea type="text" name="long" value=""></textarea><br>
        Extra1:<input type="text" name="ex1" value=""><br>
        Extra2:<input type="text" name="ex2" value=""><br>
        Extra3:<input type="text" name="ex3" value=""><br>
        Keyword1:<input type="text" name="key1" value=""><br>
        Keyword2:<input type="text" name="key2" value=""><br>
        <input type="submit" name="submit1" vaule="Submit"> 
            </p>
        
                ';
            }
            

            
            $conn = null;
    
            }//end of try           
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
    </body>
</html>    

