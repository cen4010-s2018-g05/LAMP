<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Add Keyword">
    <meta name="author" content="Neil">

    <title>Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../../css/mydefaultstyle.css" rel="stylesheet">
 
       <script>
            function setkeyword(item, num) {
                var Productarr = document.getElementById(item);
                //Productarr contains 3elements
                //product name(read only), keyword, and submit
                //will convert array to indiviual pieces
                var Productname = Productarr.elements[0].value;
                var Keyword = Productarr.elements[1].value;
                var statusnum = "status" + num;
                if (Keyword.length == 0) {
                   document.getElementById(statusnum).innerHTML = "Enter keyword";
                  return;
                } else {
                                
                var xhttp = new XMLHttpRequest();
                
                xhttp.open("GET", "addkeywordfunction.php?Productname=" + Productname + "&Keyword=" + Keyword, true);
                xhttp.send();
                
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(statusnum).innerHTML =  this.responseText;
                    }else{
                        document.getElementById(statusnum).innerHTML =  this.statusText;
                    }
                };
                    
                }       

              
            }
            
        </script>

      
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
      
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Add Keyword
      </h1>
        
        <?php
         try{   
        //validate
        $verified = true;
        if ($verified == true){
            //get product names from listinventory
            if(isset($_POST['checkbox'])){
            $list = $_POST['checkbox'];
            }
            else{
                throw new Exception("No boxes were checked");
            }
            //for each produt name get keyword list
            
            //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT Keyword FROM Keyword WHERE 
            Product = :Product");
            
            $count = 0;
            foreach($list as $Product){
                $count++;
                $stmt->bindParam(':Product', $Product);
                $stmt->execute();
                $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result= $stmt->fetchAll();
                $keywordlist = "";
                if (count($result) > 0) {
                    //product and keyword pairs found
                    for ($x = 0; $x < count($result); $x++){
                        if ($x ==0){
                            $keywordlist = $result[$x]["Keyword"];
                        }
                        else{
                            $keywordlist = $keywordlist .", ". $result[$x]["Keyword"];
                        }
                         
                    }
                }
                else {
                    $keywordlist = $Product." does not have keywords";
                }
                //display form
                echo '
                
         <form id="'.$Product.'" action="javascript:setkeyword('.$Product.', '. $count.')">
            <div class="form-group"> 
                 <div class="form-row"> 
                     <div class="col-lg-2 col-md-12">
                         <label for="">Product: <input type="hidden" id="Product'.$count.'" value="'.$Product.'" readonly> '.$Product.'</label>
                     </div>
                      <div class="col-md-4 col-sm-12">
                            <label id="keywords'.$count.'">'.$keywordlist.'</label>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12">
                <input type="text" class="form-control" pattern=".{1,25}" id="keyword'.$count.'" name="keyword" value="" required>         
                     </div>


                     <div class="col-md-4 col-sm-12">
                            <label id="stataus'.$count.'"></label>
                     </div>
                     
                   <div class="row justify-content-end">
                <div class="col-sm-2 mb-2">
              <button  onclick="setkeyword('.$Product.', '. $count.')" class="btn btn-gold">Add Keyword</button>                   
                </div>
              </div>    
                </div>
            </div>
        </form>
                
                
                ';
            }
            unset($Product);
        }
         }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }
             
        ?>

      </div>
    </body>
</html>