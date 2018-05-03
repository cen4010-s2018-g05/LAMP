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
    <meta name="description" content="Home">
    <meta name="author" content="Neil">

    <title>Group 5 Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
          
    <!-- Default website theme -->
    <link href="css/mydefaultstyle.css" rel="stylesheet">

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

    <h1 class="pt-4 text-center">Perry's Parts Pavilion Access Center</h1>
    <p class="pt-4 text-center"><a href="links.php">Product links</a></p>

    <div class="container"><!-- container -->

      <!-- Search card -->
      <div class="row"><!-- row -->

        <div class="col-md-4"></div><!-- left column -->

        <div class="col-md-4"><!-- middle column -->
          <div class="card my-4">
            <h5 class="card-header">Search product names and keywords</h5>
            <div class="card-body">
              <form  action="searchresult.php" method="post">
                <div class="form-group">
                  <label for="keywordinput">Search</label>
                  <input type="text" class="form-control" id="keywordinput" name="keywordinput"  placeholder="Search for...">
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-2 mb-2">
                    <button type="submit" class="btn" id="submitbtn-home">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div><!-- middle column -->

        <div class="col-md-4"></div><!-- right column -->

      </div><!-- row -->

      <!-- Group 5 names, info -->
      <div class="row"><!-- row -->

        <div class="col-lg-4"></div><!-- left column -->

        <div class="col-lg-4 text-center"><!-- middle column -->
          <h2 class="mt-5">Group 5</h2>
          <p class="lead">CEN 4010—Spring 2018</p>
          <div class="row">
            <p>This page is made using Bootstrap 4.0.0 and jQuery 3.3.0.</p>
          </div>
          <ul class="list-unstyled">
            <li><a href="http://lamp.eng.fau.edu/~nmaniquis2017/CEN">Neil</a></li>
            <li><a href="http://lamp.eng.fau.edu/~dsegura2015/">Diego</a></li>
            <li><a href="http://lamp.eng.fau.edu/~gbechtel2013/CEN4010">George</a></li>
            <li><a href="http://lamp.eng.fau.edu/~nleach2013/aboutme.html">Noah</a></li>
            <li><a href="http://lamp.cse.fau.edu/~fcarrillo2012/">Franklin</a></li>
          </ul>
        </div><!-- middle column -->

        <div class="col-lg-4"></div><!-- right column -->

      </div><!-- row -->

    </div><!-- container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
