<?php
session_start();
if(!isset($_SESSION['aid'])) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin"); 
}
if(!isset($_SESSION['aid'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");

if(isset($_POST['submit']))
    {
        $name = $_POST['name'];

        $sql="INSERT INTO `subject`(`name`) VALUES ('$name')";
        if (mysqli_query($conn, $sql)){
          echo "<script> alert ('New record has been added successfully !');</script>";
       }
        else {
          echo "<script> alert ('connection failed !');</script>";
       }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Complaint Subject</title>

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

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
     

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Complaint Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint Subject</li>
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
                                    <h3 class="card-title">Complaint Subject Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post">    
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputdescription">Subject</label>
                                            <input type="textbox" class="form-control" name="name"
                                                id="exampleInputdescription" placeholder="Enter Description">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
</div>
                                </form>
                            </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="card card-primary">
                        <div class="card-body">
                        <div class="row">
                        <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                                <th class="th-sm">Sr.No</th>
                                <th>subject</th>
                               
                              </tr>
                  </thead>
                  <tbody>
                  <?php 
                        
                        $sql=mysqli_query($conn,"select * from subject ");
                        $count=1;
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $arr['name'];?></td>
                                <?php  $count++; } ?> </tbody>
                         </tr>       
                </table>
              </div>
</div>
</div>
</div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
                         
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
