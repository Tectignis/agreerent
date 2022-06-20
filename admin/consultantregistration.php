<?php  
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin"); 
}
if(!isset($_SESSION['id'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                                    <h3 class="card-title">Profile</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="forms-sample" method="post" enctype="multipart/form-data"
                                    style="margin:30px;">

                                    <div class="form-group row">
                                        <label for="exampledno" class="col-sm-2 col-form-label">Code No.<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <?php $sql=mysqli_query($conn,"select id from agent_details order by user_id desc") or die( mysqli_error($conn));;
              $row=mysqli_fetch_array($sql);
              $lastid=$row['id'];
              if(empty($lastid)){
                  $number="001";
              }else{
                  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
                  $number="AR".$id;
              }					
                                    ?>
                                            <input type="text" name="no" value="<?php echo $number; ?>"
                                                class="form-control" id="exampledno" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleaddress" class="col-sm-2 col-form-label">Firm
                                            Name<label style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="firmName" id="firmName" placeholder="Enter Name"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleaddress" class="col-sm-2 col-form-label">Agent
                                            Name<label style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Office
                                            Address<label style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <textarea name="office_address"  id= "office_address" style="width:100%;" rows="2"
                                                placeholder="Enter Address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleaadhaar" class="col-sm-2 col-form-label">Mobile No.<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="examplemob" name="mobile_no"
                                                placeholder="Enter Mobile Number" minlength="10" maxlength="10"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleemail" class="col-sm-2 col-form-label">Email ID<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                        <div class="input-group date" id="reservationdateAllowances" data-target-input="nearest">
                                                <input type="email" class="form-control" name="email" id="email"
                                                 placeholder="Enter Email ID" required>
                                                 
                                                <a class="btn btn-primary" id="otp" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Send OTP</a>
            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="collapse multi-collapse row" id="multiCollapseExample1">
                                        <label for="examplepan" class="col-sm-2 ml-1 col-form-label"></label>
                                        <input type="text" class="form-control mt-2 col-lg-6" name="veriotp" id="veriotp" >
                                     </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="examplepan" class="col-sm-2 col-form-label">Rera No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="rera"
                                                placeholder="Enter Number" id="rera" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
              <label for="examplepan" class="col-sm-2 col-form-label">Document Prefix<label style="color:Red">*</label></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="TECT-00001" name="prefix">
              </div>
            </div> -->


                                    <div class="form-group row">
                                        <label for="examplepan" class="col-sm-2 col-form-label">Photo<label
                                                style="color:Red">*</label></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file">
                                            
                                        </div>
                                    </div>

                                    <div class="col" align="right">
                                        <button type="button" name="sub" id="otpverifysub" class="btn btn-primary  btn-lg"
                                            style="color: aliceblue">Submit</button>
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
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
    
    </script>
    
    <script>
        $(document).ready(function(){
            $("#otpverifysub").on("click", function () {
            let exampledno = $("#exampledno").val();
            let email = $("#email").val();
            let name = $("#name").val();
            let firmName = $("#firmName").val();
            let office_address = $("#office_address").val();
            let examplemob = $("#examplemob").val();
            let veriotp = $("#veriotp").val();
            let otpverifysub = $("#otpverifysub").val();
            let rera = $("#rera").val();
                $.ajax({
                    type: "POST",
                    url: "newcheck.php",
                    data:{
                        exampledno:exampledno,
                        email:email,
                        firmName:firmName,
                        name:name,
                        office_address:office_address,
                        examplemob:examplemob,
                        veriotp:veriotp,
                        otpverifysub:otpverifysub,
                        rera:rera
                    },
                    cache: false,
                    success: function(dnk)
                    {
                        alert(dnk);
                    }
                });
            });


            $("#otp").on("click", function () {
            let exampledno = $("#exampledno").val();
            let email = $("#email").val();
            let name = $("#name").val();
            let otp = $("#otp").val();
                $.ajax({
                    type: "POST",
                    url: "newcheck.php",
                    data:{
                        exampledno:exampledno,
                        email:email,
                        otp:otp,
                        name:name,
                    },
                    cache: false,
                    success: function(dnkotp)
                    {
                        alert(dnkotp);
                    }
                });
            });
        });
    </script>


</body>

</html>