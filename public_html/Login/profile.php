<?php
    session_start()
    
?>
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
            <div class="row">
    <?php
        try{
            $verified = false;
            //form var
            
            //cookie
            if (!empty($_SESSION["email"])){
                $Email = htmlspecialchars($_SESSION["email"]); 
                $tempID = htmlspecialchars($_SESSION["id"]);
                $znum = htmlspecialchars($_SESSION["znum"]);

            }
            else{
                $Email = $_POST[htmlspecialchars("email")];
                $pass = $_POST[htmlspecialchars("pass")];
            }

            if (empty($Email)){
                include "loginecho.php";
                throw new Exception("Please enter a Email");
            }
            if (empty($pass) and empty($tempID)){
                include "loginecho.php";
                throw new Exception("Please enter a password");
            }
            //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for matching username
            $stmt = $conn->prepare("SELECT * FROM Users WHERE 
            Email=:Email");
            $stmt->bindParam(':Email', $Email);
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            if (count($result) == 0) {
                //did not find matching username and password
                include "loginecho.php";
                throw new Exception("Account not found or incorrect password. Please try again");
            }
            //stores array in account then into individual variables
            $account = $result[0];
            $Znumber = $account["Znumber"];
            $name = $account["Name"];
            $hashpass = $account["Password"];
            $fname = $account["First"];
            $lname = $account["Last"];
            $phone = $account["Phone"];
            $year = $account["Gradyear"];
            $card = $account["Card"];
            $extra1 = $account["Extra1"];
            $extra2 = $account["Extra2"];
            $extra3 = $account["Extra3"];
            $result[0]=null;
            $account = null;
            //determine if password or cookie was used
            if (!empty($pass)){
                
                if (password_verify($pass, $hashpass)){
                    $verified = true;
                    $_SESSION["email"] = $Email;
                    $_SESSION["znum"] = $Znumber;
                    $newtemp = bin2hex(random_bytes(5));
                    $_SESSION["id"] = $newtemp;
                    
                    $stmt = $conn->prepare("INSERT INTO Visit (Znumber, TempID, Date) Values  (:Znumber, :TempID, :Date) 
                    ");
                    $current = date("d/m/y : H:i:s", time()+ 3600);
                    $stmt->bindParam(':Znumber', $_SESSION["znum"]);
                    $stmt->bindParam(':TempID', $_SESSION["id"]);
                    $stmt->bindParam(':Date', $current);
                    $stmt->execute();
                }
            }
            else{
                $stmt = $conn->prepare("SELECT * FROM Visit WHERE 
                Znumber=:Znumber");
                $stmt->bindParam(':Znumber', $Znumber);
                $stmt->execute();
                $result= $stmt->fetchall();
                if (count($result) > 0){
                $IDval = $result[0]["TempID"];
                $Time = $result[0]["Date"];
                $result[0]=null;
                //compare time if >1hour not valid
                $current = date("d/m/y : H:i:s", time());
                if ($current > $Time){
                    $stmt = $conn->prepare("DELETE FROM Visit WHERE 
                    Znumber=:Znumber");
                    $stmt->bindParam(':Znumber', $Znumber);
                    $stmt->execute();  
                    // remove all session variables
                    session_unset(); 

                    // destroy the session 
                    session_destroy(); 
                    include "loginecho.php";
                    throw new Exception("Due to inactivity, please login again");
                }
                //check if matching ID
                if ($tempID == $IDval){
                    $verified = true;
                    //generate new TempID
                    $newtemp = bin2hex(random_bytes(5));
                    $_SESSION["id"]= $newtemp;
                    
                    //set cookie
                    $stmt = $conn->prepare("UPDATE Visit SET TempID = :TempID, Date = :Date WHERE Znumber = :Znumber 
                    ");
                    $current = date("d/m/y : H:i:s", time()+ 3600);
                    $stmt->bindParam(':Znumber', $_SESSION["znum"]);
                    $stmt->bindParam(':TempID', $_SESSION["id"]);
                    $stmt->bindParam(':Date', $current);
                    $stmt->execute();
                    //update database
                    
                    $stmt->execute();
                }
                    
                }
                else {
                    include "loginecho.php";
                    throw new Exception("Please login again.");
                }
            }
            
            //Valid Login
            //check account type
            $stmt = $conn->prepare("SELECT * FROM Type WHERE 
            Znumber=:Znumber");
            $stmt->bindParam(':Znumber', $Znumber);
            $stmt->execute();
            $result= $stmt->fetchall();
            if (count($result) == 0) {
                //user is customer
                $type = "user";
            }
            else{
                $type = $result[0]["Type"];
            }
            if ($verified == true){
                echo "
                <div class='col-sm-12'>
                <h1>Hello ".$Email."</h1>
                </div>
                ";
           
                if ($type == "staff"){
                 echo '
            
                <div class="col-sm-4">    
                    <form action="additem.php">
                    <button type="submit" class="btn" id="additem" href="additem.php">Add new item</button>                   
                    </form>
                </div>    
                 
                    ';
                    /* code for add keyword button
                    <form action="Staff/listinventory.php">
                    <button type="submit" class="btn" id="addkeyword" href="Staff/listinventory.php">Add keywords to items</button>                   
                    </form>
                    */
                }
                else if ($type =="user"){
                    echo "<div class='col-sm-12'>";
                    echo "
                    <table><tr><th>Znumber</th><th>Email</th><th>Name</th><th>Phone</th><th>Grad Year</th></tr>";
                    echo "<tr><td>".$Znumber."</td><td>".$Email."</td>";
                        echo "<td>". $fname ." ". $lname." </td><td>".$phone."</td><td>".$year."</td></tr>";
                        echo "</table></div>";
                    
                }
                echo '
                <div class="col-sm-4">
                    <form action="logout.php">
                    <button type="submit" class="btn" id="logout" href="logout.php">Logout</button>                
                    </form>
                </div>   
                ';
             }
            else{ echo "User and password did not match.";
                include "loginecho.php";
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
    </body>
</html>