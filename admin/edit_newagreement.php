<?php 
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
  header("Location:adminlogin"); 
}
if(!isset($_SESSION['aid'])) 
{
 header("Location:adminlogin.php"); 
}

include("../config/config.php");


// include('form.php');


$basiid=$_GET['id'];

//editowner
$document_no='';
$abbreviation='';
$fullname='';
$age='';
$mobile='';
$aadhaar='';
$pan_card='';
$address='';
$ownername1='';
$ownername2='';
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query3=mysqli_query($conn,"select * from owner where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query3)){
                    $document_no=$arr['document_no'] ?? null;
                    $abbreviation=$arr['abbreviation'] ?? null;
                    $fullname=$arr['fullname'] ?? null;
                   $age=$arr['age'] ?? null;
                   $mobile=$arr['mobile'] ?? null;
                   $aadhaar=$arr['aadhaar'] ?? null;
                   $pan_card=$arr['pan_card'] ?? null;
                   $address=$arr['address'] ?? null;
                   $ownername1=$arr['name1'] ?? null;
                   $ownername2=$arr['name2'] ?? null;
                                  }                 }

//edittenant
$docid='';
$abbreviation1='';
$fullname1='';
$mobile1='';
$email1='';
$passport1='';
$aadhaar1='';
$age1='';
$pan_card1='';
$address1='';
$permanent_address1='';
$tenantname1='';
$tenantname2='';
$office_name='';
$office_addres='';
$office_phone='';
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query2=mysqli_query($conn,"select * from tenant where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query2)){
                    $docid=$arr['document_no'] ?? null;
                    $abbreviation1=$arr['abbreviation'] ?? null;
                    $fullname1=$arr['fullname'] ?? null;
                   $mobile1=$arr['mobile'] ?? null;
                   $email1=$arr['email'] ?? null;
                   $passport1=$arr['passport'] ?? null;
                   $office_name=$arr['office_name'] ?? null;
                   $office_addres=$arr['office_addres'] ?? null;
                   $office_phone=$arr['office_phone'] ?? null;
                   $aadhaar1=$arr['aadhaar'] ?? null;
                   $age1=$arr['age'] ?? null ;
                   $pan_card1=$arr['pan_card'] ?? null;
                   $address1=$arr['address'] ?? null;
                   $permanent_address1=$arr['permanent_address'] ?? null;
                     $tenantname1=$arr['name1'] ?? null;
                        $tenantname2=$arr['name2'] ?? null;
                                    }                 }

//property
$document_no2='';
$property_type='';
$address='';
$asectorge='';
$plot_no='';
$cidco='';
$area='';
$chs='';
$node='';
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query3=mysqli_query($conn,"select * from property_details where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query3)){
                    $document_no2=$arr['document_no'] ?? null;
                    $property_type=$arr['property_type'] ?? null;
                    $address=$arr['address'] ?? null;
                   $sector=$arr['sector'] ?? null;
                   $plot_no=$arr['plot_no'] ?? null;
                   $cidco=$arr['cidco'] ?? null;
                   $area=$arr['area'] ?? null;
                   $chs=$arr['chs'] ?? null;
                    $node=$arr['node'] ?? null;
                                  }                 }

//family
$familyid='';
$document_no3='';
$name3='';
$relation3='';
$age3='';
$gender3='';
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query3=mysqli_query($conn,"select * from family_members where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query3)){
                     $familyid=$arr['id'] ?? null;
                    $document_no3=$arr['document_no'] ?? null;
                    $name3=$arr['name'] ?? null;
                    $relation3=$arr['relation'] ?? null;
                   $age3=$arr['age'] ?? null;
                   $gender3=$arr['gender'] ?? null;
                  
                                  }                 }

//aminities


//payment
$docid2='';
$security_deposit='';
$rent_amount='';
$method='';
$bank='';
$date='';
$tid='';
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query2=mysqli_query($conn,"select * from payment where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query2)){
                    $docid2=$arr['document_no'] ?? null;
                    $security_deposit=$arr['security_deposit'] ?? null;
                    $rent_amount=$arr['rent_amount'] ?? null;
                   $method=$arr['method'] ?? null;
                   $bank=$arr['bank'] ?? null;
                   $date=$arr['date'] ?? null;
                   $tid=$arr['tid'] ?? null;
                                    }                 }


if(isset($_GET['familydelid'])){
$deleteid=$_GET['familydelid'];	
 $query=mysqli_query($conn,"select * from family_members where id='$deleteid'");
    $res=mysqli_fetch_array($query);
    $id=$res['document_no'];
	$sql=mysqli_query($conn,"delete from family_members where id='$deleteid'");
   
	if($sql==1){	
	header("location:edit_newagreement.php?id=$id");
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['deleteid'])){
$deleteid=$_GET['deleteid'];
$query=mysqli_query($conn,"select * from amenities where id='$deleteid'");
    $res=mysqli_fetch_array($query);
    $id=$res['document_no'];	
	$sql=mysqli_query($conn,"delete from amenities where id='$deleteid'");
	if($sql==1){	
	header("location:edit_newagreement.php?id=$id");
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
    <title>AGREERENT | List of Agreement</title>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <h1>Edit Agreement</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Agreement</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="pt-2 px-3">
                                        <h3 class="card-title">Card Title</h3>
                                    </li>
                                    <!-- <li class="nav-item">
<a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#basic-details" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Basic Details</a>
</li> -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-two-profile-tab" data-toggle="pill"
                                            href="#owner" role="tab" aria-controls="custom-tabs-two-profile"
                                            aria-selected="false">Owner Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                                            href="#tenant" role="tab" aria-controls="custom-tabs-two-messages"
                                            aria-selected="false">Tenant Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#property" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Property</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#family-member" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Family Member</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#witness" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Witness</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#aminities" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Aminities</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#payment" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade active show" id="owner" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-profile-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post">
                                                <div class="form-group row">
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label> </label>
                                                    <div class="col-sm-2">
                                                        <input type="hidden" id="no1" name="no1"
                                                            value="<?php echo $basiid;?>">
                                                        <select class="form-control" name="abbreviation" id="examplemr"
                                                            required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option value="<?php echo $abbreviation?>" selected>
                                                                <?php echo $abbreviation ?></option>
                                                            <option value="mr.">Mr.</option>
                                                            <option value="mrs.">Mrs.</option>
                                                            <option value="mrs.">Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" style="text-transform:uppercase"
                                                            value="<?php echo $fullname?>" name="name"
                                                            class="form-control" id="txtname" placeholder="Enter Name"
                                                            required>
                                                        <span id="spanname"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Age<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="age" class="form-control" id="id1"
                                                            value="<?php echo $age?>" placeholder="Enter Age" required>
                                                        <span id="demo"></span>
                                                    </div>

                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Mobile No.<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" name="mobile" id="mobile" class="form-control"
                                                            value="<?php echo $mobile?>" minlength="10" maxlength="10"
                                                            placeholder="Enter Mobile Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="aadhaar" class="form-control"
                                                            id="txAdhar" value="<?php echo $aadhaar?>"
                                                            placeholder="Enter Aadhaar card No"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="12" required>
                                                        <span id="spanAadharCard"></span>
                                                    </div>

                                                    <label for="examplepan"
                                                        class="col-sm-2 col-form-label">Pancard<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" style="text-transform:uppercase"
                                                            name="pancard" value="<?php echo $pan_card?>"
                                                            id="txtPANCard" class="form-control"
                                                            placeholder="Enter Pancard number" required />
                                                        <span id="spanCard"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4"
                                                            placeholder="Enter Address" required
                                                            id="address"><?php echo $address?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col" align="right">
                                                    <button type="button" name="submitowner" id="subm"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" class="btn btn-primary  "
                                                        style="color: aliceblue" id=""> Next<i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tenant" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-messages-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post">
                                                <div class="form-group row">
                                                    <input type="hidden" name="no2" value="<?php echo $basiid;?>"
                                                            class="form-control" id="exampledno" readonly>
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label></label>
                                                    <div class="col-sm-2">
                                                        
                                                        <select class="form-control" id="exampleSelectmr"
                                                            name="abbreviation" required>
                                                            <option value="<?php echo $abbreviation1 ?>" selected>
                                                                <?php echo $abbreviation1; ?></option>

                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name1"
                                                            value="<?php echo $fullname1; ?>" id="txtname3"
                                                            placeholder="Enter Name" style="text-transform:uppercase"
                                                            required>
                                                        <span id="spanname"></span>
                                                    </div>
                                                </div>
                                                 <!-- ss -->
                                                 <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Office name<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="officename" name="officename" value="<?php echo $office_name; ?>"
                                                            placeholder="Enter Your Office Name" required>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">Office No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" name="officeno"
                                                            id="officeno" value="<?php echo $office_phone; ?>" placeholder="Enter Office Number" minlength="10"
                                                            maxlength="10" required>
                                                    </div>
                                                </div>
                                                <!-- ss -->
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Mobile No.<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" id="phone" name="mobile"
                                                            value="<?php echo $mobile1; ?>"
                                                            placeholder="Enter Mobile Number" minlength="10"
                                                            maxlength="10" required>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">E-mail
                                                        ID<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="email" class="form-control" name="email"
                                                            id="emailcheck" value="<?php echo $email1; ?>"
                                                            placeholder="Enter Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Passport
                                                        No</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="passport"
                                                            id="passport" value="<?php echo $passport1; ?>"
                                                            placeholder="Enter Passport Number">
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="aadhaar"
                                                            id="txtAadhar1" value="<?php echo $aadhaar1?>"
                                                            placeholder="Enter Aadhaar Card number" required>
                                                        <span id="spanAadharCard"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Age<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" name="age" min="18"
                                                            max="100" value="<?php echo $age1 ?>" id="id2"
                                                            placeholder="Enter Age" required>
                                                        <p id="demo"></p>
                                                    </div>


                                                    <label for="examplepan" class="col-sm-2 col-form-label">Pancard
                                                        No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="pancard"
                                                            id="txtPANCard1" value="<?php echo $pan_card1 ?>"
                                                            placeholder="Enter Pancard number"
                                                            style="text-transform:uppercase" required>
                                                        <span id="spanCard"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4"
                                                            placeholder="Enter Address" id="residenceAddress"
                                                            required><?php echo $address1 ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplepreaddress"
                                                        class="col-sm-2 col-form-label">Present Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="permanent_address" cols="66" rows="4"
                                                            placeholder="Enter Address" id="presentAddress"
                                                            required><?php echo $permanent_address1 ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Office Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="officeaddr" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" id="officeaddress"
                                                            required><?php echo $office_addres; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">

                                                    <button type="button" name="submitenant" id="submitenan"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" class="btn btn-primary  "
                                                        style="color: aliceblue" name="submit" id="sub">Next<i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="property" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">
                                            <form class="forms-sample" method="post">
                                                <div class="form-group row">
                                                    <input type="hidden" name="no3" id="no3"
                                                            value="<?php echo $basiid;?>">
                                                    <label for="examplename" class="col-2 col-form-label">Property
                                                        Type<label style="color:Red">*</label></label>

                                                    <div class="col-sm-2 col-lg-2">
                                                        

                                                        <!-- <input type="text" for="examplename" name="type" id="propertyTypeVal" class="form-control" readonly> -->
                                                        <select class="form-control" name="type" id="exampleproperties"
                                                            required>
                                                            <option value="<?php echo $property_type; ?>" selected>
                                                                <?php echo $property_type;?></option>
                                                            <option>Flat</option>
                                                            <option>Shop</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-8 col-lg-8">
                                                        <input type="text" class="form-control" name="address"
                                                            id="addressPro" value="<?php echo $address;?>"
                                                            placeholder="Enter Address" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplesec"
                                                                class="col-sm-4 col-form-label">Sector<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="sector"
                                                                    id="sector" value="<?php echo $sector;?>"
                                                                    placeholder="Enter Sector" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleplot"
                                                                class="col-sm-4 col-form-label">Plot No.<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="plotno"
                                                                    id="plotno" value="<?php echo $plot_no;?>"
                                                                    placeholder="Enter Plot Number" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplecid"
                                                                class="col-sm-4 col-form-label">CIDCO</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="cidco"
                                                                    id="cidco" value="<?php echo $cidco;?>"
                                                                    placeholder="Enter CIDCO">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplearea"
                                                                class="col-sm-4 col-form-label">Area(in sq.ft)<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="area"
                                                                    id="area" value="<?php echo $area;?>"
                                                                    placeholder="Enter Area(in sq.ft)" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplecoop" class="col-sm-2 col-form-label">Co.op
                                                        Housing Society<label style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="chs" id="chs"
                                                            value="<?php echo $chs;?>" style="text-transform:uppercase"
                                                            placeholder="Enter Co.op Housing Society" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplenode"
                                                        class="col-sm-2 col-form-label">NODE</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="node" id="node"
                                                            value="<?php echo $node;?>" placeholder="Enter NODE">
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- <a href="tenant.php?id=<?php echo $did;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitproperty" id="submitproperty"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" name="submit" class="btn btn-primary  "
                                                        style="color: aliceblue">Next<i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="family-member" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" id="basic-form" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <input type="hidden" name="no4" id="no4"
                                                                value="<?php echo $basiid;?>">

                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="txtname1"
                                                                    value="" name="name2" placeholder="Enter Name"
                                                                    required>
                                                                <span id="spanname"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplerel"
                                                                class="col-sm-3 col-form-label-sm">Relation<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="exampleSelectrelation"
                                                                    name="relation" required>
                                                                    <option>Father</option>
                                                                    <option>Mother</option>
                                                                    <option>Husband</option>
                                                                    <option>Wife</option>
                                                                    <option>Son</option>
                                                                    <option>Daughter</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleage"
                                                                class="col-sm-3 col-form-label-sm">Age<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="age"
                                                                    id="relativeage" value="" placeholder="Enter Age"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplearea"
                                                                class="col-sm-3 col-form-label-sm">Gender<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="relativegender"
                                                                    name="gender" required>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- <a href="witness.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue" ><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitmember" id="submitber"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" class="btn btn-primary  "
                                                        style="color: aliceblue">Next<i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!--table-->
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <table class='table table-bordered'>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Relation</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Action</th>
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="displayfamily">
<?php
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query3=mysqli_query($conn,"select * from family_members where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query3)){
                     $familyid=$arr['id'] ?? null;
                    $document_no3=$arr['document_no'] ?? null;
                    $name3=$arr['name'] ?? null;
                    $relation3=$arr['relation'] ?? null;
                   $age3=$arr['age'] ?? null;
                   $gender3=$arr['gender'] ?? null; ?>
                  
                                                       <tr>
                                                            <td><?php echo $arr['name'] ?></td>
                                                            <td><?php echo $arr['relation']  ?></td>
                                                            <td><?php echo $arr['age'] ?></td>
                                                            <td><?php echo $arr['gender']; ?></td>
                                                            <td><a href="edit_newagreement.php?familydelid=<?php echo $arr['id']; ?>"
                                                                    alt="delete"><i class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php   }                 }
?>
                                 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- table -->
                                    </div>

                                    <div class="tab-pane fade" id="witness" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">



                                            <form class="forms-sample" method="post">
                                                <div class="row">
                                                    <h4>Owner Witness </h4>
                                                </div>
                                                <div class="form-group row">
                                                    <input type="hidden" name="no5" id="no5" value="<?php echo $basiid;?>">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">1<sup>st</sup> Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            value="<?php echo $ownername1; ?>" class="form-control "
                                                            id="nameowner" name="owitness1" placeholder="Enter Name"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            value="<?php echo $ownername2 ?>"
                                                            class="form-control txtname" id="nameowner2"
                                                            name="owitness2" placeholder="Enter Name" required>


                                                    </div>
                                                </div>
                                                <div>
                                                </div>
                                                <div class="row">

                                                    <h4>Tenant Witness </h4>
                                                </div>
                                                <div class="form-group row">

                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">1<sup>st</sup> Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " value="<?php echo $tenantname1 ?>"
                                                            id="twitness1" name="twitness1" placeholder="Enter Name"
                                                            txtname required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " value="<?php echo $tenantname1 ?>"
                                                            id="twitness2" name="twitness2" placeholder="Enter Name"
                                                            txtname required>

                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitwitness" id="submitwitness"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" name="submit" class="btn btn-primary "
                                                        style="color: aliceblue" id="sub">Next</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="aminities" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <h4>List of Amenities </h4>
                                            </div>

                                            <form class="forms-sample" name="form1" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                         <input type="hidden" name="no6" id="no6"
                                                                value="<?php echo $basiid;?>" />
                                                        <div class="form-group row">
                                                           
                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" style="text-transform:uppercase"
                                                                    class="form-control" value="" id="txtname2"
                                                                    name="name3" placeholder="Enter Name" required>
                                                                <span id="spanname"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleitem"
                                                                class="col-sm-3 col-form-label-sm">Number Of Items<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="number"
                                                                    value="" id="itemnumbe"
                                                                    placeholder="Enter Number of items" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" id="submitaminitie"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                       >Save as
                                                        Draft</button>&nbsp;
                                                    <button type="button" class="btn btn-primary "
                                                        style="color: aliceblue">Next<i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <table class='table table-bordered'>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Number</th>
                                                            <th>Action</th>
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="displayaminities">
<?php
if(isset($_GET['id'])){
    $basiid=$_GET['id'];
                     $query3=mysqli_query($conn,"select * from amenities where document_no='$basiid'");
                 while($arr=mysqli_fetch_array($query3)){ ?>
                  
                               
                                                        <tr>
                                                            <td><?php echo $arr['name'] ?></td>
                                                            <td><?php echo $arr['number']  ?></td>
                                                            <td><a href="edit_newagreement.php?deleteid=<?php echo $arr['id']; ?>"
                                                                    alt="delete"><i class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="payment" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <form method="post">
                                            <div class="form-group row">
                                                 <input type="hidden" name="no7" id="no7" value="<?php echo $basiid;?>">
                                                <label for="examplename" class="col-sm-2 col-form-label-sm">Security
                                                    Deposit<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                   
                                                    <input type="number" id="deposit" class="form-control"
                                                        name="security_deposit" value="<?php echo $security_deposit ?>"
                                                        placeholder="Deposit" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Monthly
                                                    Rent<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="rent" class="form-control"
                                                        name="rent_amount" value="<?php echo $rent_amount ?>"
                                                        placeholder="Rent" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Payment
                                                    Method<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        name="method" id="checkselec" style="width: 100%;"
                                                        data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="4"
                                                            value="<?php echo $method ?>"><?php echo $method ?></option>
                                                        <option>CASH</option>
                                                        <option>CHEQUE</option>
                                                        <option>BANK TRASFER</option>
                                                        <option>GOOGLE PAY</option>
                                                        <option>PHONE PAY</option>
                                                        <option>PAYTYM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Bank<label
                                                        style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        name="bank" id="bank" style="width: 100%;" data-select2-id="1"
                                                        tabindex="-2" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="2"
                                                            value="<?php echo $bank ?>"><?php echo $bank ?></option>
                                                         <option>SBI</option>
                                                        <option>UNION</option>
                                                        <option>AXIS</option>
                                                        <option>KOTAK</option>
                                                        <option>HDFC</option>
                                                        <option>ICICI</option>
                                                        <option>BOI</option>
                                                        <option>YES BANK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampldate" class="col-sm-2 col-form-label">Date Of 
                                                    Rent Payment<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="rentpay" oninput="javascript: if (this.value.1 > this.31) this.value = this.value.slice(0, this.31);"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampldate" class="col-sm-2 col-form-label">Date Of
                                                    Payment<label style="color:Red">*</label></label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="date"
                                                        value="<?php echo $date ?>" id="date" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputtran"
                                                    class="col-sm-2 col-form-label">Transaction ID<label
                                                        style="color:Red">*</label></label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="tid"
                                                        value="<?php echo $tid ?>" id="tid"
                                                        placeholder="Enter Transaction ID" required>
                                                </div>
                                            </div>
                                            <div class="">
                                                <input type="hidden" name="agreement_details" value="">

                                                <button type="button" name="submitpayment" id="submitpayment"
                                                    class="btn btn-info" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Save"
                                                    onclick="function()">submit</button>&nbsp;
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
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
    <script src="plugins/select2/js/select2.full.min.js"></script>
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
    <!-- Page specific script -->
    <script src="checkform.js"></script>
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
    <script>
    function getproperty(val) {
        $.ajax({
            type: 'post',
            url: 'form.php',
            data: 'typeid=' + val,
            success: function(data) {
                $("#propertyTypeVal").html(data);
            }
        });
    }
    </script>
    <script>
    $(document).ready(function() {
        //owner
        $("#subm").on("click", function() {
            let no1 = $("#no1").val();
            let examplemr = $("#examplemr").val();
            let txtname = $("#txtname").val();
            let id1 = $("#id1").val();
            let mobile = $("#mobile").val();
            let txAdhar = $("#txAdhar").val();
            let txtPANCard = $("#txtPANCard").val();
            let address = $("#address").val();
            let subm = $("#subm").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no1: no1,
                    examplemr: examplemr,
                    txtname: txtname,
                    id1: id1,
                    mobile: mobile,
                    txAdhar: txAdhar,
                    txtPANCard: txtPANCard,
                    address: address,
                    subm: subm
                },
                cache: false,
                success: function (res) {
                swal("Done!", res, "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error !", res, "error");
            },
            });
        });

        //tenant
        $("#submitenan").on("click",function() {
            let exampledno = $("#exampledno").val();
            let exampleSelectmr = $("#exampleSelectmr").val();
            let txtname3 = $("#txtname3").val();
            let phone = $("#phone").val();
            let emailcheck = $("#emailcheck").val();
            let officename = $("#officename").val();
            let officeno = $("#officeno").val();
            let officeaddress = $("#officeaddress").val();
            let passport = $("#passport").val();
            let txtAadhar1 = $("#txtAadhar1").val();
            let id2 = $("#id2").val();
            let txtPANCard1 = $("#txtPANCard1").val();
            let residenceAddress = $("#residenceAddress").val();
            let presentAddress = $("#presentAddress").val();
            let submitenan = $("#submitenan").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    exampledno: exampledno,
                    exampleSelectmr: exampleSelectmr,
                    txtname3: txtname3,
                    phone: phone,
                    emailcheck: emailcheck,
                    passport: passport,
                    officename: officename,
                    officeno: officeno,
                    officeaddress: officeaddress,
                    id2: id2,
                    txtAadhar1: txtAadhar1,
                    txtPANCard1: txtPANCard1,
                    residenceAddress: residenceAddress,
                    presentAddress: presentAddress,
                    submitenan: submitenan,
                },
                cache: false,
                success: function (res2) {
                swal("Done!", res2, "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", res2, "error");
            },
            });
        });

        //property
        $("#submitproperty").on("click", function() {
            let no3 = $("#no3").val();
            let exampleproperties = $("#exampleproperties").val();
            let addressPro = $("#addressPro").val();
            let sector = $("#sector").val(); 
            let plotno = $("#plotno").val();
            let cidco = $("#cidco").val();
            let area = $("#area").val();
            let chs = $("#chs").val();
            let node = $("#node").val();
            let submitproperty = $("#submitproperty").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no3: no3,
                    exampleproperties: exampleproperties,
                    addressPro: addressPro,
                    sector: sector,
                    plotno: plotno,
                    cidco: cidco,
                    area: area,
                    chs: chs,
                    node: node,
                    submitproperty: submitproperty,
                },
                cache: false,
                success: function (res3) {
                swal("Done!", res3, "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", res3, "error");
            },
            });
        });

        //family
        $("#submitber").on("click", function() {
            let no4 = $("#no4").val();
            let txtname1 = $("#txtname1").val();
            let exampleSelectrelation = $("#exampleSelectrelation").val();
            let relativeage = $("#relativeage").val();
            let relativegender = $("#relativegender").val();
            let submitmember = $("#submitber").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no4: no4,
                    txtname1: txtname1,
                    exampleSelectrelation: exampleSelectrelation,
                    relativeage: relativeage,
                    relativegender: relativegender,
                    submitmember: submitmember
                },
                cache: false,
                success: function (result) {
                    $("#displayfamily").html(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!","Please try again", "error");
            },
            });


        });

        //witness
        $("#submitwitness").on("click", function() {
            let no5 = $("#no5").val();
            let nameowner = $("#nameowner").val();
            let nameowner2 = $("#nameowner2").val();
            let twitness1 = $("#twitness1").val();
            let twitness2 = $("#twitness2").val();
            let submitwitness = $("#submitwitness").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no5: no5,
                    nameowner: nameowner,
                    nameowner2: nameowner2,
                    twitness1: twitness1,
                    twitness2: twitness2,
                    submitwitness: submitwitness,
                },
                cache: false,
                success: function (res5) {
                swal("Done!", res5, "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", res5, "error");
            },
            });
        });

        //aminities
        $("#submitaminitie").on("click", function() {
            let no6 = $("#no6").val();
            let txtname2 = $("#txtname2").val();
            let itemnumbe = $("#itemnumbe").val();
            let submitaminitie = $("#submitaminitie").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no6: no6,
                    txtname2: txtname2,
                    itemnumbe: itemnumbe,
                    submitaminitie: submitaminitie,
                },
                cache: false,
                success: function (res6) {
                    $("#displayaminities").html(res6);
                swal("Done!","Successfully Inserted", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error","please try again", "error");
            },
            });
        });;
        //payment
        $("#submitpayment").on("click", function() {
            let no7 = $("#no7").val();
            let deposit = $("#deposit").val();
            let rent = $("#rent").val();
            let checkselec = $("#checkselec").val();
            let bank = $("#bank").val();
            let date = $("#date").val();
            let rentpay = $("#rentpay").val();
            let tid = $("#tid").val();
            let submitpayment = $("#submitpayment").val();

            $.ajax({
                url: "edit_newagreementform.php",
                type: "POST",
                data: {
                    no7: no7,
                    deposit: deposit,
                    rent: rent,
                    checkselec: checkselec,
                    bank: bank,
                    date: date,
                    tid: tid,
                    rentpay:rentpay,
                    submitpayment: submitpayment,
                },
                cache: false,
                success: function (res7) {
                swal("Done!",res7, "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error",res7, "error");
            },
            });
        });



    });
    </script>
</body>

</html>