<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
}
include("../config/config.php");

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from agent_details where id='$id'");
  if($sql=1){
    header("location:consultantlist.p");
  }
}


if(isset($_POST['submit'])){
	$status=$_POST['status'];
    $aid=$_POST['aid'];
	$sql=mysqli_query($conn,"UPDATE `agent_details` SET `status`='$status' WHERE user_id='$aid'");
  
	if($sql==1){	
    header("location:consultantlist");
	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | To Do List</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'include/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper kanban">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>Consultant List</h1>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">To Do List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">

                <div class="card card-primary">
                    <?php 
                        $aid1='';
                        $sql=mysqli_query($conn,"select * from agent_details");
                        $count=1;
                        ?>

                    <div class="card-header">
                        <h3 class="card-title">
                            To Do
                        </h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Agent Code</th>
                                <th>Name</th>
                                <th>Moile No</th>
                                <th>Email id</th>
                                <th>Rera No</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <?php while($arr=mysqli_fetch_array($sql)){
                             $aid1=$arr['user_id'];
                        ?>
                        <tbody>
                            <tr>

                                <td><?php echo $count;?></td>
                                <td><?php echo $arr["user_id"]; ?></td>
                                <td><?php echo $arr["agent_name"]; ?></td>
                                <td><?php echo $arr["mobile_no"]; ?></td>
                                <td><?php echo $arr["email"]; ?></td>
                                <td><?php echo $arr["rera_no"]; ?></td>
                                <?php if($arr['status']=='0'){
                    
                    ?>
                                <td><span class="badge badge-danger">Suspended</span>
                                    <button type="button" class="btn btn-default fetchid" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-wrench"></i>
                                    </button>

                                </td>
                                <?php }else{
                        ?>
                                <td><span class="badge badge-success">Active</span> <button type="button"
                                        class="btn btn-default fetchid" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-wrench"></i>
                                    </button></td>

                                <?php
                    }
                    
                    
                                    ?>


                                <td>
                                    <a href="agentprof.php?edit=<?php echo $arr['status'] ?>"><button type="button"
                                            class="btn btn-primary  btn-md" style="color: aliceblue"> <i
                                                class="fas fa-pen"></i> </button></a>
                                    <a href="consultantlist.php?delid=<?php echo $arr['id'] ?>"><button type="button"
                                            class="btn btn-danger  btn-md" style="color: aliceblue"> <i
                                                class="fas fa-trash"></i> </button></a>
                                </td>
                                <!-- <button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-file-pdf"></i> </button>-->
                            </tr>
                        </tbody>
                        <?php $count++;} ?>

                    </table>

                </div>

        </div>
        <?php
        ?>


        <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agent Status</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">

                            <div class="row">


                                <div class="form-group col-12">
                                    <label>Change Agent Status</label>
                                    <select class="form-control" name="status">

                                        <option value="0">Deactivate</option>
                                        <option value="1">Activate</option>

                                    </select>
                                </div>
                                <input type="text" name="aid" class="category" hidden>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>

            </div>

        </div>

        </section>

    </div>

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
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Filterizr-->
    <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
    $(function() {

    })
    </script>
    <script>
    $(document).ready(function() {
        $(".fetchid").on('click', function() {
            let category = $(this).closest("tr").find("td:nth-child(2)").text().trim();
            $(".category").val(category);
        });

    });
    </script>
</body>

</html>