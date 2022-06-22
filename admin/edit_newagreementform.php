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
//new_agreement
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
if(!mysqli_num_rows($query)>0){
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
if(isset($_POST['submitenan'])){
     $idtenant=$_POST['exampledno'];
	$surname=$_POST['exampleSelectmr'];
	$name=$_POST['txtname3'];
  $age=$_POST['id2'];
  $permanent_address=$_POST['presentAddress'];
  $officename=$_POST['officename'];
  $officeno=$_POST['officeno'];
  $officeaddress=$_POST['officeaddress'];
	$address=$_POST['residenceAddress'];
	$mobile=$_POST['phone'];
	$aadhaar=$_POST['txtAadhar1'];
	$pancard=$_POST['txtPANCard1'];
  $email=$_POST['emailcheck'];
	$passport=$_POST['passport'];

$query=mysqli_query($conn,"select * from tenant where document_no='$idtenant'");
$num=mysqli_fetch_array($query);
	if(!mysqli_num_rows($query)>0){
		$sql=mysqli_query($conn,"INSERT INTO `tenant`(`document_no`, `abbreviation`, `fullname`,`age`, `address`,`permanent_address`, `mobile`, `email`,`passport`,`aadhaar`, `pan_card`,`office_name`, `office_addres`, `office_phone`) VALUES 
  ('$idtenant','$surname','$name','$age','$address','$permanent_address','$mobile','$email','$passport','$aadhaar','$pancard','$officename','$officeaddress','$officeno')");
	if($sql==1){	
     echo "successfully inserted";
  	}else{
		echo "something went wrong";
	}
	}
	else{
	$sql=mysqli_query($conn,"UPDATE `tenant` SET `document_no`='$idtenant',`abbreviation`='$surname',`fullname`='$name',`age`='$age',`address`='$address',`permanent_address`='$permanent_address',`mobile`='$mobile',`email`='$email',`passport`='$passport',`aadhaar`='$aadhaar',`pan_card`='$pancard',`office_name`='$officename',`office_addres`='$officeaddress',`office_phone`='$officeno' WHERE document_no='$idtenant'");
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

$query=mysqli_query($conn,"select * from property_details where document_no='$idproperty'");
if(!mysqli_num_rows($query)>0){
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
  ('$idfamily','$name','$age','$relation','$gender')
");
	if($sql==1){	
   echo "successfully Inserted";
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
	   <td><a href='edit_newagreement.php?familydelid=".$arr['id']." ?>'
                                                                    alt='delete'><i class='fas fa-trash' onclick='return confirm('Are you sure you want to delete this data')'></i></a></td>
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

     echo "successfully updated witness";
  	}else{
		echo "something went wrong";
	}
}


//aminities
if(isset($_POST['submitaminitie'])){
		$idaminities=$_POST['no6'];
	$name=$_POST['txtname2'];  
  $number=$_POST['itemnumbe'];
	
	
	$sql=mysqli_query($conn,"INSERT INTO `amenities`(`document_no`,`name`,`number`) VALUES 
  ('$idaminities','$name','$number')");

	if($sql==1){	
   echo "successfully updated member";
  	}

}
if(isset($_POST['submitaminitie'])){
	$idaminities=$_POST['no6'];
	
	$sql=mysqli_query($conn,"select * from amenities where document_no='$idaminities'");
	echo '<tr></tr>';
	while($arr=mysqli_fetch_array($sql)){
     echo " <tr>
        <td>". $arr['name']."</td>
        <td>". $arr['number'] ."</td>
		 <td><a href='edit_newagreement.php?deleteid=".$arr['id']."'
                                                                    alt='delete'><i class='fas fa-trash'></i></a></td>
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
  $rentpay=$_POST['rentpay'];
  $tid=$_POST['tid'];

  $document='';

  $query=mysqli_query($conn,"SELECT document_no FROM owner where document_no ='$idpayment'");

  $query1=mysqli_query($conn,"SELECT document_no FROM tenant where document_no ='$idpayment'");
  
  $query2=mysqli_query($conn,"SELECT document_no FROM property_details where document_no ='$idpayment'");
  
  $query3=mysqli_query($conn,"SELECT document_no FROM family_members where document_no ='$idpayment'");
  
  $query4=mysqli_query($conn,"SELECT document_no FROM amenities where document_no ='$idpayment'");
  
  $query6=mysqli_query($conn,"SELECT document_no FROM payment where document_no ='$idpayment'");
  
  $query5=mysqli_query($conn,"SELECT * FROM owner where document_no ='$idpayment' ");
  $arr5=mysqli_fetch_assoc($query5);
  $name1=$arr5['name1'];
  
  
  if(!mysqli_num_rows($query)>0){
  echo "please fill owner details";
  }
  else if(!mysqli_num_rows($query1)>0){
  echo "please fill tenant details";
  }
  else if(!mysqli_num_rows($query2)>0){
  echo "please fill family details";
  }
  elseif(!mysqli_num_rows($query3)>0){
  echo "please fill property details";
  }
  else if(!mysqli_num_rows($query4)>0){
  echo "please fill amenities details";
  }
  else if($name1==''){
  echo "please fill witness details";
  }
  else if(mysqli_num_rows($query6)>0){
  $sql=mysqli_query($conn,"UPDATE `payment` SET `document_no`='$idpayment',`security_deposit`='$security_deposit',`rent_amount`='$rent_amount',`bank`='$bank',`method`='$method',`date_of_payment`='$rentpay',`date`='$date',`tid`='$tid' WHERE document_no='$idpayment'");
  if($sql==1){
  echo "Successfully updated";
  }else{
  echo "Something went wrong";
  }

}
else{
	$sql=mysqli_query($conn,"INSERT INTO `payment`(`document_no`, `security_deposit`, `rent_amount`, `bank`, `method`,`date_of_payment`, `date`, `tid`) VALUES ('$idpayment','$security_deposit','$rent_amount','$bank','$method','$rentpay','$date','$tid')");
	if($sql==1){
		echo "Successfully Inserted";
		}else{
		echo "Something went wrong";
		}
}
}


?>