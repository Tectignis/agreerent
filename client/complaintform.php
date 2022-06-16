<?php
session_start();
$email = $_SESSION['email'];
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
}
$client_id=$_SESSION['id'];
include("../config/config.php");
if(isset($_POST['submit'])){
  $subject=$_POST['subject'];
	$description=$_POST['description'];
$client_code=$_POST['number'];
	date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d H:i:s');
	$sql = mysqli_query($conn,"INSERT INTO `ticket`( `user_id`,`complaint_code`, `email_id`, `subject`, `description`, `date`) VALUES ('".$_SESSION['id']."','$client_code','$email', '$subject','$description','$date')") ;
  if($sql==1){
    echo "<script>alert('Register successfully'),window.location='listofcomplaint.php';</script>";
   

  }else{
    echo "<script>alert('something went wrong');</script>";
  }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Complaint Form</title>

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
                            <h1>Complaint Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint Form</li>
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
                                    <h3 class="card-title">Complaint Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post">
                                    <?php $sql=mysqli_query($conn,"select * from ticket where user_id='".$_SESSION['id']."'");
                      $dnk=mysqli_num_rows($sql);
                      $lastid=$dnk+1;
                     
                      
                      $res= preg_replace('~\S\K\S*\s*~u', '', $first);
                      if(empty($lastid)){
						           $number="ARCN-000";
					           }else{
						          $id=str_pad($lastid + 0, 3,0, STR_PAD_LEFT);
					        	  $number=$res."ARCN"."-$id";
					            }	
                    
                      
                      					  ?>

                                    <div class="card-body">
                                        <div class="form-group" style="display:none">
                                            <label for="exampleInputdescription">Description</label>
                                            <input type="textbox" class="form-control" name="number"
                                                id="exampleInputdescription" value="<?php echo $number; ?>"
                                                placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputsubject">Subject</label>
                                            <label for="exampleInputsubject">Subject</label>
                                            <?php 
                   $query=mysqli_query($conn,"select * from subject");
                   ?>
 
                       <select class="form-control select2" name="subject" style="width: 100%;" required>
                         <option value="" selected="selected" disabled >select</option>
                         <?php
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>

                         <option value="<?php echo $sql['name']; ?>"> <?php echo $sql['name']; ?></option>
                         <?php } ?>
                       </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputdescription">Description</label>
                                            <input type="textbox" class="form-control" name="description"
                                                id="exampleInputdescription" placeholder="Enter Description">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    <script>

        </script>
</body>

</html>