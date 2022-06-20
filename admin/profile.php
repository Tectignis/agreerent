<?php session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");

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
    <style>
    .card-footer {
        padding: 0px;
        background-color: rgba(0, 0, 0, 0.03);
        border-top: 0 solid rgba(0, 0, 0, 0.125);
    }
    </style>
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
                                <form class="forms-sample" method="post">
                                    <?php
                  $sql=mysqli_query($conn,"select * from users where user_id='".$_SESSION['aid']."'");
                  while($arr=mysqli_fetch_array($sql)){

                  
                  ?>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="exampleaddress" class="col-sm-2 col-form-label">Agent
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo $arr["agent_name"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleaddress" class="col-sm-2 col-form-label">Agent
                                                Email-ID</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo $arr["email"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Office
                                                Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address"
                                                    value="<?php echo $arr["office_address"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleaadhaar" class="col-sm-2 col-form-label">Mobile
                                                No.</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="mobile"
                                                    value="<?php echo $arr["mobile_no"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="examplepan" class="col-sm-2 col-form-label">Rera No.</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="rera"
                                                    value="<?php echo $arr["rera_no"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <?php  } ?>
                                        <!-- <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                        </div> -->
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