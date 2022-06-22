<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
} 

include("../config/config.php");

if(isset($_POST['submit'])){
    $property_for=$_POST['property_for'];
  $client_name=$_POST['client_name'];
	$mobile_no=$_POST['mobile_no'];
  $type=$_POST['type'];
  $requirement=$_POST['requirement'];
  $area=$_POST['area'];
  $location=$_POST['location'];

  $sql=mysqli_query($conn,"INSERT INTO `property`(`property_for`,`client_name`,`mobile_no`,`type`,`requirement`,`area`,`location`) VALUES ('$property_for','$client_name','$mobile_no','$type','$requirement','$area','$location')");
  if($sql==1){	
    header("location:addproperty.php");
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Property</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Enquiry Form</li>
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
                <h3 class="card-title">Add Property</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" style="margin:30px;">
              <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Add Property <label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select class="form-control" name="property_for" id="exampleSelectGender" required>
                        <option value="" disabled selected hidden>select</option>
                          <option>sale</option>
                          <option> Rent</option>
                        </select>
                      </div>
                    </div>
						</div>
					  <div class="col-md-6 ">
              
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Client Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampledno" name="client_name"  placeholder="Enter Name">
                      </div>
                    </div>
						</div>					  
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Mobile No.</label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="examplemob" name="mobile_no"  placeholder="Enter Mobile No">
                      </div>
                    </div>
						</div> 
					   <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Property Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="exampleSelectProperty" name="type">
                          <option>Flat</option>
                          <option>Shop</option>
                        </select>
                      </div>
                    </div>
						</div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Requirement</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplereq" name="requirement"  placeholder="Enter Requirement">
                      </div>
                    </div>
					  </div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Area</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="examplearea" name="area" placeholder="Enter Area">
                      </div>
                    </div>
					  </div> 
                   
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Location</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplelocation"name="location" placeholder="Enter Location">
                      </div>
                    </div>
						</div> 
					  
					  <div class="col" align="right">
            <button type="submit" name="submit" class="btn btn-primary  btn-lg" style="color: aliceblue">Submit<i class="mdi mdi-chevron-right"></i></button>
            </div>
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
<!-- ./wrapper -->
<?php include 'include/footer.php'; ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
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
  $(function () {

  })
</script>
</body>
</html>
