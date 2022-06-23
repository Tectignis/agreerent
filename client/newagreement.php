<?php 
session_start();

if(!isset($_SESSION['aid'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");


// include('form.php');

$basicid=$_GET['documentbasid'];

if(isset($_GET['familydelid'])){
    $deleteid=$_GET['familydelid'];	
     $query=mysqli_query($conn,"select * from family_members where id='$deleteid'");
        $res=mysqli_fetch_array($query);
        $id=$res['document_no'];
        $sql=mysqli_query($conn,"delete from family_members where id='$deleteid'");
       
        if($sql==1){	
        header("location:newagreement.php?documentbasid=$id");
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
	header("location:newagreement.php?documentbasid=$id");
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
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">

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
                                                 <input type="hidden" id="no" name="no1"
                                                            value="<?php echo $basicid;?>" readonly>
                                                <div class="form-group row">
                                                     
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label> </label>
                                                    <div class="col-sm-2">
                                                      

                                                        <select class="form-control" name="abbreviation" id="examplemr"
                                                            required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option value="mr.">Mr.</option>
                                                            <option value="mrs.">Mrs.</option>
                                                            <option value="mrs.">Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" style="text-transform:uppercase" name="name"
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
                                                        <input type="number" name="age"  class="form-control" id="id1"
                                                            placeholder="Enter Age" required>
                                                        <span id="demo"></span>
                                                    </div>

                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Mobile No.<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" name="mobile" id="mobile" class="form-control"
                                                            minlength="10" maxlength="10" pattern="[7-9]{1}[0-9]{9}"
                                                            placeholder="Enter Mobile Number" required>
                                                            <span id="spanownermobi"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" name="aadhaar" class="form-control"
                                                            id="txAdhar" placeholder="Enter Aadhaar card No"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="12" required>
                                                        <span id="spanAadharCard"></span>
                                                    </div>

                                                    <label for="examplepan"
                                                        class="col-sm-2 col-form-label">Pancard<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" style="text-transform:uppercase"
                                                            name="pancard" id="txtPANCard" class="form-control"
                                                            placeholder="Enter Pancard number"  maxlength="10" pattern="[A-Z]{4}[0-9]{5}[A-Z]{1}" required />
                                                        <span id="spanCard"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" required
                                                            id="address"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col" align="right">
                                                    <button type="button" name="submitowner" id="subm"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;

                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>&nbsp;

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tenant" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-messages-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post">
                                                  <input type="hidden" id="no2" name="no2" value="<?php echo $basicid;?>"
                                                            class="form-control" id="exampledno" readonly >
                                                <div class="form-group row">
                                                   
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label></label>
                                                    <div class="col-sm-2">
                                                       
                                                        <select class="form-control" id="exampleSelectmr"
                                                            name="abbreviation" required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name1"
                                                            id="txtname3" placeholder="Enter Name"
                                                            style="text-transform:uppercase" required>
                                                        <span id="spannameTenant"></span>
                                                    </div>
                                                </div>
                                                <!-- ss -->
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Office name<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="officename" name="officename"
                                                            placeholder="Enter Your Office Name" required>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">Office No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" name="officeno"
                                                            id="officeno" placeholder="Enter Office Number" minlength="10"
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
                                                            placeholder="Enter Mobile Number" minlength="10"
                                                            maxlength="10" required>
                                                            <span id="spantenrmobi"></span>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">E-mail
                                                        ID<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="email" class="form-control" name="email"
                                                            id="emailcheck" placeholder="Enter Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Passport
                                                        No</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="passport"
                                                            id="passport" placeholder="Enter Passport Number">
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                    <input type="tel" name="aadhaar" class="form-control"
                                                            id="txAdhartr" placeholder="Enter Aadhaar card No" minlength="12"
                                                            maxlength="12" required>
                                                        <span id="spanAadharCardTenant"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Age<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" name="age" min="18"
                                                            max="100" id="id2" placeholder="Enter Age" required>
                                                        <p id="demo"></p>
                                                    </div>


                                                    <label for="examplepan" class="col-sm-2 col-form-label">Pancard
                                                        No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="pancard"
                                                            id="txtPANCard1" placeholder="Enter Pancard number"
                                                            style="text-transform:uppercase" required>
                                                        <span id="spanCardTenant"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" id="residenceAddress"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplepreaddress"
                                                        class="col-sm-2 col-form-label">Present Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="permanent_address" class="form-control"
                                                            cols="66" rows="4" placeholder="Enter Address"
                                                            id="presentAddress" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Office Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="officeaddr" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" id="officeaddress"
                                                            required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col" align="right">

                                                    <!-- <a href="owner.php?id=<?php //echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitenant" id="submitenant"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary  next" style="color: aliceblue"
                                                        name="submit" id="sub">Next<i
                                                            class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="property" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post" >
                                                <div class="form-group row">
                                                    <input type="hidden" name="no3" id="no3"
                                                            value="<?php echo $basicid;?>" readonly>
                                                    <label for="examplename" class="col-2 col-form-label">Property
                                                        Type<label style="color:Red">*</label></label>

                                                    <div class="col-sm-2 col-lg-2">
                                                        
<?php
$quer=mysqli_query($conn,"select * from new_agreement where user_id='$basicid'");
$result=mysqli_fetch_array($quer);
$propertytype=$result['property_type'];
?>
                                                        <!-- <input type="text" for="examplename" name="type" id="propertyTypeVal" class="form-control" readonly> -->
                                                        <input class="form-control" name="type" value="<?php echo $propertytype; ?>" id="exampleproperties"
                                                            readonly>
                                                            

                                                    </div>
                                                    <div class="col-sm-8 col-lg-8">
                                                        <input type="text" class="form-control" name="address"
                                                            id="addressPro" placeholder="Enter Address" required>
                                                            <span id="spanCardpenant"></span>
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
                                                                    id="sector" placeholder="Enter Sector" required>
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
                                                                    id="plotno" placeholder="Enter Plot Number"
                                                                    required>
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
                                                                    id="cidco" placeholder="Enter CIDCO">
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
                                                                    id="area" placeholder="Enter Area(in sq.ft)"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplecoop" class="col-sm-2 col-form-label">Co.op
                                                        Housing Society<label style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="chs" id="chs"
                                                            style="text-transform:uppercase"
                                                            placeholder="Enter Co.op Housing Society" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplenode"
                                                        class="col-sm-2 col-form-label">NODE</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="node" id="node"
                                                            placeholder="Enter NODE">
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitproperty" id="submitproperty"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
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
                                                                value="<?php echo $basicid;?>">
                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="txtname1"
                                                                    name="name2" placeholder="Enter Name" required>
                                                                <span id="spanfamname"></span>
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
                                                                    <option value="" disabled selected hidden>Select
                                                                    </option>
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
                                                                    id="relativeage" placeholder="Enter Age" required>
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
                                                                    <option value="" disabled selected hidden>select
                                                                    </option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitmember" id="submitmember"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>

                                        </div>
                                        <!--table-->
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div id="displayfamily"></div>
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
                                                    <input type="hidden" name="no5" id="no5" value="<?php echo $basicid;?>">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">1<sup>st</sup> Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " id="nameowner" name="owitness1"
                                                            placeholder="Enter Name" required>
                                                            <span id="spanownername"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control txtname" id="nameowner2"
                                                            name="owitness2" placeholder="Enter Name" required>
                                                            <span id="spanowner2name"></span>

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
                                                            class="form-control " id="twitness1" name="twitness1"
                                                            placeholder="Enter Name" txtname required>
                                                            <span id="spantenantname"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " id="twitness2" name="twitness2"
                                                            placeholder="Enter Name" txtname required>
                                                            <span id="spantenant2name"></span>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitwitness" id="submitwitness"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
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
                                                        <div class="form-group row">
                                                            <input type="hidden" name="no6" id="no6"
                                                                value="<?php echo $basicid;?>">
                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" style="text-transform:uppercase"
                                                                    class="form-control" id="txtname2" name="name3"
                                                                    placeholder="Enter Name" required>
                                                                <span id="spanaminitiesname"></span>
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
                                                                    id="itemnumbe" placeholder="Enter Number of items"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- <a href="family.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitaminities" id="submitaminities"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div id="displayaminities"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade " id="payment" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="examplename" class="col-sm-2 col-form-label-sm">Security
                                                    Deposit<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" name="no7" id="no7" value="<?php echo $basicid;?>">
                                                    <input type="number" id="deposit" class="form-control"
                                                        name="security_deposit" placeholder="Deposit" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Monthly
                                                    Rent<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="rent" class="form-control"
                                                        name="rent_amount" placeholder="Rent" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Payment
                                                    Method<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        name="method" id="checkselec" style="width: 100%;"
                                                        data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="4" value="" disabled>Select</option>
                                                        <option value="CASH">CASH</option>
                                                        <option value="CHEQUE">CHEQUE</option>
                                                        <option value="BANK TRASFER">BANK TRASFER</option>
                                                        <option value="GOOGLE PAY">GOOGLE PAY</option>
                                                        <option value="PHONE PAY">PHONE PAY</option>
                                                        <option value="PAYTYM">PAYTYM</option>
                                                        
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
                                                        <option selected="selected" data-select2-id="2">SBI</option>
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
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" name="date" id="date"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputtran"
                                                    class="col-sm-2 col-form-label">Transaction ID<label
                                                        style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" name="tid" id="tid"
                                                        placeholder="Enter Transaction ID" required>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" name="savepayment" id="savepayment"
                                                    class="btn btn-info" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Save"
                                                    >Save as Draft</button>
                                                <input type="hidden" name="agreement_details" value="">
                                                <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                    Previous<i class="mdi mdi-chevron-left"></i></a>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script src="dist/js/validation.js"></script>
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
    $('.next').click(function() {
        $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').trigger('click');
    });

    $('.previous').click(function() {
        $('.nav-tabs > .nav-item > .active').parent().prev('li').find('a').trigger('click');
    });
    </script>

<script>
let submitpayment = document.getElementById("submitpayment");
submitpayment.addEventListener("click", function(){
let no7 = document.getElementById("no7").value;
let rent_amount = document.getElementById("rent").value;
let method = document.getElementById("checkselec").value;
let date_of_payment = document.getElementById("date1").value;
let bank = document.getElementById("bank").value;
let date = document.getElementById("date").value;
let tid = document.getElementById("tid").value;
if(no7 == "" || rent_amount == "" || method == "" || date_of_payment == "" || bank == "" || date== "" || tid== "" ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>

<script>

$('#checkselec').change(function(){

   if($('#checkselec option:selected').text() == "CASH")
   {
     $('#bank').prop('disabled',true);
   }
   else
   {
     $('#bank').prop('disabled',false);
   }
 });

</script>

</body>

</html>