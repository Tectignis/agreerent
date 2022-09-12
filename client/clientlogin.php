<?php

include("../config/config.php");
?>
<?php
session_start();
if(isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:index.php"); 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERERNT | CLIENT LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<style>

.container {
    padding: 60px;
    padding-top: 0;
    height: 200px;
    background-color: #0a0a23;
}

img {
    margin-left: 105px;
    width: 363px;
    margin-top: 80px;
}
.text{
    text-decoration: solid;
    color: #ffffff;
    margin-top: 20px;
}
input[type=text]{
  width: 53%;
  padding: 5px 20px;
  margin: 5px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}
input[type=submit]{
        
        background-color:  #6fd943;
        padding:5px 20px;
        color:white;
        font-size:14px;
        margin:04px;
        border-radius:5px;
        border-style:none;
    }

.t{

 

font-family: 'Inria Sans';
font-style: normal;
font-weight: 400;
font-size: 24px;
line-height: 43px;

color: #ffffff;

}
.t1{
  font-family: 'Inria Sans';
font-style: normal;
font-weight: 400;
font-size: 16px;
line-height: 24px;

color: #FFFFFF;
}
@media screen and (max-width: 600px) {
  img {
    width: 400px;
  }
  .design{
    display:none;
  }
  .back_design{
    background-color:#6fd943 !important;
width:100%;

  }
  .a1{
    margin-top:30% !important;
  }
  input[type=text]{
  width: 80%;
  padding: 5px 20px;
  margin: 5px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}
  .c2 {
  background-image: url('dist/img/img-auth-3.svg');
  height: 288px;
  background-color: #6fd943;
  background-size: contain;
  background-repeat: no-repeat;
  border-radius: 10px 10px 0 0;
}
}

</style>
  </head>
  <body>

  <div class="main-contaainer">
    <div class="row a1" style="margin: 20px; height: max-content;">
<div class="c2"></div>
        <div class="col-6 back_design" style="background-color:#ffffff;  height: max-content;border-radius: 0px 0px 10px 10px;">
          <form method="post" style="margin-top:23%;margin-left:23%;">
            <h3 style="font-family: Arial, Helvetica, sans-serif; font-size:25px;">Client Login</h3>
                     <div class="form-group mb-6">
                         <div class="d-flex align-items-center justify-content-between">
                             <div>
                                 <label class="form-label">Email</label>
                             </div>
                         </div>
                         <input  type="text" name="email" class="form-control " required autofocus>
                                             </div>
                     <div class="form-group mb-6">
                         <div class="d-flex align-items-center justify-content-between">
                                 <div>
                                     <label class="form-label">Password</label>
                                 </div>
 
                         </div>
 
                         <input type="text"  name="password" class="form-control "  required>
                                              </div>
                     <div class="form-group mb-6">
                         <div class="mb-">
                             <div class="text-left" style="font-size:12px;font-family:serif,Times New Roman">
 
                             <a href="forgotpass.php">I forgot my password</a>
                             
                             </div>
                         </div>
 
                     </div>
                 <br>

                     <div class="d-grid">
                         <input type="submit" name="login" value="Login" style="width:51%;font-family:Inria Sans;">
                     </div>
             </form>
        </div>
        <div class="col-6 container design" style="background-color:#6fd943; height: max-content; border-radius:24px;">
<div style="margin-top:9px;">
<img src="dist/img/img-auth-3.svg" alt="FCC Logo" />
</div>
<div class="text t">
<p>
    <b style=" margin-left: 130px;">“Attention is the new currency”</b>
</p>
</div>
                
<div class="t1">
  <p>
      <h6 style="    margin-left: 130px; ">The more effortless the writing looks, the more effort the <br>
        writer actually put into the process.</h6>
  </p>
  </div>  
           
        </div>
    </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
<?php

if(isset($_POST["login"])){
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$password=mysqli_real_escape_string($conn,$_POST["password"]);

	$sql = mysqli_query($conn,"SELECT * FROM agent_details WHERE email='$email' AND status='1'") ;
	if(mysqli_num_rows($sql)>0){
		$row=mysqli_fetch_assoc($sql); 
		$verify=password_verify($password,$row['password']);
		if($verify==1){
	$_SESSION['email']=$row['email'];
      $_SESSION['name']=$row['agent_name'];
      $_SESSION['id']=$row['user_id'];
      $_SESSION['address']=$row['office_address'];
      ?>

<script type="text/javascript">
$(document).ready(function() {
    Swal.fire({
  type: 'success',
  title: 'Success',
  text: 'Login Successfully',
  showConfirmButton: false,
  timer: 1000
}).then(function() {
        // Redirect the user
        window.location.href = "index";
    })
});
</script>

<?php 
}
else{
   ?>

<script type="text/javascript">
$(document).ready(function() {
  Swal.fire({
  type: 'error',
  title: 'Error',
  text: 'Invalid Email or Password',
  showConfirmButton: false,
  timer: 2000
}).then(function() {
        // Redirect the user
        window.location.href = "clientlogin";
    })
});
</script>

<?php 

}
}else{
echo"<script>
alert('Wrong email'), window.location = 'clientlogin.php';
</script>";
}
}
?>

</html>