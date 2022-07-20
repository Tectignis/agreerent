<?php
session_start();
$_SESSION['aid'];
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin.php"); 
}
if(!isset($_SESSION['aid'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");


if(isset($_GET['delid'])){
    $id=mysqli_real_escape_string($conn,$_GET['delid']);
    $sql=mysqli_query($conn,"delete from todo where id='$id'");
    if($sql=1){
      header("location:index");
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Dashboard</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<?php include 'include/header.php'; ?>
<!-- Main Sidebar Container -->
<?php include 'include/sidebar.php'; ?>
<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Dashboard</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</div>
</div>
</div>
</div>


<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<?php
                               $query=mysqli_query($conn,"select * from agent_details");
                                $count1=mysqli_num_rows($query);
                            ?>
                                    <h3><?php echo $count1; ?></h3>

                                    <p>No of Agents</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="consultant" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<?php
                                $sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc, noc.status as nstatus, noc.document_no as ndoc from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on tenant.document_no=new_agreement.document_no inner join family_members on family_members.document_no=new_agreement.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join payment on new_agreement.document_no=payment.document_no inner join  property_details on new_agreement.document_no=property_details.document_no inner join noc on new_agreement.document_no=noc.document_no where new_agreement.user_id='".$_SESSION['aid']."' group by new_agreement.document_no");
                                $count=mysqli_num_rows($sql);
                                ?>
                                <h3><?php echo $count; ?></h3>

                                <p>No of Agreement Completed</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="case" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<?php
                                 $sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc FROM new_agreement Left join owner on new_agreement.document_no=owner.document_no Left join tenant on new_agreement.document_no=tenant.document_no Left join family_members on new_agreement.document_no= family_members.document_no Left join amenities on new_agreement.document_no=amenities.document_no Left join payment on new_agreement.document_no=payment.document_no Left join property_details on new_agreement.document_no=property_details.document_no where new_agreement.user_id='".$_SESSION['aid']."' group by new_agreement.document_no");
                                 while($row=mysqli_fetch_array($sql)){
                                 $newdoc=$row['newdoc'];
$owdoc=$row['owdoc'];
$tdoc=$row['tdoc'];
$memdoc=$row['memdoc'];
$amdoc=$row['amdoc'];
$pdoc=$row['pdoc'];


if($newdoc!=$owdoc || $newdoc!=$tdoc || $newdoc!=$memdoc || $newdoc!=$amdoc || $newdoc!=$pdoc){
    $count=mysqli_num_rows($sql);

                                ?>
                                <h3><?php echo $count ?></h3>
<?php } } ?>
                                <p>No of Agreement pending</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="case" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<?php
                                $sqlleads=mysqli_query($conn,"select leads.user_id,leads.id, leads.type,leads.client_name,leads.mobile,agent_details.firm_name from leads inner join agent_details on leads.user_id=agent_details.user_id");
                                $countleads=mysqli_num_rows($sqlleads);
                                ?>
                                <h3><?php echo $countleads; ?></h3>

                                <p>Total Leads</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="paidleads" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>

<!--box-->
<section class="content">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><i class="fa fa-envelope-open-text"></i></span>
<div class="info-box-content">
<?php
                               $query=mysqli_query($conn,"select * from ticket where status = 'Open'");
                                $count1=mysqli_num_rows($query);
                            ?>
                                   
<span class="info-box-text">Open Complaint</span>
<h3><?php echo $count1; ?></h3>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-spinner"></i></span>
<div class="info-box-content">
<?php
                               $query=mysqli_query($conn,"select * from ticket where status = 'In Proccess'");
                                $count1=mysqli_num_rows($query);
                            ?>
                                 
<span class="info-box-text">In Process</span>
<h3><?php echo $count1; ?></h3>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fa-pause"></i></i></span>
<div class="info-box-content">
<?php
                               $query=mysqli_query($conn,"select * from ticket where status = 'Hold On'");
                                $count1=mysqli_num_rows($query);
                            ?>
                                 
<span class="info-box-text">On Hold</span>
<h3><?php echo $count1; ?></h3>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-check"></i></span>
<div class="info-box-content">
<?php
                               $query=mysqli_query($conn,"select * from ticket where status = 'Closed'");
                                $count1=mysqli_num_rows($query);
                            ?>
                                 
<span class="info-box-text">Resloved</span>
<h3><?php echo $count1; ?></h3>
</div>
</div>
</div>
</div>
</section>
<!--box-->


<div class="row">

<section class="col-lg-7 connectedSortable">

<div class="card">
<div class="card-header">
<h3 class="card-title">
<i class="fas fa-chart-pie mr-1"></i>
Sales
</h3>
<div class="card-tools">
<ul class="nav nav-pills ml-auto">
<li class="nav-item">
<!-- <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a> -->
</li>
<li class="nav-item">
<a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="tab-content p-0">

<!-- <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
<canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
</div> -->
<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
<canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
</div>
</div>
</div>
</div>


<div class="card direct-chat direct-chat-primary">
<div class="card-header">
<h3 class="card-title">Direct Chat</h3>
<div class="card-tools">
<span title="3 New Messages" class="badge badge-primary">3</span>
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
<i class="fas fa-comments"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>

<div class="card-body">

<div class="direct-chat-messages">

<div class="direct-chat-msg">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-left">Alexander Pierce</span>
<span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
</div>

<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
Is this template really for free? That's unbelievable!
</div>

</div>


<div class="direct-chat-msg right">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-right">Sarah Bullock</span>
<span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
</div>

<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
You better believe it!
</div>

</div>


<div class="direct-chat-msg">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-left">Alexander Pierce</span>
<span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
</div>

<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
Working with AdminLTE on a great new app! Wanna join?
</div>

</div>


<div class="direct-chat-msg right">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-right">Sarah Bullock</span>
<span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
</div>

<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
I would love to.
</div>

</div>

</div>


<div class="direct-chat-contacts">
<ul class="contacts-list">
<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Count Dracula
<small class="contacts-list-date float-right">2/28/2015</small>
</span>
<span class="contacts-list-msg">How have you been? I was...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Sarah Doe
<small class="contacts-list-date float-right">2/23/2015</small>
</span>
<span class="contacts-list-msg">I will be waiting for...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Nadia Jolie
<small class="contacts-list-date float-right">2/20/2015</small>
</span>
<span class="contacts-list-msg">I'll call you back at...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Nora S. Vans
<small class="contacts-list-date float-right">2/10/2015</small>
</span>
<span class="contacts-list-msg">Where is your new...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
John K.
<small class="contacts-list-date float-right">1/27/2015</small>
</span>
<span class="contacts-list-msg">Can I take a look at...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Kenneth M.
<small class="contacts-list-date float-right">1/4/2015</small>
</span>
<span class="contacts-list-msg">Never mind I found...</span>
</div>

</a>
</li>

</ul>

</div>

</div>

<div class="card-footer">
<form action="#" method="post">
<div class="input-group">
<input type="text" name="message" placeholder="Type Message ..." class="form-control">
<span class="input-group-append">
<button type="button" class="btn btn-primary">Send</button>
</span>
</div>
</form>
</div>

</div>


<!-- TO DO List -->
<div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <?php                
                                $sql=mysqli_query($conn,"select * from todo where user_id='".$_SESSION['aid']."' AND status='1'");
                                while($arr=mysqli_fetch_array($sql)){

                                    // $date = time_elapsed_string($arr['date']);
                                ?>
                                    <li>
                                        <!-- todo text -->
                                        <span class="text"> <?php echo $arr['task'];?></span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger"><i
                                                class="far fa-clock"></i><?php  echo get_time_ago(strtotime($arr['date']) );?></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                        <a href="index.php?delid=<?php echo $arr['id'] ?>"
                                        class="btn btn-tool">


                                            <i class="fas fa-trash"></i>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="todo"> <button type="button" class="btn btn-primary float-right" ><i class="fas fa-plus"></i>
                                    Add item</button></a>
                            </div>
                        </div>
<!--to do list-->

</section>


<section class="col-lg-5 connectedSortable">

<div class="card bg-gradient-primary">
<div class="card-header border-0">
<h3 class="card-title">
<i class="fas fa-map-marker-alt mr-1"></i>
Visitors
</h3>

<div class="card-tools">
<button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
<i class="far fa-calendar-alt"></i>
</button>
<button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>

</div>
<div class="card-body">
<div id="world-map" style="height: 250px; width: 100%;"></div>
</div>

<div class="card-footer bg-transparent">
<div class="row">
<div class="col-4 text-center">
<div id="sparkline-1"></div>
<div class="text-white">Visitors</div>
</div>

<div class="col-4 text-center">
<div id="sparkline-2"></div>
<div class="text-white">Online</div>
</div>

<div class="col-4 text-center">
<div id="sparkline-3"></div>
<div class="text-white">Sales</div>
</div>

</div>

</div>
</div>


<div class="card bg-gradient-info">
<div class="card-header border-0">
<h3 class="card-title">
<i class="fas fa-th mr-1"></i>
Sales Graph
</h3>
<div class="card-tools">
<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>

<div class="card-footer bg-transparent">
<div class="row">
<div class="col-4 text-center">
<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
<div class="text-white">Mail-Orders</div>
</div>

<div class="col-4 text-center">
<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
<div class="text-white">Online</div>
</div>

<div class="col-4 text-center">
<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
<div class="text-white">In-Store</div>
</div>

</div>

</div>

</div>



</section>

</div>

</div>
</section>

</div>

<?php include 'include/footer.php'; ?>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/sparklines/sparkline.js"></script>

<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
