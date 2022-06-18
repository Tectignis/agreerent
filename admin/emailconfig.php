<?php
include("../config/config.php");
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
  header("Location:adminlogin"); 
}
if(isset($_POST['emailSettingSubmit'])){
    
    
    $host=mysqli_real_escape_string($conn,$_POST['host']);
    $port=$_POST['port'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $sql=mysqli_query($conn,"update email_configuration set host='$host',port='$port',email='$email',username='$username',password='$password'");
    if($sql){
        echo "<script>alert('Email Configuration Updated Successfully');</script>";
    }
    else{
        echo "<script>alert('Email Configuration Not Updated');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGREERENT | Add New Enquiry</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
          
        <div class="col-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Setting</a></li>
                <li class="breadcrumb-item active">Email&nbsp;</li>
              </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
    <section class="content"> 
        <div class="row">
          <div class="col-md-12">
          <?php
              $sql=mysqli_query($conn,"select * from email_configuration");
              $arr=mysqli_fetch_array($sql);
              ?>
            <form class="form-horizontal" name="emailSetupForm" id="emailSetupForm" method="post" enctype="multipart/form-data">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Email setup</h3>
                </div>
                <div class="card-body">
                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Host<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" name="host" value="<?php echo $arr['host'] ?>" class="form-control form-control-sm field_validation" id="host" placeholder="Host">
                                    <span id="err_host" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Port<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" name="port" value="<?php echo $arr['port'] ?>" class="form-control form-control-sm field_validation" id="port" placeholder="Port">
                                    <span id="err_port" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                    <input type="email" name="email" value="<?php echo $arr['email'] ?>" class="form-control form-control-sm field_validation" id="email" placeholder="Email">
                                    <span id="err_email" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" name="username" value="<?php echo $arr['username'] ?>" class="form-control form-control-sm field_validation" id="username" placeholder="Username">
                                    <span id="err_username" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                    <input type="password" name="password" value="<?php echo $arr['password'] ?>" class="form-control form-control-sm field_validation" id="password" placeholder="Password">
                                    <span id="err_password" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                            
                  
                </div>
                <div class="card-footer">
                  <input type="hidden" name="csrf_zivaan_pro" value="197b0229e477297725c32613d266abde">
                  <button type="submit" id="emailSettingSubmit" name="emailSettingSubmit" class="btn btn-info" data-tt="tooltip" title="" data-original-title="Click here to Save">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>

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
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
