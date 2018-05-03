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
           <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #b8c6d1;">
      <div class="container">
        <a class="navbar-brand" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/">Perry's Parts Pavilion Access Center</a>
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
        
<h3 id="additem">Add new Item</h3>
<form id="part1" action="makefileindir.php" method="post">

  <div class="container">
    <div class="row justify-content-start">
      <div class="col"><p>Category name:</p></div>
      <div class="col"><input type="text" name="cat" value="Misc" required></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Product name:</p></div>
      <div class="col"><input type="text" name="item" value="" required></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>SKU:</p></div>
      <div class="col"><input type="text" name="sku" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Newark:</p></div>
      <div class="col"><input type="text" name="newark" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Quantity:</p></div>
      <div class="col"><input type="text" name="qty" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Cost:</p></div>
      <div class="col"><input type="text" name="cost" value="" required></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Retail:</p></div>
      <div class="col"><input type="text" name="retail" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Bulk:</p></div>
      <div class="col"><input type="text" name="bulk" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Jobber:</p></div>
      <div class="col"><input type="text" name="jobber" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>ISBN:</p></div>
      <div class="col"><input type="text" name="isbn" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Vendor:</p></div>
      <div class="col"><input type="text" name="vendor" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Location1:</p></div>
      <div class="col"><input type="text" name="loc1" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Location2:</p></div>
      <div class="col"><input type="text" name="loc2" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Location3:</p></div>
      <div class="col"><input type="text" name="loc3" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Short Description:</p></div>
      <div class="col"><textarea name="short" value=""></textarea></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Long Description:</p></div>
      <div class="col"><textarea type="text" name="long" value=""></textarea></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Extra1:</p></div>
      <div class="col"><input type="text" name="ex1" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Extra2:</p></div>
      <div class="col"><input type="text" name="ex2" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Extra3:</p></div>
      <div class="col"><input type="text" name="ex3" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Keyword1:</p></div>
      <div class="col"><input type="text" name="key1" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"><p>Keyword2:</p></div>
      <div class="col"><input type="text" name="key2" value=""></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col"></div>
      <div class="col"><input type="submit" name="submit1" vaule="Submit"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <br>
    <br>

  </div>      
</form>
        
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

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    
    </body>
</html>    

