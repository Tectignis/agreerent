<?php  
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("../config/config.php");

$res=mysqli_query($conn,"SELECT * FROM `email_configuration`");
 $row=mysqli_fetch_array($res);	

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

$from = 'Enquiry <'.$email.'>';
$sendTo = 'Enquiry <'.$email_no.'>';
$subject = 'Password';
$fields = array( 'name' => 'name' );
$from = 'MIME-Version: 1.0' . "\r\n";
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

div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

img {
    -ms-interpolation-mode:bicubic;
}

a {
    text-decoration: none;
}

*[x-apple-data-detectors], 
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

.im {
    color: inherit !important;
}

img.g-img + div {
    display: none !important;
}


@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>
    <style>

	    .primary{
	background: #17bebb;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #f7fafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

.btn{
	padding: 10px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #A800BF;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}
.btn-custom{
	color: rgba(0,0,0,.3);
	text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
	font-family: "Poppins", sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: "Poppins", sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0 0 0 / 60%);
}

a{
	color: #A800BF;
}

table{
}

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #A800BF;
	font-size: 24px;
	font-weight: 700;
	font-family: "Poppins", sans-serif;
}

.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 34px;
	margin-bottom: 0;
	font-weight: 200;
	line-height: 1.4;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #000;
}

.text-author{
	bordeR: 1px solid rgba(0,0,0,.05);
	max-width: 50%;
	margin: 0 auto;
	padding: 2em;
}
.text-author img{
	border-radius: 50%;
	padding-bottom: 20px;
}
.text-author h3{
	margin-bottom: 0;
}
ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}


.footer{
	border-top: 1px solid rgba(0,0,0,.05);
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td class="logo" style="text-align: center;">
			            <h1><a href="#">AGREERENT</a></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
            		<td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
            			<div class="text">
							<h3>Hello <b>'.$agent_name.'</b></h3>
            				<h3>Congratulation your account has been Activated Successfully.</h3>
            			</div>
            		</td>
            	</tr>
            	<tr>
			          <td style="text-align: center;">
			          	<div class="text-author">
				          	<img src="images/person_2.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin: auto; display: block;">
				          	<h3 class="name">'.$agent_name.'</h3>
				          	<span class="position">Firm Name</span>
							<p>Client Code&nbsp;:&nbsp;<b>Client Code</b><br>Username&nbsp;:&nbsp;<b>'.$email_no.'</b><br>Password&nbsp;:&nbsp;<b>'.$pass.'</b></p> 
				           	<p><a href="https://www.agreerent.in/client/" class="btn btn-primary">Login Now</a></p>
				           	<p><a href="https://www.agreerent.in/" class="btn-custom">Visit Our Website</a></p>
							
			           	</div>
			          </td>
			        </tr>
            </table><br>
		<h4 class="position" align="center">for any query feel free to email us<br><a href="mailto: support@agreerent.in"> support@agreerent.in</a></h4>			  
          </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
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
//   $passwordhash=password_hash($pass,PASSWORD_BCRYPT);

//   $sql=mysqli_query($conn,"INSERT INTO `agent_details`(`user_id`,`agent_name`, `email`, `password`, `rera_no`, `office_address`,`mobile_no`,`status`) 
//    VALUES ('$user_id','$agent_name','$email_no','$passwordhash','$rera','$office_address','$mobile_no','$status')");
//    if($sql=1){
//      echo "<script>alert('Agent Registered Successfully');</script>";    }
//    else{
//      echo "<script>alert('Something Wrong');</script>";
//    }
 echo "<script>alert('Agent Registered Successfully');</script>"; 
 }
 else{
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




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'include/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Profile</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="forms-sample" method="post" enctype="multipart/form-data"
                                    style="margin:30px;">

                                    <div class="form-group row">
                                        <label for="exampledno" class="col-sm-2 col-form-label">Code No.<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <?php $sql=mysqli_query($conn,"select id from agent_details order by user_id desc") or die( mysqli_error($conn));;
              $row=mysqli_fetch_array($sql);
              $lastid=$row['id'];
              if(empty($lastid)){
                  $number="001";
              }else{
                  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
                  $number="AR".$id;
              }					
                                    ?>
                                            <input type="text" name="no" value="<?php echo $number; ?>"
                                                class="form-control" id="exampledno" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="exampleaddress" class="col-sm-2 col-form-label">Consultant
                                            Name<label style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Office
                                            Address<label style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="office_address" style="width:100%;" rows="2"
                                                placeholder="Enter Address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleaadhaar" class="col-sm-2 col-form-label">Mobile No.<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="examplemob" name="mobile_no"
                                                placeholder="Enter Mobile Number" minlength="10" maxlength="10"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleemail" class="col-sm-2 col-form-label">Email ID<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email ID" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="examplepan" class="col-sm-2 col-form-label">Rera No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="rera"
                                                placeholder="Enter Number" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
              <label for="examplepan" class="col-sm-2 col-form-label">Document Prefix<label style="color:Red">*</label></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="TECT-00001" name="prefix">
              </div>
            </div> -->


                                    <div class="form-group row">
                                        <label for="examplepan" class="col-sm-2 col-form-label">Photo<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file">
                                            <!-- <a href="upload_image.php" class="btn btn-success"> Upload</a>  -->
                                        </div>
                                    </div>

                                    <div class="col" align="right">
                                        <button type="submit" name="sub" class="btn btn-primary  btn-lg"
                                            style="color: aliceblue">Submit</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'include/footer.php'; ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
    $(function() {
        bsCustomFileInput.init();
    });
    </script>
</body>

</html>