<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include('config/config.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGREERENT | Police Noc</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>POLICE NOC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Police Noc</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Enquiry Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                                <th class="th-sm">Sr.No</th>
                                <th>Document No</th>
                                <th>Owner Name</th>
                                <th>Tenant Name</th>
                                <th>Date of Agreement</th>
                                <th> Action </th>
                              </tr>
                  </thead>
                  <tbody>

                            <?php 

                        if(isset($_GET['search'])){

                          $filterval =  $_GET['search'];
                          $sql = "select new_agreement.date_of_agreement as doa,new_agreement.document_no as did, tenant.fullname as tname, tenant.mobile as tmobile, noc.status as nstatus, noc.document_no as nodc, owner.fullname as oname, owner.mobile as omobile from new_agreement inner join tenant on tenant.document_no=new_agreement.document_no inner join owner on owner.document_no=new_agreement.document_no inner join noc on noc.document_no=new_agreement.document_no Where noc.status='1' AND CONCAT(new_agreement.document_no) LIKE '%$filterval%'";
                          $count=1;
                          
                          $query_run = mysqli_query($conn, $sql);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                   <td><?php echo $count; ?></td>
                                                    <td><?= $items['did']; ?></td>
                                                    <td><?= $items['oname']; ?></td>
                                                    <td><?= $items['tname']; ?></td>
                                                    <td><?= $items['doa']; ?></td>
                                                    <td>
                                          <a href="policenocform.php?id=<?php echo $arr['did'] ?>"><button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-eye"></i> </button></a>
                                          </td>
                                        
                                                              </tr>
                                                <?php
                                            }
                                          }
                                        }else
                                        {
                                            
                                          $qer=mysqli_query($conn,"select new_agreement.date_of_agreement as doa,new_agreement.document_no as did, tenant.fullname as tname, tenant.mobile as tmobile, noc.status as nstatus, noc.document_no as nodc, owner.fullname as oname, owner.mobile as omobile from new_agreement inner join tenant on tenant.document_no=new_agreement.document_no inner join owner on owner.document_no=new_agreement.document_no inner join noc on noc.document_no=new_agreement.document_no Where noc.status='1'");
                                          $count=1;
                                          while($arr=mysqli_fetch_array($qer)){
                                            ?>
                                                <tr>
                                                <td> <?php echo $count;?></td>
                                                <td> <?php echo $arr['did'];?> </td>
                                                <td> <?php echo $arr['oname'];?></td>
                                                <td> <?php echo $arr['tname'];?></td>
                                                <td> <?php echo $arr['doa'];?> </td>
                                                <td>
                                                <a href="policenocform.php?id=<?php echo $arr['did'] ?>"><button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="fas fa-eye"></i> </button></a>
                                                  <!-- <button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-file-pdf"></i> </button>--></td>
                                              </tr>
                                    <?php
                                              $count++;}
                                        }
                                
                                          ?>
                                          </tbody>
                </table>
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
<!-- AdminLTE App -->
<script src="dist/js/table.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->

</body>
</html>
