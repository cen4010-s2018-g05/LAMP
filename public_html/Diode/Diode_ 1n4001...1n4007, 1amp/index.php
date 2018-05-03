
            
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
 gtag("js", new Date());

 gtag("config", "UA-117910499-1");
</script>
      

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Template for items">
    <meta name="author" content="Neil">

    <title>Diode: 1n4001...1n4007, 1amp</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <!-- Default website theme -->
    <link href="../../css/mydefaultstyle.css" rel="stylesheet">
    


  </head>

  <body>

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

        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 col-md-8">

          <div class="card mt-3 mb-2">
            <img class="card-img-top img-fluid" src="" alt="">
            <div class="card-body">
              <h3 class="card-title">Diode: 1n4001...1n4007, 1amp</h3>
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <h4>$0.15</h4>                    
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

              <p class="card-text">Vendor : </p>
              <p class="card-text">SKU : 1n4007</p>
              <p class="card-text">Newark : 05AC0531</p>
              <p class="card-text">Category : Diode</p>
              <p class="card-text">Cost : 0.015</p>
              <p class="card-text">Quantity : 2500</p>              
              <p class="card-text">Retail : 0.15</p>
              <p class="card-text">Bulk : 0.08</p>
              <p class="card-text">Jobber : 0.5</p>
              <p class="card-text">Location1 : </p>
              <p class="card-text">Location2 : </p>
              <p class="card-text">Location3 : </p>
              <p class="card-text">Description Long : Diode: 1n4001...1n4007, 1amp
1n4007
05AC0531</p>
              <p class="card-text">Description Short : Diode: 1n4001...1n4007, 1amp
</p>
              <p class="card-text">ISBN : </p>
              <p class="card-text">Extra1 : </p>
              <p class="card-text">Extra2 : </p>
              <p class="card-text">Extra3 : </p>
              <p class="card-text">Keyword1 : </p>
              <p class="card-text">Keyword2 : through hole</p>
            </div>
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    

    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/popper/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

            
            