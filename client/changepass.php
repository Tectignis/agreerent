<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
header("Location:dashboard.php"); 
}
include("../config/config.php");

if(isset($_POST["login"])){
	$password=$_POST["password"];
	$newpassword=$_POST["newpassword"];
$id=$_SESSION['id'];
	$sql = mysqli_query($conn,"SELECT * FROM agent_details WHERE user_id='$id'") ;
		$row=mysqli_fetch_assoc($sql); 
		$verify=password_verify($password,$row['password']);
	
	$hashpassword=password_hash($newpassword,PASSWORD_BCRYPT);

		if($verify==1){
			$query=mysqli_query($conn,"UPDATE `agent_details` SET `password`='$hashpassword' WHERE user_id='$id' ");
      if($query){
        echo "<script>alert('Password Changed Successfully'),window.location='clientlogin';</script>";
      }
		}
		else{
			echo"<script>alert('Invalid Password');</script>";
		}
	
	}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGREERENT | Forgot Password</title>

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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
     <h3>AGREERENT</h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You You Can Change Your Password Here</p>
      <form method="post">
               
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Old Password">
                </div>
                 <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="newpassword" id="exampleInputPassword1" placeholder="New Password">
                </div>
                 <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="confirmopassword"onblur="Validate()" id="confirm_password" name="confPassword" placeholder="Confirm Password">
                </div>
                <div class="mt-6">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Change Password" name="login">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                </div>
                
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$('#confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>
