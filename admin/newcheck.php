<?php
	session_start();
	error_reporting(0);
	include 'database.php';
	if($_POST["type"]==2){
		    $phone=$_POST['phone'];
			$result = mysqli_query($con,"SELECT * FROM otp WHERE phone='$phone'");
			$row  = mysqli_fetch_array($result);
			if(is_array($row)){
				$authKey = "53ApW6gJgEr5a019b18";
				$mobileNumber = $phone;
				$senderId = "ABCDEF";
				$rndno=rand(100000, 999999);
				$message = urlencode("otp number.".$rndno);
				$route = "route=4";
				$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
				);
				$url="https://control.msg91.com/api/sendhttp.php";
				/* init the resource */
				$ch = curl_init();
				curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					/*,CURLOPT_FOLLOWLOCATION => true */
				));
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				/* get response */
				$output = curl_exec($ch);
				/* Print error if any */
				if(curl_errno($ch))
				{
					echo 'error:' . curl_error($ch);
				}
				curl_close($ch);
				$_SESSION['otp']=$rndno;
				echo json_encode(array("statusCode"=>200));
			}
			else{ 
				echo "Mobile number not exist !";
			}
	}
	if($_POST["type"]==3){
		if($_POST["otp"]==$_SESSION['otp']){
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
	}
=======

<?php  
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("../config/config.php");

if(isset($_POST['sub'])){

  $user_id=$_POST['no'];
  $agent_name=$_POST['name'];
  $mobile_no=$_POST['mobile_no'];
  $office_address=$_POST['office_address'];
  $email_no=$_POST['email'];
  $rera=$_POST['rera'];
  $status=1;
  $pass= rand(100000, 999999);
  $email=$row['email'];

  $dd=$_FILES['image']['name'];
  $dgffd=$_FILES['image']['tmp_name'];

if(move_uploaded_file($dgffd,"dist/img/profile/".$dd)){
    echo "fgfdg";
}else{
    echo "fgs";
}

  
}




>>>>>>> c463c61e60716bb0941767ae880bb56668f2a64e
?>
<!DOCTYPE html>
<html>
<title>Form</title>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="post" id="form-search">
   
    Phone:<input class="input" type="text" placeholder="phone" name="phone" id="phone" required><br><br>
    <div id="otp_section" style="display:none;">
		OTP:<input class="input" type="text" placeholder="OTP" name="otp" id="otp" required><br><br>
    </div>
    <button  type="button" name="btn-save" id="continue">Continue</button>
    <button  type="button" name="login" id="login" style="display:none;">Submit</button>
</form>
<script>
$(document).on('click','#continue',function(e) {
    var phone = $('#phone').val();
    $.ajax({
         data: {
					type: 2,
					phone: phone
								
				},
         type: "post",
         url: "login_ajax.php",
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#otp_section").show();
						$("#continue").hide();
						$("#login").show();
						
					}
					else{
					    alert(dataResult);
					}
					
				}
	});
	
});
$(document).on('click','#login',function(e) {
    var otp = $('#otp').val();
    $.ajax({
				data:   {
							type: 3,
							otp: otp
										
						},
				type: "post",
				url : "login_ajax.php",
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						alert("Login successful !");
					}
					else{
					    alert("Invalid OTP !");
					}
					
				}
	});
	
});
</script>
</body>
</html>