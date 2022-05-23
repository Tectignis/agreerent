
<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("config/config.php");
if(isset($_POST['submit'])){
	$todo=$_POST['todo'];
  $status=1;
	
	$sql=mysqli_query($conn,"INSERT INTO `todo`(`user_id`, `task`, `status`) VALUES ('".$_SESSION['id']."','$todo','$status')");
	if($sql==1){	
    header("location:todo.php");
	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from todo where id='$id'");
  if($sql=1){
    header("location:todo.php");
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
            <h1>TO DO LIST</h1>
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
          <div class="card-header">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <form>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header d-flex">
                
               
                <input type="text" class="form-control" name="todo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter todo">
                <div class="card-tools">
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
                </div>
                <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list">
                        <?php 
                        
                        $sql=mysqli_query($conn,"select * from todo where user_id='".$_SESSION['id']."' AND status='1'");
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <li>
                          <div class="form-check"style="width: -webkit-fill-available;">
                              <label> <?php echo $arr['task'];?> <i class="input-helper"></i></label>
                          </div>
                                                    <a href="todo.php?delid=<?php echo $arr['id'] ?>"><i class="remove mdi mdi-close-circle-outline"></i></a>

                         
                        </li>
                         <?php } ?>
                      </ul>
                         </div>
              </div>
             
            </div>
          </div>
                         </form>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Create first milestone</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#5</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
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
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

  })
</script>
</body>
</html>
