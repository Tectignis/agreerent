<?php
include('config/config.php');
session_start();
if(isset($_POST["login"])){
	$email=$_POST["email"];
	$password=$_POST["password"];

	$sql = mysqli_query($conn,"SELECT * FROM agent_details WHERE email='$email'") ;
	if(mysqli_num_rows($sql)>0){
		$row=mysqli_fetch_assoc($sql); 
		$verify=password_verify($password,$row['password']);
	

		if($verify==1){
			echo"<script>alert('Login Sucessful'),window.location='index.php';</script>";
			$_SESSION['email']=$row['email'];
      $_SESSION['name']=$row['agent_name'];
      $_SESSION['id']=$row['user_id'];
      $_SESSION['address']=$row['office_address'];
		}
		else{
			echo"<script>alert('Invalid Password'),window.location='clientlogin.php';</script>";
		}
	}else{
		echo"<script>alert('Wrong email'),window.location='clientlogin.php';</script>";
	}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGREERERNT | CLIENT LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3><b>AGREERENT</b></h3>
	  <h6>CLIENT LOGIN</h6>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
        <input type="submit" name="login" value="Login" class="btn btn-block btn-primary">
      </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="userforgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
