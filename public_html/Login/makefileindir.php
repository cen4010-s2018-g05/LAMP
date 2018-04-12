<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login page">
    <meta name="author" content="Neil">

    <title>Profile</title>

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
              <a class="nav-link" href="Login/login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div> 
      </div>
    </nav>

        <?php
        
        function makedir($name){
              if (is_dir($name)){

              echo ("$name is a directory");
              }
            else
              {
              echo ("$name is not a directory making one now");
                mkdir($name, 0775);
              }  
        }
        
        try {
            //entering mysql
            $myfile = null;
            
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $verified = true;
            if ($verified == true){
            $dirname = "../" . $_POST[htmlspecialchars("cat")];

            $itemname = $_POST[htmlspecialchars("item")];
            makedir($dirname);
            makedir($dirname."/".$itemname);
            
            //to remove accidental dir
            //rmdir($dirname);
            
                //form var
            $filename = $dirname."/".$itemname."/index.html";
            $Product = $itemname;
            $Category = $_POST[htmlspecialchars("cat")];
            $vendor = $_POST[htmlspecialchars("vendor")];
            $SKU = $_POST[htmlspecialchars("sku")];
            $Newark= $_POST[htmlspecialchars("newark")];
            $Quantity= $_POST[htmlspecialchars("qty")];
            $Cost= $_POST[htmlspecialchars("cost")];
            $Retail= $_POST[htmlspecialchars("retail")];
            $Bulk= $_POST[htmlspecialchars("bulk")];
            $Jobber= $_POST[htmlspecialchars("jobber")];
            $ISBN= $_POST[htmlspecialchars("isbn")];
            $Vendor= $_POST[htmlspecialchars("vendor")];
            $Location1= $_POST[htmlspecialchars("loc1")];
            $Location2= $_POST[htmlspecialchars("loc2")];
            $Location3= $_POST[htmlspecialchars("loc3")];
            $Extra1= $_POST[htmlspecialchars("ex1")];
            $Extra2= $_POST[htmlspecialchars("ex2")];
            $Extra3= $_POST[htmlspecialchars("ex3")];
            $Descriptionshort= $_POST[htmlspecialchars("short")];
            $Descriptionlong= $_POST[htmlspecialchars("long")];
            
            //saving to database
             $sql = $conn->prepare("INSERT INTO Inventory (Product, SKU, Newark, Category, Cost , Quantity, Descriptionshort, Descriptionlong, ISBN, Extra1, Extra2, Extra3) Values (:Product, :SKU, :Newark, :Category, :Cost , :Quantity, :Descriptionshort, :Descriptionlong, :ISBN, :Extra1, :Extra2, :Extra3)
             ");
            
            $sql->bindParam(':Product', $Product);
            $sql->bindParam(':SKU', $SKU);
            $sql->bindParam(':Newark', $Newark);    
            $sql->bindParam(':Category', $Category);
            $sql->bindParam(':Cost', $Cost);
            $sql->bindParam(':Quantity', $Quantity);
            $sql->bindParam(':Descriptionshort', $Descriptionshort);
            $sql->bindParam(':Descriptionlong', $Descriptionlong);
            $sql->bindParam(':ISBN', $ISBN);
            $sql->bindParam(':Extra1', $Extra1);
            $sql->bindParam(':Extra2', $Extra2);
            $sql->bindParam(':Extra3', $Extra3);
                    
            // use exec() because no results are returned
            $sql->execute();    
               
             $sql = $conn->prepare("INSERT INTO Price (Product, Retail, Bulk, Jobber) Values (:Product, :Retail, :Bulk, :Jobber)
             ");
            $sql->bindParam(':Product', $Product);
            $sql->bindParam(':Retail', $Retail);
            $sql->bindParam(':Bulk', $Bulk);
            $sql->bindParam(':Jobber', $Jobber);    
                    
            // use exec() because no results are returned
            $sql->execute();        
            
             $sql = $conn->prepare("INSERT INTO Location (Product, Location1, Location2, Location3) Values (:Product, :Location1, :Location2, :Location3)
             ");
            $sql->bindParam(':Product', $Product);
            $sql->bindParam(':Location1', $Location1);
            $sql->bindParam(':Location2', $Location2);
            $sql->bindParam(':Location3', $Location3);    
                
            // use exec() because no results are returned
            $sql->execute();        
            $sql = $conn->prepare("INSERT INTO Link (Product, Category, Link) Values (:Product, :Category, :Link)
             ");
            $Link = $_POST[htmlspecialchars("cat")]."/".$itemname;
            //replaces '%' with '%37' which should fix error with bad links
            $Link = str_replace('%', '%37', $Link);    
            $sql->bindParam(':Link', $Link);       
            $sql->bindParam(':Product', $Product); 
            $sql->bindParam(':Category', $Category);
            // use exec() because no results are returned
            $sql->execute();        
            //end mysql
            $conn = null;
            $money = round($Retail,2);

            //creating new file, will overwrite exsisting file
            $myfile = fopen($filename,"w");
            fwrite($myfile, '
            
            <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Template for items">
    <meta name="author" content="Neil">

    <title>'. $Product.'</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../../css/mydefaultstyle.css" rel="stylesheet">
    


  </head>

  <body>

    <!-- Navigation -->
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
              <a class="nav-link" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/Login/login.html">Login</a>
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

        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 col-md-8">

          <div class="card mt-3 mb-2">
            <img class="card-img-top img-fluid" src="" alt="">
            <div class="card-body">
              <h3 class="card-title">'.$Product.'</h3>
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <h4>$'.$money.'</h4>                    
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">

                          <label for="Quantity">Quantity </label>
                          <select id="Quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select> <!-- end dropdown-->                               

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-warning" id="addcart">Add to Cart</button>             
                    </div>
                </div> 

              <p class="card-text">Vendor : '.$Vendor.'</p>
              <p class="card-text">SKU : '.$SKU.'</p>
              <p class="card-text">Newark : '.$Newark.'</p>
              <p class="card-text">Category : '.$Category.'</p>
              <p class="card-text">Cost : '.$Cost.'</p>
              <p class="card-text">Quantity : '.$Quantity.'</p>              
              <p class="card-text">Retail : '.$Retail.'</p>
              <p class="card-text">Bulk : '.$Bulk.'</p>
              <p class="card-text">Jobber : '.$Jobber.'</p>
              <p class="card-text">Location1 : '.$Location1.'</p>
              <p class="card-text">Location2 : '.$Location2.'</p>
              <p class="card-text">Location3 : '.$Location3.'</p>
              <p class="card-text">Description Long : '.$Descriptionlong.'</p>
              <p class="card-text">Description Short : '.$Descriptionshort.'</p>
              <p class="card-text">ISBN : '.$ISBN.'</p>
              <p class="card-text">Extra1 : '.$Extra1.'</p>
              <p class="card-text">Extra2 : '.$Extra2.'</p>
              <p class="card-text">Extra3 : '.$Extra3.'</p>
            </div>
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

            
            ');
            fclose($myfile);
            echo 'Saved to file.';
                
            

            }
        }
        catch (Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
        ?>
    
    </body>
</html>