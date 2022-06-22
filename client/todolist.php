<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
}
include("../config/config.php");
if(isset($_POST['submit'])){
	$todo=$_POST['todo'];
  $status=1;
	
	$sql=mysqli_query($conn,"INSERT INTO `todo`(`user_id`, `task`, `status`) VALUES ('".$_SESSION['id']."','$todo','$status')");
	if($sql==1){	
    header("location:table");
	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from todo where id='$id'");
  if($sql=1){
    header("location:table");
  }
}

function get_time_ago( $time )
  {
    $time_difference = time() - $time;
    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );
    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agreerent </title>

    <!-- plugins:css -->
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
        <!-- partial:partials/_navbar.html -->
        <?php include 'include/header.php'; ?>

        <?php include 'include/sidebar.php'; ?>


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Todo List</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Agreement Details</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>


                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <!-- /.card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">To Do List</h4>
                                            <form method="post" action="todolist.php">

                                                <div class="form-group">

                                                    <input type="text" class="form-control" name="todo"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Enter todo">
                                                </div>
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Submit</button>
                                            </form>

                                                        <div class="row my-2">
                                                            <?php                
                                                                    $sql=mysqli_query($conn,"select * from todo where user_id='".$_SESSION['id']."'                    AND status='1'");
                                                                   while($arr=mysqli_fetch_array($sql)){
                                                                   ?>

                                                            <div class="col-6">
                                                                <div class="card">
                                                                    <div class="card-body row">
                                                                  <div class="col-11">
                                                                       <h5 class="card-title">
                                                                        <?php echo $arr['task'];?> 
                                                                       </h5>
                                                                        <small class="badge badge-info" style="margin-left:20px">
                                                                        <i class="far fa-clock">
                                                                        </i>
                                                                        <?php  echo get_time_ago(strtotime($arr['date']) );?>
                                                                          </small>
                                                                    </div>
                                                                        <div class="col-1">
                                                                          <a href="todolist.php?delid=<?php echo $arr['id'] ?>"
                                                                            class="btn btn-tool">
                                                                              <i class="fas fa-trash"></i>
                                                                           </a>
                                                                        </div>
                                                                </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">To Do List</h4>
                                    <form method="post" action="table.php">

                                        <div class="form-group">

                                            <input type="text" class="form-control" name="todo" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter todo">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse todo-list">

                                            <div class="card-body">
                                                <?php                
                                                $sql=mysqli_query($conn,"select * from todo where user_id='".$_SESSION['id']."' AND status='1'");
                                                while($arr=mysqli_fetch_array($sql)){
                                                ?>
                                                <div class="card card-primary card-outline">
                                                    <div class="card-header">
                                                        <h5 class="card-title"> <?php echo $arr['task'];?> </h5>
                                                        <div class="card-tools">
                                                            <a href="table.php?delid=<?php echo $arr['id'] ?>"
                                                                class="btn btn-tool">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?php include 'include/footer.php'; ?>
                <!-- partial -->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
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
    <!-- End custom js for this page-->
</body>

</html>