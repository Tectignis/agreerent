<?php 
include('config/config.php');

if(isset($_POST['submit']))
{

	$document_no=$_POST['document_no'];
	$date_of_agreement=$_POST['date_of_agreement'];
	$type=$_POST['type'];
	$month=$_POST['month'];
  $place=$_POST['place'];
$sql="INSERT INTO `new_agreement`(`document_no`,`date_of_agreement`,`property_type`,`no_of_month`, `place_of_agreement`) VALUES ('$document_no','$date_of_agreement','$type','$month','$place')";
$result=mysqli_query($conn,$sql);
if($result){
  echo "<script>alert('Agreement Created Successfully');</script>";
}
else{
  echo "<script>alert('Agreement Not Created');</script>";
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Kanban Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/faq.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v1
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Tabbed IFrame Plugin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Agreement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create New Agreement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" name="companySettingForm" id="companySettingForm" method="post" enctype="multipart/form-data">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="pt-2 px-3"><h3 class="card-title">New Agreement</h3></li>
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-basic-details" data-toggle="pill" href="#custom-tabs-basic-details" role="tab" aria-controls="custom-tabs-company-setting" aria-selected="true">Basic Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-owner-details" data-toggle="pill" href="custom-tabs-owner-details" role="tab" aria-controls="custom-tabs-owner-details" aria-selected="false">Owner Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-bank-details-tab" data-toggle="pill" href="#custom-tabs-tenant-details" role="tab" aria-controls="custom-tabs-bank-details" aria-selected="false">Tenant Details</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-property" data-toggle="pill" href="#custom-tabs-property" role="tab" aria-controls="custom-tabs-financial-year-setting" aria-selected="false">Property</a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-members" data-toggle="pill" href="#custom-tabs-members" role="tab" aria-controls="custom-tabs-term-and-condition" aria-selected="false">Family Members</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-witness" data-toggle="pill" href="#custom-tabs-witness" role="tab" aria-controls="custom-tabs-logo-and-favicon" aria-selected="false">Witness</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-amenities" data-toggle="pill" href="#custom-tabs-amenities" role="tab" aria-controls="custom-tabs-currency" aria-selected="false">Amenities</a>
                    </li>
					<li class="nav-item">
                      <a class="nav-link" id="custom-tabs-payment" data-toggle="pill" href="#custom-tabs-payment" role="tab" aria-controls="custom-tabs-currency" aria-selected="false">Payment</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  
                                   <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-document_no" role="tabpanel" aria-labelledby="custom-tabs-document_no">
                      <div class="form-group row">
                        <label for="inputtext" class="col-sm-2 col-form-label">Document no.<span class="text-danger">*</span></label>
                        
                        <div class="col-sm-4">
                          <input type="text" name="document_no" value="" class="form-control form-control-sm field_validation" id="document_no" placeholder="Document No">                          <span id="err_document_no" class="error invalid-feedback"><!--  --></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date of Agreement<span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                          <input type="date" name="date_of_agreement"  class="form-control form-control-sm field_validation" id="date" placeholder="Date of Agreement">                          <span id="err_date" class="error invalid-feedback"><!--  --></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputtext2" class="col-sm-2 col-form-label">Property<span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                  <select class="form-control form-control-sm field_validation" name="type" id="exampleSelectRounded0">
                    <option>Flat</option>
                    <option>Shop</option>
                  </select>
                        </div>
                      </div>
						<div class="form-group row">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Total No. Of Months<span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                  <select class="form-control form-control-sm field_validation" name="month" id="exampleSelectRounded1">
                    <option>11</option>
                    <option>22</option>
					<option>36</option>
                  </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Place of Agreement<span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="place" class="form-control form-control-sm field_validation" id="address" placeholder="Place of Agreement">
                          <span id="err_address" class="error invalid-feedback"><!--  --></span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-owner-details1" role="tabpanel" aria-labelledby="custom-tabs-owner-details">
                      <div class="form-group row">
                        <label for="inputtext4" class="col-sm-2 col-form-label">Full Name<span class="text-danger">*</span></label>
                         <div class="col-sm-1">
                  <select class="form-control form-control-sm field_validation" id="exampleSelectRounded2">
                    <option>Mr.</option>
                    <option>Mrs.</option>
					<option>Miss</option>
                  </select>
                        </div>                          
						  <div class="col-sm-4">
							<input type="text" name="address" class="form-control form-control-sm field_validation" id="fullname" placeholder="Full Name">
                          <span id="err_fullname" class="error invalid-fullname"><!--  --></span>
                        </div>                       
                      </div>
                      <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-5">
                          <input type="text" name="age" value="55" class="form-control form-control-sm" id="age" placeholder="Enter Owner Age">
                          <span id="err_age" class="error invalid-age"></span>
                        </div>
                      </div>
						<div class="form-group row">
                        <label for="inputmobile" class="col-sm-2 col-form-label">Mobile No.<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <input type="phone" name="owner_mobile" class="form-control form-control-sm field_validation" id="owner_mobile" placeholder="Mobile No.">
                        </div>
                      </div>                      
					  <div class="form-group row">
                        <label for="inputEmail2" class="col-sm-2 col-form-label">Aadhaar Card No.<span class="text-danger">*</span></label>             
                        <div class="col-sm-5">
                          <input type="number" name="aadhaar_no" class="form-control form-control-sm field_validation" id="aadhaar_no" placeholder="Firm Name">                          <span id="err_aadhaar_no" class="error invalid-aadhaar_no"><!--  --></span>
                        </div>
                      </div>					  
					  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pancard No.<span class="text-danger">*</span></label>
                      
                        <div class="col-sm-5">
						<input type="text" id="pan_no" class="form-control form-control-sm field_validation" name="pan_no" placeholder="PAN No." maxlength="10" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" title="Please enter valid PAN number. E.g. AAAAA9999A"/>
                                                <span id="err_pan_no" class="error invalid-pan_no"><!--  --></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <input type="text" name="address"  class="form-control form-control-sm field_validation" id="owner_address" placeholder="Enter Owner Address">   <span id="err_email" class="error invalid-address"><!--  --></span>
                        </div>
                      </div>
                    </div>
                      
                    <!-- <div class="tab-pane fade" id="custom-tabs-financial-year-setting" role="tabpanel" aria-labelledby="custom-tabs-financial-year-setting-tab">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Financial Year From<span class="text-danger">*</span></label>
                        <div class="col-sm-2">
                         <select class="form-control form-control-sm select2bs4 field_validation" value="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined property: stdClass::$financial_year_from_month</p>
<p>Filename: settings/company_setting.php</p>
<p>Line Number: 207</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/views/settings/company_setting.php<br />
			Line: 207<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/controllers/Settings.php<br />
			Line: 152<br />
			Function: view			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>" name="financial_year_from_month" id="financial_year_from_month" width="50%">
                            <option value="">Select year</option>
                                                          <option value="1"
                                                              >
                                January                              </option>
                                                          <option value="2"
                                                              >
                                February                              </option>
                                                          <option value="3"
                                                              >
                                March                              </option>
                                                          <option value="4"
                                                              >
                                April                              </option>
                                                          <option value="5"
                                                              >
                                May                              </option>
                                                          <option value="6"
                                                              >
                                June                              </option>
                                                          <option value="7"
                                                              >
                                July                              </option>
                                                          <option value="8"
                                                              >
                                August                              </option>
                                                          <option value="9"
                                                              >
                                September                              </option>
                                                          <option value="10"
                                                              >
                                October                              </option>
                                                          <option value="11"
                                                              >
                                November                              </option>
                                                          <option value="12"
                                                              >
                                December                              </option>
                                                      </select>
                          <span id="err_financial_year_from_month" class="error invalid-feedback"></span>
                        </div>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm select2bs4 field_validation" value="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined property: stdClass::$financial_year_from_year</p>
<p>Filename: settings/company_setting.php</p>
<p>Line Number: 227</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/views/settings/company_setting.php<br />
			Line: 227<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/controllers/Settings.php<br />
			Line: 152<br />
			Function: view			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>" name="financial_year_from_year" id="financial_year_from_year" width="50%">
                            <option value="">Select year</option>
                                                          <option value="2023"
                                                              >
                                2023                              </option>
                                                          <option value="2022"
                                                              >
                                2022                              </option>
                                                          <option value="2021"
                                                              >
                                2021                              </option>
                                                          <option value="2020"
                                                              >
                                2020                              </option>
                                                          <option value="2019"
                                                              >
                                2019                              </option>
                                                          <option value="2018"
                                                              >
                                2018                              </option>
                                                          <option value="2017"
                                                              >
                                2017                              </option>
                                                          <option value="2016"
                                                              >
                                2016                              </option>
                                                          <option value="2015"
                                                              >
                                2015                              </option>
                                                          <option value="2014"
                                                              >
                                2014                              </option>
                                                          <option value="2013"
                                                              >
                                2013                              </option>
                                                      </select>
                          <span id="err_financial_year_from_year" class="error invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Financial Year To<span class="text-danger">*</span></label>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm select2bs4 field_validation" value="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined property: stdClass::$financial_year_to_month</p>
<p>Filename: settings/company_setting.php</p>
<p>Line Number: 250</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/views/settings/company_setting.php<br />
			Line: 250<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/controllers/Settings.php<br />
			Line: 152<br />
			Function: view			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>" name="financial_year_to_month" id="financial_year_to_month" width="50%">
                            <option value="">Select month</option>
                                                          <option value="1"
                                                              >
                                January                              </option>
                                                          <option value="2"
                                                              >
                                February                              </option>
                                                          <option value="3"
                                                              >
                                March                              </option>
                                                          <option value="4"
                                                              >
                                April                              </option>
                                                          <option value="5"
                                                              >
                                May                              </option>
                                                          <option value="6"
                                                              >
                                June                              </option>
                                                          <option value="7"
                                                              >
                                July                              </option>
                                                          <option value="8"
                                                              >
                                August                              </option>
                                                          <option value="9"
                                                              >
                                September                              </option>
                                                          <option value="10"
                                                              >
                                October                              </option>
                                                          <option value="11"
                                                              >
                                November                              </option>
                                                          <option value="12"
                                                              >
                                December                              </option>
                                                      </select>
                          <span id="err_financial_year_to_month" class="error invalid-feedback"></span>
                        </div>
                        <div class="col-sm-2">
                          <select class="form-control form-control-sm select2bs4 field_validation" value="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined property: stdClass::$financial_year_to_year</p>
<p>Filename: settings/company_setting.php</p>
<p>Line Number: 270</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/views/settings/company_setting.php<br />
			Line: 270<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/application/controllers/Settings.php<br />
			Line: 152<br />
			Function: view			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/zivaansolutions/public_html/apps/pro/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>" name="financial_year_to_year" id="financial_year_to_year" width="50%">
                            <option value="">Select year</option>
                                                          <option value="2023"
                                                              >
                                2023                              </option>
                                                          <option value="2022"
                                                              >
                                2022                              </option>
                                                          <option value="2021"
                                                              >
                                2021                              </option>
                                                          <option value="2020"
                                                              >
                                2020                              </option>
                                                          <option value="2019"
                                                              >
                                2019                              </option>
                                                          <option value="2018"
                                                              >
                                2018                              </option>
                                                          <option value="2017"
                                                              >
                                2017                              </option>
                                                          <option value="2016"
                                                              >
                                2016                              </option>
                                                          <option value="2015"
                                                              >
                                2015                              </option>
                                                          <option value="2014"
                                                              >
                                2014                              </option>
                                                          <option value="2013"
                                                              >
                                2013                              </option>
                                                      </select>
                          <span id="err_financial_year_to_year" class="error invalid-feedback"></span>
                        </div>
                      </div>
                    </div> -->
                    <div class="tab-pane fade" id="custom-tabs-term-and-condition" role="tabpanel" aria-labelledby="custom-tabs-term-and-condition-tab">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">
                          Terms &amp; Condition                        </label>
                        
                        <div class="col-sm-4">
                          <textarea class="form-control form-control-sm" rows="5" name="terms_and_condition" id="terms_and_condition" placeholder="Terms &amp; Condition">1. Subject to Ahmedabad Jurisdiction
2. Our responsibility ceases as soon as the goods leave our premises.
3. Goods once sold will not be taken back.
4. Delivery ex-premises.</textarea>
                          <span id="err_terms_and_condition" class="error invalid-feedback"></span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-logo-and-favicon" role="tabpanel" aria-labelledby="custom-tabs-logo-and-favicon-tab">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="logo" name="logo">
                            <label class="custom-file-label" for="logo">Choose file</label>
                          </div>
                                                  </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Favicon</label>
                        <div class="col-sm-4">
                         <!--  <input type="file" name="favicon" class="form-control form-control-sm" id="favicon"> -->
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="favicon" name="favicon">
                            <label class="custom-file-label" for="favicon">Choose file</label>
                          </div>
                                                  </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-currency" role="tabpanel" aria-labelledby="custom-tabs-currency-tab">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">
                          Default Currency                          <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-4">
                          <select class="form-control form-control-sm select2bs4 field_validation select2-hidden-accessible" name="currency_id" id="currency_id" width="100%" placeholder="Default Currency" tabindex="-1" aria-hidden="true" data-select2-id="currency_id">
                            <option value="">Default Currency</option>
                                                          <option value="16">
                                Brasil                              </option>
                                                          <option value="17">
                                Uganda                              </option>
                                                          <option value="18" selected="" data-select2-id="1196">
                                Rupee                              </option>
                                                      </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1195" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currency_id-container"><span class="select2-selection__rendered" id="select2-currency_id-container" role="textbox" aria-readonly="true" title="
                                Rupee                              ">
                                Rupee                              </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                          <span id="err_currency_id" class="error invalid-feedback"></span>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="custom-tabs-financial-year" role="tabpanel" aria-labelledby="custom-tabs-financial-year-tab">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Financial Year From<span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                         <select class="form-control form-control-sm select2bs4 field_validation" name="financial_year" id="financial_year" width="50%">
                            <option value="">Select year</option>
                                                          <option value="2022"
                                 selected                              >
                                2021-2022                              </option>
                                                          <option value="2021"
                                 selected                              >
                                2020-2021                              </option>
                                                          <option value="2020"
                                                              >
                                2019-2020                              </option>
                                                          <option value="2019"
                                                              >
                                2018-2019                              </option>
                                                      </select>
                          <span id="err_financial_year" class="error invalid-feedback"></span>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="card-footer">
                  <input type="hidden" name="agreement_details" value="">
                  <button type="submit" name="submit" id="details" class="btn btn-info" data-tt="tooltip" title="" data-original-title="Click here to Save">Save as Draft</button>&nbsp;
				  <button type="submit" name="submit" id="next" class="btn btn-info" data-tt="tooltip" title="" data-original-title="Click here to Save">Next</button>
                </div>
                <!-- /.card -->
              </div>
            </form>
          </div>
        </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
