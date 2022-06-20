<?php 
include("../config/config.php");
?>

<?php session_start();

$res=mysqli_query($conn,"SELECT * FROM `email_configuration`");
 $row=mysqli_fetch_array($res);

	//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
 ?>


<?php
		
		if(isset($_POST['forget'])){
			
			$email=$_POST['mail'];
			$q=mysqli_query($conn,"select * from agent_details where email='$email'");
			if(mysqli_num_rows($q)>0){
				
				
				$to=$email;
				$sub="Recover Password";
				$pass=rand(100000, 999999);
			
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = $row['host'];    
				$mail->SMTPAuth   = true;                           
				$mail->Username   = $row['email'];           
				$mail->Password   = $row['password'];                          
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
				$mail->Port       = $row['port'];                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//Recipients
				$mail->setFrom($row['email'], 'Tectignis It Solution');
				$mail->addAddress($email, 'Tectignis Employee');     //Add a recipient
				
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Reset Password';
				$mail->Body    = 'Hi,<br>Here is your new password : '.$pass;
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if($mail->send()){
					$passwordhash=password_hash($pass,PASSWORD_BCRYPT);

					$q1=mysqli_query($conn,"update agent_details set password= '$passwordhash' where email='$email'");
						if($q1){
                            session_destroy();   // function that Destroys Session 
                            header("Location:clientlogin.php");
						}
						else{
							echo"Error";
						}
				}
				
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
			}
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Forgot Password</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html"><b>Admin</b>LTE</a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
<form  method="post">
<div class="input-group mb-3">
<input type="email" name="mail" class="form-control" placeholder="Email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-12"><a class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn" href="clientlogin.php">Cancel</a>
<button type="submit" onclick="fun()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="forget" >Submit</button>
</div>

</div>
</form>


</div>

</div>
</div>


<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
