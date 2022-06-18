<?php
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin"); 
}
include("../config/config.php");

if(isset($_POST['submit'])){
    $client_name=$_POST['client_name'];
    $firm_name=$_POST['firm_name'];
    $mobile_no=$_POST['mobile_no'];
    $type=$_POST['type'];
    $requirement=$_POST['requirement'];
    $area=$_POST['area'];
    $location=$_POST['location'];


    $sql = mysqli_query($conn,"INSERT INTO `leads`(`user_id`,`client_name`, `mobile`, `type`, `requirement`, `area`,`location`,`firm_name`) VALUES ('".$_SESSION['id']."','$client_name','$mobile_no', '$type','$requirement','$area','$location','$firm_name')");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Send Ledas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- Theme style -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.css"> -->
  <!-- <link rel="stylesheet" href="dist/css/style.css"> -->
       <!-- Select2 -->
   <!-- <link rel="stylesheet" href="plugins/select2/css/select2.min.css"> -->
   <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                        
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">paid leads</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Send Leads</h3>
                                </div>


                                <div class="card-body">
                                <form class="forms-sample" method="post">
            
					  <div class="col-md-6 ">
            <div class="form-group row">
                                                <label for="exampledno" class="col-sm-3 col-form-label">Firm
                                                    Name<label style="color:Red">*</label></label>
                                                    <div class="col-sm-9">
                                                    <?php 
                  $query=mysqli_query($conn,"select * from agent_details");
                
                  ?>


                      <select class="form-control select2" name="firm_name" style="width: 100%;">
                        <option selected="selected">select</option>
                        <?php
                   while($sql=mysqli_fetch_array($query))
                   {
                     ?>


                        ?>

                        <option value="<?php echo $sql['agent_name']; ?>"> <?php echo $sql['agent_name'].' - '.$sql['user_id']; ?></option>
                        <?php } ?>
                      </select>
                                                    <!-- <select class="form-control select2 select2-hidden-accessible" name="client_name" id="exampledno" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="4">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-checkselec-container"><span class="select2-selection_rendered" id="select2-checkselec-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection_arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                                                </div>
                                            </div>
						</div>					  
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="example" class="col-sm-3 col-form-label">Client Name<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="example" name="client_name" placeholder="Enter Client Name"  required>
                      </div>
                    </div>
						</div>

            <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Mobile No.<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="examplemob" name="mobile_no" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required>
                      </div>
                    </div>
						</div>


					   <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Property Type<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="exampleSelectProperty" name="type" required>
                          <option>Flat</option>
                          <option>Shop</option>
                        </select>
                      </div>
                    </div>
						</div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Requirement<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplereq" name="requirement" placeholder="Enter Requirement" required>
                      </div>
                    </div>
					  </div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Area<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="examplearea"name="area" placeholder="Enter Area" required>
                      </div>
                    </div>
					  </div> 
                   
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Location<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplelocation"name="location" placeholder="Enter Location" reqired>
                      </div>
                    </div>
						</div> 
					  </div>
					  <div class="card-footer" >
                    <button type="submit" name="submit" id="sub" class="btn btn-primary  btn-lg" style="color: aliceblue">Submit<i class="mdi mdi-chevron-right"></i></button>
                    </div>
                  </form>


                    </div>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    
    </script>
</body>

</html>