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

$sql=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc, noc.status as nstatus, noc.document_no as ndoc from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on tenant.document_no=new_agreement.document_no inner join family_members on family_members.document_no=new_agreement.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join payment on new_agreement.document_no=payment.document_no inner join  property_details on new_agreement.document_no=property_details.document_no inner join noc on new_agreement.document_no=noc.document_no where new_agreement.user_id='".$_SESSION['aid']."' group by new_agreement.document_no");
$count=mysqli_num_rows($sql);
$fetcharr=mysqli_fetch_array($sql);

$sqlfull=mysqli_query($conn,"select new_agreement.document_no as newdoc,new_agreement.date_of_agreement as newdate, new_agreement.no_of_month as month,tenant.fullname as tname,owner.fullname as owname,owner.document_no as owdoc,tenant.document_no as tdoc,property_details.document_no as pdoc,family_members.document_no as memdoc,amenities.document_no as amdoc, noc.status as nstatus, noc.document_no as ndoc from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on tenant.document_no=new_agreement.document_no inner join family_members on family_members.document_no=new_agreement.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join payment on new_agreement.document_no=payment.document_no inner join  property_details on new_agreement.document_no=property_details.document_no inner join noc on new_agreement.document_no=noc.document_no group by new_agreement.document_no");
$countfull=mysqli_num_rows($sqlfull);

$sql3=mysqli_query($conn,"select document_no from new_agreement where NOT Exists (select * from owner inner join payment on new_agreement.document_no=owner.document_no inner join tenant on new_agreement.document_no=tenant.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join family_members on new_agreement.document_no=amenities.document_no inner join property_details on new_agreement.document_no=property_details.document_no)");
$pencount1=mysqli_num_rows($sql3);

$sql2=mysqli_query($conn,"select document_no from new_agreement where NOT Exists (select * from owner inner join payment on new_agreement.document_no=owner.document_no inner join tenant on new_agreement.document_no=tenant.document_no inner join amenities on new_agreement.document_no=amenities.document_no inner join family_members on new_agreement.document_no=amenities.document_no inner join property_details on new_agreement.document_no=property_details.document_no) and user_id='".$_SESSION['aid']."'");
$pencount=mysqli_num_rows($sql2);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-pie.min.js"></script>

<style>
    .we{
        height: 100%;
  width: 100%;
  position: relative;
  margin: 0 15% 15% 0;
    }
    
    .we:before{
        content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 50%;
  height: 50%;
  background: #fff;
  border-radius: 50%;
  top: 30%;
  left: 25%;
    }
    .dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 2px 30px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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

                                    <p> Agents</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="consultant" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box" style="background:#c0abe7">
<div class="inner">
<?php
                                
                                ?>
                                <h3><?php echo $count; ?></h3>

                                <p>Complete Agreement </p>
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
                              
<h3><?php echo $pencount; ?></h3>
                                <p> pending Agreement</p>
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
<span class="info-box-icon  elevation-1" style="background:#ffb599"><i class="fa fa-pause"></i></i></span>
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

<section class="col-lg-6 connectedSortable">


<!--pie chart-->
<div class="card">
<div class="card-header">
<h3 class="card-title"  style="width:100%">
<i class="fas fa-chart-pie mr-1"></i>
Agreement
</div>
</h3>
<div class="card-body">
<div class="tab-content p-0">
  <div id="container" style="width: 100%; height:300px; margin: 0; padding: 0; "></div>
<script>
   anychart.onDocumentReady(function () {
  var data = anychart.data.set([
    ['complete',<?php echo $countfull; ?>],
    ['pending',<?php echo $pencount1; ?>],
  ]);
  
  var chart = anychart.pie(data);
  chart.innerRadius('55%')
  var palette = anychart.palettes.distinctColors();
  palette.items([
    { color: '#79dbcb' },
    { color: '#3498db' },
  ]);

  chart.palette(palette);
 
  chart.legend(false);
  
  var label = anychart.standalones.label();
  label
    .useHtml(true)
    .text(
      '<span style = "color:#3498db; font-size:20px;">pending<br/></span>' +
      '<br/><br/></br><span style="color:#2ecc71; font-size:20px;"><i>complete</span>'
    )
    .position('center')
    .anchor('center')
    .hAlign('center')
    .vAlign('middle');
  chart.center().content(label);
  chart.container('container');
    chart.draw();
});
</script>
</div>
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
<!--area chart-->
<div class="card">
<div class="card-header">
<h3 class="card-title"  style="width:100%">
<i class="fas fa-chart-pie mr-1"></i>
Leads
</div>
</h3>
<div class="card-body">
<div class="tab-content p-0">

<div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
<script>
  var options = {
  chart: {
    height: 280,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Series 1",
      data: [45, 52, 38, 45, 19, 23, 2]
    }
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    categories: [
      "01 Jan",
      "02 Jan",
      "03 Jan",
      "04 Jan",
      "05 Jan",
      "06 Jan",
      "07 Jan"
    ]
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

</script>
</div>
</div>
</div>
<!--area chart-->
</section>

<section class="col-lg-6 connectedSortable">
<!--pie chart-->
<div class="card">
<div class="card-header">
<h3 class="card-title"  style="width:100%">
<i class="fas fa-chart-pie mr-1"></i>
Agreement by User
<div class="dropdown">
<select id="demo_overview_minimal_multiselect" class="dropbtn" onChange="get(this.value)" style="background-color:#3b8ce3;">
    <option>Select User</option>
<?php
        $sqlagreement1=mysqli_query($conn,"select * from new_agreement group by user_id");
        while($arragreement1=mysqli_fetch_array($sqlagreement1)){
        ?>
        <option value="<?php echo $arragreement1['user_id']; ?>"><?php echo $arragreement1['user_id']; ?></option>
        <?php } ?>
</select>
</div>

</div>
</h3>
<div class="card-body cdfdfd">
<div class="tab-content p-0">
  <div id="contain" style="width: 100%; height:300px; margin: 0; padding: 0; "></div>
</div>
</div>


</div>
<!--pie  bg-gradient-info-->
<div class="card card-success">
<div class="card-header border-0" style="background-color:#e73c67;">
<h3 class="card-title">
<i class="fas fa-th mr-1"></i>
Agreement per month
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
<div id="chartContainer" style="height: 300px; width: 100%;">
</div>
<?php
$sqlline=mysqli_query($conn,'SELECT user_id ,date_time, (DATE_FORMAT(date_time,"%M")) AS "Month", COUNT(*) AS Number_of_registered_users, (DATE_FORMAT(date_time,"%Y")) AS "Year",(DATE_FORMAT(date_time,"%D")) AS "date" FROM new_agreement WHERE year(date_time)= year(date_time) GROUP BY (DATE_FORMAT(date_time,"%M")) ORDER BY "Month" ASC;');
?>
<script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Agreement - per month"
      },
       data: [
      {
        type: "line",

        dataPoints: [
          <?php while($arrline=mysqli_fetch_array($sqlline)){ 
           $rr=$arrline['date_time'];
           ?>
          { x: new Date(<?php echo date('Y, m, d',strtotime($rr)); ?>), y: <?php echo $arrline['Number_of_registered_users']; ?> }, <?php } ?>
        
        ]
      }
      ]
    });

    chart.render();
  }
  </script>
</div>
</div>
<!--barchart-->
<div class="card card-success">
<div class="card-header" style="background-color:#e73c67;">
<h3 class="card-title">Agreerent</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<div class="chart">
<div>
    <canvas id="mybarChart"></canvas>
  </div>
</div>
</div>
<?php
$sqlagreement=mysqli_query($conn,"SELECT user_id, COUNT(*) as usercount FROM new_agreement GROUP BY user_id HAVING COUNT(*) > 1");
$sqlad=mysqli_query($conn,"SELECT user_id, COUNT(*) as usercount FROM new_agreement GROUP BY user_id HAVING COUNT(*) > 1");

?>
<script>
    var ctx = document.getElementById("mybarChart").getContext('2d');
var mybarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php while($arragreementcount=mysqli_fetch_array($sqlad)){ ?><?php echo '"'.$arragreementcount['user_id'].'",' ?> <?php } ?>],
    datasets: [{
      label: 'apples',
      data: [<?php while($arragreementcount1=mysqli_fetch_array($sqlagreement)){ ?><?php echo $arragreementcount1['usercount'].',' ?> <?php } ?>],
      backgroundColor: "rgba(153,255,51,1)"
    },
  ]
  }
});
</script>
<?php  ?>
</div>
<!--barchart-->
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

<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->

<script src="dist/js/adminlte.js?v=3.2.0"></script>
<!--linechart-->
<?php
$areachart=mysqli_query($conn,"select user_id, COUNT(*) as ff from leads group by user_id HAVING COUNT(*) > 1;");
$areachart1=mysqli_query($conn,"select user_id, COUNT(*) as ff from leads group by user_id HAVING COUNT(*) > 1;");
?>
<script>
    function get(val){
      
        $.ajax({
        type: "POST",
        url: "newcheck.php",
        data: {
            dnkid: val
        },
        success: function(data){
            $(".cdfdfd").html(data);
        }
        });
    }

    //user piechart
   anychart.onDocumentReady(function () {
  var dataw = anychart.data.set([
    ['complete',<?php echo $count; ?>],
    ['pending',<?php echo $pencount ?>],
  ]);
  
  var charte = anychart.pie(dataw);
  charte.innerRadius('55%')
  var palette = anychart.palettes.distinctColors();
  palette.items([
    { color: '#2ecc71' },
    { color: '#3498db' },
  ]);

//   charte.palette(palette);
  charte.legend(false);
  var label = anychart.standalones.label();
  label
    .useHtml(true)
    .text(
      '<span style = "color:#3498db; font-size:20px;"><?php echo $_SESSION['aid']; ?><br/></span>'
    )
    .position('center')
    .anchor('center')
    .hAlign('center')
    .vAlign('middle');
    charte.center().content(label);
    charte.container('contain');
    charte.draw();
});
</script>
<script>
  $(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php while($areafetch=mysqli_fetch_array($areachart)){echo '"'.$areafetch['user_id'].'",';} ?> ],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php while($areafetch=mysqli_fetch_array($areachart1)){echo $areafetch['ff'].',';} ?>]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })


  })
</script>
</body>
</html>
