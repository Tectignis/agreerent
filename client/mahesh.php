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

$from = 'Enquiry <'$email_no'>';
$sendTo = 'Enquiry <'$email'>';
$subject = 'Password';
$fields = array( 'name' => 'name' );

try{
 

$emailText = "Welcome $agent_name.
   Welcome to Agreerent. We’re confident that Agreerent will help you to get the best deal for your property. Your Email ID is :- '$email_no'
  Your Password is :- '$pass'.
  Please login with Registerd Email and Password
  Thanks & Regards,
Tectignis IT Solution
Aashiyana CHS Shop No 05, Sector 11, Plot No 29, Kamothe, Navi Mumbai, Maharashtra 410206";

  foreach($_POST as $key => $value){
    if(isset($fields[$key])){
      $emailText.="$fields[$key]: $value\n";
    }
  }
 if( mail($sendTo,$subject,$emailText, "From:" .$from)){
  $passwordhash=password_hash($pass,PASSWORD_BCRYPT);

  $sql=mysqli_query($conn,"INSERT INTO `agent_details`(`user_id`,`agent_name`, `email`, `password`, `rera_no`, `office_address`,`mobile_no`,`status`) 
   VALUES ('$user_id','$agent_name','$email_no','$passwordhash','$rera','$office_address','$mobile_no','$status')");
   if($sql=1){
     echo "<script>alert('Agent Registered Successfully');</script>";    }
   else{
     echo "<script>alert('Something Wrong');</script>";
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