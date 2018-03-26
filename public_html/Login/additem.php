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
        try{
           $verified = true;
            if ($verified == true){
             echo '
        <h1>DID NOT Verify user</h1>
        
        <form id="part1" action="makefileindir.php" method="post">
        <p>    
        Category name:<input type="text" name="cat" value="Diode" required>Does not support the "%" character<br>
        Product name:<input type="text" name="item" value="5.1v" required>Does not support the "%" character<br>
        SKU:<input type="text" name="sku" value="1n751a"><br>
        Newark:<input type="text" name="newark" value="13T8945"><br>
        Quantity:<input type="text" name="qty" value="2500"><br>
        Cost:<input type="text" name="cost" value=".019" required><br>
        Retail:<input type="text" name="retail" value=".60"><br>
        Bulk:<input type="text" name="bulk" value=".40"><br>
        Jobber:<input type="text" name="jobber" value=".30"><br>
        ISBN:<input type="text" name="isbn" value=""><br>
        Vendor:<input type="text" name="vendor" value="Newark"><br>
        Location1:<input type="text" name="loc1" value=""><br>
        Location2:<input type="text" name="loc2" value=""><br>
        Location3:<input type="text" name="loc3" value=""><br>
        Short Description:<textarea name="short" value="vendor"></textarea><br>
        Long Description:<textarea type="text" name="long" value="vendor"></textarea><br>
        Extra1:<input type="text" name="ex1" value=""><br>
        Extra2:<input type="text" name="ex2" value=""><br>
        Extra3:<input type="text" name="ex3" value=""><br>
        <input type="submit" name="submit1" vaule="Submit"> 
            </p>
        </form>
        <h3>Upload file not functial yet</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Product name:<input type="text" name="item" value="5.1v Zener Diode, 500 mW, DO-204AH, 5 %,"><br>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
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
    </body>

