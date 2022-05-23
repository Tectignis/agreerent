<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGREERENT | Enquiry Details</title>

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
            <h1>Enquiry Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry Details</li>
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
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="" data-tt="tooltip" title="" data-original-title="Click here to Add New Enquiry"><i class="fas fa-user-friends mr-2"></i>Add New Enquiry</a>
                  </li>
                </ul>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No</th>
                    <th>Client Name</th>
                    <th>Mobile No.</th>
					<th>Email ID</th>
                    <th>Description</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Gecko</td>
                    <td>Camino 1.0</td>
                    <td>OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
					<td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Camino 1.5</td>
                    <td>OSX.3+</td>
                    <td>1.8</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Netscape 7.2</td>
                    <td>Win 95+ / Mac OS 8.6-9.2</td>
                    <td>1.7</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Netscape Browser 8</td>
                    <td>Win 98SE+</td>
                    <td>1.7</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Netscape Navigator 9</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.0</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.1</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.1</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.2</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.2</td>
                    <td>A</td>
					  <td>
						<table>
							<tbody>
								<tr>
                          <td class="p-2">
                            <a href="" class="btn btn-info btn-xs" data-tt="tooltip" title="" data-original-title="Edit Customer">
                              <i class="fas fa-edit"></i>
                            </a>      
                          </td>
									<td class="p-2">
                            <a href="#" data-toggle="modal" data-target="#delete_customer" data-tt="tooltip" title="" class="btn btn-danger btn-xs delete_customer" data-original-title="Delete Customer">
                              <i class="fas fa-trash"></i>
                            </a>
									</td>
								</tr>
							</tbody>
						</table>
					  </td>
                  </tr>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr. No</th>
                    <th>Client Name</th>
                    <th>Mobile No.</th>
					<th>Email ID</th>
                    <th>Description</th>
					<th>Action</th>
                  </tr>
                  </tfoot>
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
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>
