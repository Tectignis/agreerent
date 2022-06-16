<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("../config/config.php");


if(isset($_GET['gen'])){
  $id=mysqli_real_escape_string($conn,$_GET['gen']);
  $sql=mysqli_query($conn,"update noc set `status`='1' where document_no='$id'");
  if($sql=1){
   header("location:case.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | List of Agreement</title>

   
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
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
                            <h1>List of Agreement</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List of Agreement</li>
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
                            <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Enquiry Details</h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Add New Enquiry"><i
                                                        class="fas fa-user-friends mr-2"></i>Create New Agreement</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">Enquiry Details</h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Add New Enquiry"><i
                                                        class="fas fa-user-friends mr-2"></i>Create New Agreement</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- <div class="card-header p-0 border-bottom-0">
<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
</li>
<li class="nav-item">
<a class="nav-link active" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="true">Settings</a>
</li>
</ul>
</div> -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <section id="tabs" class="project-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <nav class="my-3">
                                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="pills-allowances-tab"
                                                                data-toggle="tab" href="#nav-home" role="tab"
                                                                aria-controls="nav-home" aria-selected="true">Pending
                                                                Cases</a>
                                                            <a class="nav-item nav-link" id="nav-profile-tab"
                                                                data-toggle="tab" href="#nav-profile" role="tab"
                                                                aria-controls="nav-profile"
                                                                aria-selected="false">Complete</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-home"
                                                            role="tabpanel" aria-labelledby="nav-home-tab">

                                                            <div class="box-datatable table-responsive">
                                                                <div id="xin_table_expense_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                    <div id="explainClaim_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                              <table id="table_id" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="explainClaim_info">
                                                                              <thead>
                                                                    <tr>
                                                                        <th>S.no</th>
                                                                        <th>Document No</th>
                                                                        <th>Owner Name</th>
                                                                        <th>Tenant Name</th>
                                                                        <th>Date of agreement</th>
                                                                        <th>No of Month</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                                <tbody>
                                                                    <?php
                                        $sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc FROM new_agreement Left join owner on new_agreement.document_no=owner.document_no Left join tenant on new_agreement.document_no=tenant.document_no Left join family_members on new_agreement.document_no= family_members.document_no Left join amenities on new_agreement.document_no=amenities.document_no Left join payment on new_agreement.document_no=payment.document_no Left join property_details on new_agreement.document_no=property_details.document_no group by new_agreement.document_no");
                                        $count='1';
                                        while($row=mysqli_fetch_array($sql)){
$newdoc=$row['newdoc'];
$owdoc=$row['owdoc'];
$tdoc=$row['tdoc'];
$memdoc=$row['memdoc'];
$amdoc=$row['amdoc'];
$pdoc=$row['pdoc'];

if($newdoc!=$owdoc || $newdoc!=$tdoc || $newdoc!=$memdoc || $newdoc!=$amdoc || $newdoc!=$pdoc){

                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $count; ?> </td>
                                                                        <td><?php echo $row['newdoc']; ?></td>
                                                                        <td><?php echo $row['tname']; ?></td>
                                                                        <td><?php echo $row['owname']; ?></td>
                                                                        <td><?php echo $row['newdate']; ?></td>
                                                                        <td><?php echo $row['month']; ?></td>
                                                                        <td style="color:red">Pending</td>
                                                                        <td class="row mx-1">
                                                                        <div class="btn-group btn-group-sm" role="group" aria-label="">
                                                                            <a href="agreement.php?id=<?php echo $row['newdoc'];?>"
                                                                                class="btn btn-primary btn-rounded btn-icon"><i
                                                                                    class="fas fa-eye"></i></a>
                                                                            <a href="edit_newagreement.php?id=<?php echo $row['newdoc'];?>"
                                                                                class="btn btn-warning btn-rounded btn-icon"
                                                                                style="color: aliceblue"><i
                                                                                    class="fas fa-pen"></i></i></a>
                                                                            <!-- <a href="case.php?eid=<?php echo $row['newdoc'];?>"
                                                                                class="btn btn-success btn-rounded btn-icon">
                                                                                Generate NOC</a> -->
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } $count++; } ?>
                                                                </tbody>
                                                                              
                                                                              </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                            aria-labelledby="nav-profile-tab">
                                                            <div class="box-datatable table-responsive">
                                                                <div id="xin_table_expense_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                    <div id="explainClaim_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                              <table id="table_check" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="explainClaim_info">
                                                                              <thead>
                                                                    <tr>
                                                                        <th>S.no</th>
                                                                        <th>Document No</th>
                                                                        <th>Owner Name</th>
                                                                        <th>Tenant Name</th>
                                                                        <th>Date of agreement</th>
                                                                        <th>No of Month</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                                <tbody>
                                                                    <?php
                                        // $sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc FROM new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on tenant.document_no=new_agreement.document_no inner join family_members on family_members.document_no=new_agreement.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join payment on new_agreement.document_no=payment.document_no inner join  property_details on new_agreement.document_no=property_details.document_no group by new_agreement.document_no");


                                         $sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc, noc.status as nstatus, noc.document_no as ndoc from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on tenant.document_no=new_agreement.document_no inner join family_members on family_members.document_no=new_agreement.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join payment on new_agreement.document_no=payment.document_no inner join  property_details on new_agreement.document_no=property_details.document_no inner join noc on new_agreement.document_no=noc.document_no group by new_agreement.document_no");

                                        
                                        $count='1';
                                        while($row=mysqli_fetch_array($sql)){

                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $count; ?> </td>
                                                                        <td><?php echo $row['newdoc']; ?></td>
                                                                        <td><?php echo $row['tname']; ?></td>
                                                                        <td><?php echo $row['owname']; ?></td>
                                                                        <td><?php echo $row['newdate']; ?></td>
                                                                        <td><?php echo $row['month']; ?></td>
                                                                        <td style="color:blue">Complete</td>
                                                                        <td class="row mx-1">
                                                                        <div class="btn-group btn-group-sm" role="group" aria-label="">
                                                                            <a href="agreement.php?id=<?php echo $row['newdoc'];?>"
                                                                                class="btn col btn-primary btn-rounded btn-sm btn-icon"><i
                                                                                    class="fas fa-eye"></i></a>


                                                                            <?php
$status=$row['nstatus'];
if($status==1){
?>

                                                                            <?php
}
elseif($status==0){
?>
                                                                            <a href="edit_newagreement.php?id=<?php echo $row['newdoc'];?>"
                                                                                class="btn col btn-warning btn-rounded btn-sm btn-icon"
                                                                                style="color: aliceblue"><i
                                                                                    class="fas fa-pen"></i></i></a>
                                                                            <a href="case.php?gen=<?php echo $row['newdoc'];?>"
                                                                                class="btn col btn-success btn-sm btn-rounded btn-icon">
                                                                                <i
                                                                                    class="fa fa-file"></i></a>
                                                                                    </div>
                                                                            <?php
                                                                          
}
?>

                                                                        </td>
                                                                    </tr>
                                                                    <?php $count++; } ?>
                                                                </tbody>
                                                                              
                                                                              </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
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
   
   
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->
    <!-- <script src="dist/js/table.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->

</body>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->
<script>
// $(document).ready(function() {
//     $('#table_id').DataTable();
//     $('#table_check').DataTable();
// });

$(function () {
            $("#table_id").DataTable({
                // "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": [   "colvis"]
            }).buttons().container().appendTo('#table_id_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function () {
            $("#table_check").DataTable({
                // "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": [   "colvis"]
            }).buttons().container().appendTo('#table_check_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
</html>