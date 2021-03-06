<?php
function redirect(){
    header('Location: profile.php');
    die();
}
session_start();
if (isset($_SESSION["email"])){
    redirect();
}
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
    <meta name="description" content="Login page">
    <meta name="author" content="Neil">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../css/mydefaultstyle.css" rel="stylesheet">

    
  </head>

  <body>

    <!-- Navigation -->
<!-- Navigation -->
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
              <a class="nav-link" href="">Login</a>
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
      <h1 class="my-4">Log in
      </h1>
        
        
      <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 col-sm-12">
              <form action="profile.php" method="post">    
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  pattern=".{1,25}" placeholder="Enter Email">
                    </div>

                 <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" pattern=".{1,20}" placeholder="Password">
                 </div>

                 <div class="row justify-content-start">
                  <div class="col-sm-2 mb-2">
                    <br>
                      <button type="submit" class="btn" id="submitbtn-login">Submit</button>                   
                    </div>
                  </div>
              </form>
          </div> <!-- end col -->
          <div class="col-lg-4 col-md-6 col-sm-12 text-center mb-2">
              <br>
              <label for="newaccount">Don't have an account? Make one here.</label>
         <div class="row justify-content-center">
   
             <form action="CreateAccount/createaccount.html">
              <br><br>
                <button type="submit" class="btn" id="newaccount" href="http://lamp.eng.fau.edu/~CEN4010_S2018g05/Login/CreateAccount/createaccount.html">Create New Account</button>                   
             </form>
          </div>
          </div> <!-- end col -->
          
      </div>
    
 
        
    </div>
    <!-- /.container -->

    

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
