<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
}

include("../config/config.php");

if(isset($_POST['submit'])){
  $user_id=$_SESSION['id'];
	$name=$_POST['name'];
  $mob_no=$_POST['mob_no'];
	$email=$_POST['email'];
  $description=$_POST['description'];

	
	$sql=mysqli_query($conn,"INSERT INTO `clientenquiry`(`user_id`,`name`,`mob_no`,`email`,`description`) VALUES ('".$_SESSION['id']."','$name','$mob_no','$email','$description')");
  
	if($sql==1){	
    header("location:enquiry.php");
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
  <title>AGREERENT | Add New Enquiry</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
            <h1>Add New Enquiry Form</h1>
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
                <h3 class="card-title">Add New Enquiry Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Client Name</label>
                    <input type="text" class="form-control" id="txtname" name="name"  placeholder="Enter Client Name">
                  </div>
                  <span id="spanname"></span>

                  <div class="form-group">
                    <label for="exampleInputmobile">Mobile No</label>
                    <input type="phone" class="form-control" id="phone" minlength="10" maxlength="10"  name="mob_no" placeholder="Enter Mobile No">
                  </div>
                  <span id="phoneSpan"></span>

                  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <span id="emailSpan"></span>

                  
				  <div class="form-group">
                    <label for="exampleInputdescription">Description</label>
                    <input type="textbox" name="description" id="desc" class="form-control" id="exampleInputdescription" placeholder="Enter Description">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>

 let validenqName,validenqtMobile, validenqEmail;

  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spanname").hide();
	    $("#txtname").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
      validenqName="no";
		   let txt=$("#txtname").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
        validenqName="yes";
		       $("#spanname").hide();
		       
		   }
	   }

	   $("#submit").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		  	  
		   //MOBILE NO VALIDATION
		   $("#phoneSpan").hide();
	    $("#phone").keyup(function(){
	     mobile_check();
	   });
	   function mobile_check(){
		   let mobileno=$("#phone").val();
		   let vali =/^[6-9]\d{9}$/; 
		   if(!vali.test(mobileno)){
        validenqtMobile="no";
			    $("#phoneSpan").show().html("*Invalid Mobile No").css("color","red").focus();
				mobile_err=false;
			 return false;
		   }
		   else{
        validenqtMobile="yes";
		       $("#phoneSpan").hide(); 
		   }
	   }

	   $("#submit").click(function(){
		mobile_err = true;
		mobile_check();
			   
			   if((mobile_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


	  
		    // EMAIL NO
			$("#emailSpan").hide();
	    $("#email").keyup(function(){
			email_check();
	   });
	   function email_check(){
	
		   let email=$("#email").val();
		   let vali =/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
		   if(!vali.test(email)){
        validenqEmail="no";
			  $("#emailSpan").show().html("Enter Valid Email ").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
        validenqEmail="yes";
		       $("#emailSpan").hide();
		       
		   }
	   }

	   $("#submit").click(function(){
		email_err = true;
	   email_check();
			   
			   if((email_err==true)){
			      return true;
			   }
			   else{return false;}
		  });




 });
 validenqName,validenqtMobile, validenqEmail;

 let submitenant = document.getElementById("submit");
     submitenant.addEventListener("click", function(){
     let txtname = document.getElementById("txtname").value;
     let phone = document.getElementById("phone").value;
     let email = document.getElementById("email").value;
    let desc = document.getElementById("desc").value;

     // if(no2 == "" || abbreviation == "" || name1 == "" || mobile == "" || email == "" || aadhaar == "" || age == "" || pancard == "" || address == "" || permanent_address == ""  ){
     //     swal("Oops...", "Please fill all the fields", "error");
     // }
     // if( no2 == "" || abbreviation == "" || validTenantName == "no" || validTenantMobile == "no" || validTenantEmail == "no" || validTenantAadhar == "no" || validTenantAge == "no" || validTenantPan == "no" || address == "" || permanent_address == ""  ){
     //     swal("Oops...", "Please fill all the fields", "error");
     // }
     if(validenqName == "no" || validenqtMobile == "no" || validenqEmail == "no" || desc == ""){
         swal("Oops...", "Please fill all the fields", "error");
     }
         else{
             swal("Saved!", "Agreement Save", "success");
         }
     });
</script>
      






</body>
</html>
