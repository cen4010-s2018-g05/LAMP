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
    <meta name="description" content="Results">
    <meta name="author" content="Neil">

    <title>Search Result</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="css/mydefaultstyle.css" rel="stylesheet">
 
       <script>
            function setkeyword(item) {
                var Productarr = document.getElementById(item);
                //Productarr contains 3elements
                //product name(read only), keyword, and submit
                //will convert array to indiviual pieces
                var Productname = Productarr.elements[0].value;
                var Keyword = Productarr.elements[1].value;
                
                if (Keyword.length == 0) {
                   document.getElementById("status").innerHTML = "Enter keyword";
                  return;
                } else {
                                
                var xhttp = new XMLHttpRequest();
                
                xhttp.open("GET", "addkeywordfunction.php?Productname=" + Productname + "&Keyword=" + Keyword, true);
                xhttp.send();
                
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("status").innerHTML =  this.responseText;
                    }else{
                        document.getElementById("status").innerHTML =  this.statusText;
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
        <a class="navbar-brand" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05">Group 5</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05">Home
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
            <h3>Results</h3>
                <div class="col-sm-12">
<?php

    try {
            //form var
            //htmlspecialchars converts certain char to help prevent hacking
            $findtxt = $_POST[htmlspecialchars("keywordinput")];
            //puts % incase string is in the middle of a keyword
            $wildcardfindtxt = "%" . $findtxt ."%";
            
            //creates empty array to hold history of results
            $listresult = array();

            //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql by PDO
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching products with matching keyword string
            //returns product and link pair
            //prepared statments help prevent hacking
            //required search as not all products have keywords
            $stmt = $conn->prepare("SELECT * FROM Link WHERE 
            Product LIKE :Product");
            $stmt->bindParam(':Product', $wildcardfindtxt);
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchAll();
            if (count($result) > 0) {
                //at least 1 product was found; display on screen
                for ($x = 0; $x < count($result); $x++){
                    echo '<br>
                    <a href="'.$result[$x]["Link"].'/">'.$result[$x]["Product"].'</a>
                    '; 
                    array_push($listresult, $result[$x]["Product"]);
                }
            } 
            
            //searches keyword table and returns a product array
             $sql = $conn->prepare("SELECT Product FROM Keyword WHERE Keyword LIKE :Keyword
             ");
            $sql->bindParam(':Keyword', $wildcardfindtxt);

            $sql->execute();
            $result= $sql->fetchAll();
            $resultremaining = array();            
            if (count($result) > 0) {
                //at least 1 product was found
                for ($x = 0; $x < count($result); $x++){
                    //compairs results with previous list
                    if(!in_array($result[$x]["Product"], $listresult)){
                        array_push($resultremaining, $result[$x]["Product"]);
                    }
                }
            } 

            if (count($resultremaining) >0){
                //get product link pair
                
                $sql = $conn->prepare("SELECT * FROM Link WHERE Product LIKE :Product
                ");
                foreach($resultremaining as $item){
                    $sql->bindParam(':Product', $item);
                    $sql->execute();
                    $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result= $sql->fetchAll();
                    if (count($result)> 0){
                        
                        for ($x = 0; $x < count($result); $x++){ 
                            echo '<br>
                            <a href="'.$result[$x]["Link"].'/">'.$result[$x]["Product"].'</a>
                    '; 
                        }
                    }
                }
                unset($item);    
            }
            elseif(count($listresult) == 0){
                echo "<p>0 results found for " . $findtxt .'</p>';
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
            
        </div>
      </div>
    </body>
</html>