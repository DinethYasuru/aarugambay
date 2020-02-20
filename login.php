<?php
session_start();
  include("connection.php");


	if(isset($_POST['login'])){
	  $user=strtolower($_POST['user']);
	  $pass=$_POST['pass'];

	 
		 $logQuery="select * from user where user_name='$user' AND password='$pass' limit 1";
		 $logRes=mysqli_query($con,$logQuery);

			if ($logRes) {
				if(mysqli_num_rows($logRes)==1){
					
					header("location:index11.php");
					$_SESSION["avatar"]=ucfirst($user);
				}
				else
					echo "<script>alert('Incorrect Username or Password')</script>" ;
			  }
			  
			
			else
				echo "query error";
		}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

 

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
          <li class="nav-item">
            <a class="nav-link" href="#">Home
              
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

          <li class="nav-item active">
            <a class="nav-link" href="#">Login
              <span class="sr-only">(current)</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
<?php
    $sql="select * from login_cover";
    $res=mysqli_query($con,$sql);
    while($arrimg=mysqli_fetch_assoc($res)){
    echo '<img class="d-block img-fluid" src="data:image/jpeg;base64,'.base64_encode( $arrimg['image'] ).'"/>';
    }
  ?>
  

<div class="container" height="100%" >


<div class="fixed-top" class="img-fluid">

  <center ><div  style="margin-top: 25%;margin-bottom: 25%" class="img-fluid">
   <div class="card text-white bg-dark"  style="width: 25rem; " >
     <div class="card-body"  >
       <h5 class="card-title">Login</h5>

       <form method="POST" action="login.php">
       <table class="card-text">
 
        <tr>
          <td>
            User name :
          </td>
          <td><input type="text" name="user" class="form-control" min="3" required data-error-msg="Please Enter your name" autocomplete="off"></td>
        </tr>

        <tr>
          <td>
            Password
          </td>
          <td><input type="password" name="pass" class="form-control" min="3" required data-error-msg="Please Enter your password" autocomplete="off"></td>
        </tr>

    </table>

    <br/>
    <button class="btn btn-primary" type="submit" name="login">Login</button>&nbsp;&nbsp;
    <button href="#" class="btn btn-danger" type="reset" name="cancel">Clear</button>
    
    </form>
     </div>

    </center>
  </div>
  </div>
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



