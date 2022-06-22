<?php
include("../config/config.php");

if(isset($_POST['otp'])){

  $exampledno=$_POST['exampledno'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $otp= rand(100000, 999999);
  $image=$_FILES['file']['name'];

  $query=mysqli_query($conn,"select * from agent_details where email='$email_no'");
if(mysqli_num_rows($query)>0){
    echo "<script>alert('Email already Registered');</script>";
}
else{
$from = 'Enquiry <naiduvedant@gmail.com>' . "\r\n";
$sendTo = 'Enquiry <'.$email.'>';
$subject = 'Your OTP for Verification Email';
// $fields = array( 'name' => 'name' );
$from = 'Agreerent: 1.0' . "\r\n";
$from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


$emailText = '
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting"> 
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <style>
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

    </style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
<div style="margin:50px auto;width:70%;padding:20px 0">
  <div style="border-bottom:1px solid #eee">
    <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Agreerent</a>
  </div>
  <p style="font-size:1.1em">Hi '.$name.'</p>
  <p>Please enter below OTP to verify your Email id.</p>
  <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$otp.'</h2>
  <p style="font-size:0.9em;">Regards,<br />Your Brand</p>
  <hr style="border:none;border-top:1px solid #eee" />
  <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
    <p>Your Brand Inc</p>
    <p>1600 Amphitheatre Parkway</p>
    <p>California</p>
  </div>
</div>
</div>
</body>
</html>';

try{
  foreach($_POST as $key => $value){
    if(isset($fields[$key])){
      $emailText.="$fields[$key]: $value\n";
    }
  }
 if( mail($sendTo,$subject,$emailText, "From:" .$from)){
  $otpsql=mysqli_query($conn,"SELECT * FROM otp where email='$email'");
  $otprow=mysqli_fetch_assoc($otpsql);
  $emailotp=$otprow['email'];
   if($emailotp==$email){
    $sql=mysqli_query($conn,"UPDATE `otp` SET `otp`='$otp' WHERE email='$email'");
   }
   else{
  $sql=mysqli_query($conn,"INSERT INTO `otp`(`document_no`, `email`, `otp`) VALUES ('$exampledno','$email','$otp')");}
   if($sql=1){
     echo "Otp send in your email";    }
   else{
     echo "Something Wrong";
   }
 }else{
    echo "eeee $sendTo $subject $emailText $from";
 }
}
catch(\Exception $e){
  echo "not done";
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
  $encode=json_encode($responseArray);
  header('content-Type: application/json');
  echo $encoded;
}
else{
  echo $responseArray['message'];
}
  
}

}
//

?>