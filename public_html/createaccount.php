<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Create Account">
    <meta name="author" content="Neil">

    <title> Create Account</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../../css/mydefaultstyle.css" rel="stylesheet">

    
      
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
        <h1>Create Account</h1>
        <p>
<?php       
        try {
            //form var
            $znumber = $_POST[htmlspecialchars("znumber")];
            $pass1 = $_POST[htmlspecialchars("pass1")];
            $pass2 = $_POST[htmlspecialchars("pass2")];
            $fname = $_POST[htmlspecialchars("fname")];
            $lname = $_POST[htmlspecialchars("lname")];
            $email = $_POST[htmlspecialchars("email")];
            $phone = $_POST[htmlspecialchars("phone")];
            $year = $_POST[htmlspecialchars("year")];

            //only znumber, pass1/2 and email are required here
            if (empty($znumber)){
                throw new Exception("Please enter a valid Znumber (do not enter the Z)");
            }
            if (empty($pass1)){
                throw new Exception("Please enter a confirmed password");
            }
            if (empty($pass2)){
                throw new Exception("Please enter a confirmed password");
            }
            if ($pass1 != $pass2){
                throw new Exception("Passwords do not match");
            }
            if (empty($email)){
                throw new Exception("Please enter an email");
            }
            //entering mysql
            $myfile = null;
            
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for name
            $stmt = $conn->prepare("SELECT * FROM Users WHERE 
            Znumber='$znumber'");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchAll();

            if (count($result) > 0) {
                //name is already in database
                throw new Exception("Account is in use. Please modify.");
            } 
            $hashpass = password_hash($pass2, PASSWORD_DEFAULT);

            //valid username
             $sql = $conn->prepare("INSERT INTO Users (Znumber, Password, Email, Fname, Lname, Gradyear, Phone) Values (:Znumber, :Pass, :Email, :Fname, :Lname, :Gradyear, :Phone)
             ");

            $sql->bindParam(':Znumber', $znumber);
            $sql->bindParam(':Pass', $passhash);
            $sql->bindParam(':Email', $email);
            $sql->bindParam(':Fname', $fname);
            $sql->bindParam(':Lname', $lname);
            $sql->bindParam(':Gradyear', $year);
            $sql->bindParam(':Phone', $phone);
            
            // use exec() because no results are returned
            $sql->execute();
           
           $conn = null; 
            echo "Account created, please log in";
            include "loginecho.php";
            
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }
?>
        </p>
            </div>
    <!-- /.container -->

      <!--Jscript-->


      
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
