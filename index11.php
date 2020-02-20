<?php
  session_start();
  include("connection.php");

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <script type="text/javascript">
  	function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "all.php", true);
  xhttp.send();
}

  </script>

</head>

<body>



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
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
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <?php
            if (isset($_SESSION["avatar"])){
              echo '<li class="nav-item nav-link">';


                echo '<div class="dropdown">

                <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo $_SESSION["avatar"];
                echo' </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>';
              echo '</li>';
            }
            
           else {
              echo '
               <li class="nav-item">
               <a class="nav-link" href="login.php">Login</a>
               </li>';
            }
          
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container ">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
           

            <?php

               $q="Select images from slide";
               $res = mysqli_query($con, $q);
               $c=mysqli_num_rows($res);
              $val=0;

              
            while ($val<$c){
                if ($val==0){
                   echo'<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                }
                else
                echo'<li data-target="#carouselExampleIndicators" data-slide-to=$val></li>';
              $val++;
            }
           ?>

          </ol>
          <div class="carousel-inner" role="listbox">
            <?php
               $q="Select images from slide";
               $res = mysqli_query($con, $q);
               $c=mysqli_num_rows($res);


               $val2=1;
              while ($val2<=$c) {
                 $q1="Select images from slide where Slide_order= $val2";
                 $sql=mysqli_query($con,$q1);
                 $row=mysqli_fetch_assoc($sql);
                if ($val2==1)
                  echo '<div class="carousel-item active">';
                else
                  echo '<div class="carousel-item">';

                  echo '<img class="d-block img-fluid" src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'"/>';
                  echo '</div>';
                  
                $val2 =$val2+1 ;
                } 
              ?>


              <!--img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide"-->
           </div>
           
           
          </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          </div>

         
        </div>

        <div class="row">
          
        <?php
          $sql="select * from item limit 6";
          $res=mysqli_query($con,$sql);
      if(mysqli_num_rows($res)>0){
          while($arr=mysqli_fetch_assoc($res)){

                 
         echo '<div class="col-lg-4 col-md-6 mb-4">';
            echo '<div class="card-h-100">';
              echo '<a href="#"><img class="d-block img-fluid" src="data:image/jpeg;base64,'.base64_encode( $arr['image'] ).'"</a>';

//src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'"/>';


             echo '<div class="card-body">';
                echo '<h4 class="card-title">';
                  echo $arr["name"];
                echo '</h4>';
              echo $arr["price"];
                echo '<p class="card-text">'.$arr["description"].'</p>';
              echo '</div>';
              echo '<div class="card-footer">';
                echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';

                echo '<div class="float-right"><button type="button" class="btn btn-success btn-sm">Add to cart</button>';
              	echo '&nbsp;&nbsp;<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#details" onclick="getData()" id='; echo $arr["inx"]; echo'>View details</button></div>';

              	  echo'
            <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="details"> '; echo $arr["name"]; echo'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <img class="d-block img-fluid" src="data:image/jpeg;base64,'.base64_encode( $arr['image'] ).'"</a>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';


              echo'</div>';
            echo '</div>';
          echo '</div>';  
         }
  }
        ?>


       

      

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

    <div id="demo">
	    <center>
	 	<button type="button" onclick="loadDoc()">Load More</button>
		</center>
	</div>
	<div><br/></div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
