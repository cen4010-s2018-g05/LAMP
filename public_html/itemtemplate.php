<?php
//displays product information, requires variables to be already delcared

    echo ' 
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
                        <h4>$'.$Retail.'</h4>                    
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
              <p class="card-text">Keywords : '.$Keywordlist.'</p>
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
'


?>