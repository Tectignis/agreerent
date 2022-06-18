<?php
session_start();
if(isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:clientlogin.php"); 
}
include("../config/config.php");




//owner
if(isset($_POST['subm'])){
    $id=$_POST['no1'];
	$abbreviation=$_POST['examplemr'];
	$name=$_POST['txtname'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$aadhaar=$_POST['txAdhar'];
	$pancard=$_POST['txtPANCard'];
  $age=$_POST['id1'];
	
$query=mysqli_query($conn,"select * from owner where document_no='$id' order by document_no desc");
$num=mysqli_num_rows($query);
$document=$num['document_no'];
if($document!=$id){
	$sql=mysqli_query($conn,"INSERT INTO `owner`(`document_no`, `abbreviation`, `fullname`,`age`, `address`, `mobile`, `aadhaar`, `pan_card`) VALUES ('$id','$abbreviation','$name','$age','$address','$mobile','$aadhaar','$pancard')");
	if($sql==1){	
    echo "successfully updated";
	}else{
		echo "something went wrong";
	}
}
else{
	$sql=mysqli_query($conn,"UPDATE `owner` SET `document_no`='$id',`abbreviation`='$abbreviation',`fullname`='$name',`age`='$age',`address`='$address',`mobile`='$mobile',`aadhaar`='$aadhaar',`pan_card`='$pancard' WHERE document_no='$id'");
	if($sql==1){	
     echo "successfully updated";
	}else{
		echo "something went wrong";
	}
}
}

//tenant
if(isset($_POST['tenant'])){
     $idtenant=$_POST['exampledno'];
	$surname=$_POST['exampleSelectmr'];
	$name=$_POST['txtname3'];
  $age=$_POST['id2'];
  $permanent_address=$_POST['presentAddress'];
	$address=$_POST['residenceAddress'];
	$mobile=$_POST['phone'];
	$aadhaar=$_POST['txtAadhar1'];
	$pancard=$_POST['txtPANCard1'];
  $email=$_POST['emailcheck'];
	$passport=$_POST['passport'];

	$query=mysqli_query($conn,"select * from tenant where document_no='$id' order by document_no desc");
$num=mysqli_num_rows($query);
$document=$num['document_no'];

	if($document!=$idtenant){
		$sql=mysqli_query($conn,"INSERT INTO `tenant`(`document_no`, `abbreviation`, `fullname`,`age`, `address`,`permanent_address`, `mobile`, `email`,`passport`,`aadhaar`, `pan_card`) VALUES 
  ('$idtenant','$surname','$name','$age','$address','$permanent_address','$mobile','$email','$passport','$aadhaar','$pancard')");
	if($sql==1){	
     echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
	}
	else{
	$sql=mysqli_query($conn,"UPDATE `tenant` SET `document_no`='$idtenant',`abbreviation`='$surname',`fullname`='$name',`age`='$age',`address`='$address',`permanent_address`='$permanent_address',`mobile`='$mobile',`email`='$email',`passport`='$passport',`aadhaar`='$aadhaar',`pan_card`='$pancard' WHERE document_no='$idtenant'");
	if($sql==1){	
     echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
}
}

//property
if(isset($_POST['submitproperty'])){
	 $idproperty=$_POST['no3'];
	$type=$_POST['exampleproperties'];  
  $sector=$_POST['sector'];
	$address=$_POST['addressPro'];
	$plotno=$_POST['plotno'];
	$cidco=$_POST['cidco'];
	$area=$_POST['area'];
  $chs=$_POST['chs'];
  $node=$_POST['node'];

  	$query=mysqli_query($conn,"select * from property_details where document_no='$id' order by document_no desc");
$num=mysqli_num_rows($query);
$document=$num['document_no'];

if($document!=$idproperty){
	$sql=mysqli_query($conn,"INSERT INTO `property_details`(`document_no`,`property_type`, `address`, `sector`, `plot_no`,`cidco`, `area`, `chs`, `node`) VALUES ('$idproperty','$type','$address','$sector','$plotno','$cidco','$area','$chs','$node')");
	if($sql==1){	
    echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
}
else{
	$sql=mysqli_query($conn,"UPDATE `property_details` SET `document_no`='$idproperty',`property_type`='$type',`address`='$address',`sector`='$sector',`plot_no`='$plotno',`cidco`='$cidco',`area`='$area',`chs`='$chs',`node`='$node' WHERE document_no='$idproperty'");
	if($sql==1){	
   echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
}
}

//family
if(isset($_POST['submitmember'])){
	$idfamily=$_POST['no4'];
	$name=$_POST['txtname1'];  
  $age=$_POST['relativeage'];
	$relation=$_POST['exampleSelectrelation'];
	$gender=$_POST['relativegender'];
	
	
	$sql=mysqli_query($conn,"INSERT INTO `family_members`(`document_no`,`name`, `age`, `relation`, `gender`) VALUES 
  ('$idfamily','$name','$age','$relation','$gender')'
");
	if($sql==1){	
   echo "successfully updated";
  	}else{
		echo "something went wrong";
	}

}
if(isset($_POST['submitmember'])){
	$idfamily=$_POST['no4'];
	
	$sql=mysqli_query($conn,"select * from family_members where document_no='$idfamily'");
	while($arr=mysqli_fetch_array($sql)){
     echo " <tr>
        <td>". $arr['name']."</td>
        <td>". $arr['relation'] ."</td>
       <td>". $arr['age'] ."</td>
       <td>". $arr['gender'] ."</td>
      </tr>";
       } 

}

//witness
if(isset($_POST['submitwitness'])){
	$idwitness=$_POST['no5'];
	$owitness1=$_POST['nameowner'];
	$owitness2=$_POST['nameowner2'];
  $twitness1=$_POST['twitness1'];
  $twitness2=$_POST['twitness2'];
	
	
	$sql=mysqli_query($conn,"UPDATE owner SET name1='$owitness1',name2='$owitness2' WHERE document_no='$idwitness'"); 
  $tenant=mysqli_query($conn,"UPDATE tenant SET name1='$twitness1',name2='$twitness2' WHERE document_no='$idwitness'"); 

	if($sql==1){	

     echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
}


//aminities
if(isset($_POST['submitaminities'])){
	$idaminities=$_POST['no6'];
	$name=$_POST['txtname2'];  
  $number=$_POST['itemnumbe'];
	$sql=mysqli_query($conn,"INSERT INTO `amenities`(`document_no`,`name`,`number`) VALUES 
  ('$idaminities','$name','$number')");
	if($sql==1){	
     echo "successfully updated";
  	}else{
		 echo "something went wrong";
	}
}

if(isset($_POST['submitaminities'])){
	$idaminities=$_POST['no6'];
	
	$sql=mysqli_query($conn,"select * from amenities where document_no='$idaminities'");
	
	while($arr=mysqli_fetch_array($sql)){
     echo " <tr>
        <td>". $arr['name']."</td>
        <td>". $arr['number'] ."</td>
      </tr>";
       } 
}

//payment
if(isset($_POST['submitpayment'])){
	$idpayment=$_POST['no7'];
	$security_deposit=$_POST['deposit'];  
  $rent_amount=$_POST['rent'];
  $method=$_POST['checkselec'];  
  $bank=$_POST['bank'];  
  $date=$_POST['date'];  
  $tid=$_POST['tid'];

  $document='';

$query=mysqli_query($conn,"SELECT document_no FROM owner order by document_no desc");
$arr=mysqli_fetch_assoc($query);
$document=$arr['document_no'];

$query1=mysqli_query($conn,"SELECT document_no FROM tenant order by document_no desc");
$arr1=mysqli_fetch_assoc($query1);
$document1=$arr1['document_no'];

$query2=mysqli_query($conn,"SELECT document_no FROM property_details order by document_no desc");
$arr2=mysqli_fetch_array($query2);
$doc2=$arr2['document_no'];

$query3=mysqli_query($conn,"SELECT document_no FROM family_members order by document_no desc");
$arr3=mysqli_fetch_assoc($query3);
$document3=$arr3['document_no'];

$query4=mysqli_query($conn,"SELECT document_no FROM amenities order by document_no desc");
$arr4=mysqli_fetch_assoc($query4);
$document4=$arr4['document_no'];

$query5=mysqli_query($conn,"SELECT * FROM owner order by document_no desc ");
$arr5=mysqli_fetch_assoc($query5);
$name1=$arr5['name1'];

$query6=mysqli_query($conn,"SELECT * FROM payment order by document_no desc ");
$arr6=mysqli_fetch_assoc($query6);
$document6=$arr4['document_no'];

// echo "<script>alert('$document , $idpayment');</script>";

if($document!=$idpayment){
echo "please fill owner details";
 }
 else if($document1!=$idpayment){
echo "please fill tenant details";
 }
 else if($document3!=$idpayment){
echo "please fill family details";
 }
 else if($document4!=$idpayment){
echo "please fill amenities details";
 }
 else if($name1==""){
echo "please fill witness details";
 }
 else if($document6!=$idpayment){

 }
else{
	$sql=mysqli_query($conn,"	UPDATE `payment` SET `document_no`='$idpayment',`security_deposit`='$security_deposit',`rent_amount`='$rent_amount',`bank`='$bank',`method`='$method',`date`='$date',`tid`='$tid' WHERE document_no='$idpayment'");
	if($sql==1){	
    echo "successfully updated";
  	}else{
		echo "something went wrong";
	}

}
}

if(isset($_GET['familydelid'])){
$deleteid=$_GET['familydelid'];	
	$sql=mysqli_query($conn,"delete from family_members where id='$deleteid'");
	if($sql==1){	
	header("edit_newagreement.php");
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['deleteid'])){
$deleteid=$_GET['deleteid'];	
	$sql=mysqli_query($conn,"delete from amenities where id='$deleteid'");
	if($sql==1){	
	header("edit_newagreement.php");
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}
?>