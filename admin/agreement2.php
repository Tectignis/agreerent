
<?php  
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("../config/config.php");
$fid=$_GET['id'];

if($_GET['id']==''){
    header('Location:newagreement.php');
    } 
function AmountInWords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Agreement</title>
</head>
<style>
table,
td,
th {
    border: 1px solid #595959;
    border-collapse: collapse;
}

td,
th {
    padding: 3px;
    width: 30px;
    height: 25px;
}

th {
    background: #f0e6cc;
}

.even {
    background: #fbf8f0;
}

.odd {
    background: #fefcf9;
}

.receipt {
    text-align: center;
}

.bluediv {
  padding-top: 50px;
}
p.ex1 {
  margin-left: 500px;
}
table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
}
td, th {
	padding: 3px;
	width: 30px;
	height: 25px;
}
th {
	background: #f0e6cc;
}
.even {
	background: #fbf8f0;
}
.odd {
	background: #fefcf9;
}	
</style>

<body>
<!-- stamp paper -->
<?php 
              
$sql=mysqli_query($conn,"select owner.fullname as oname, owner.age as oage, owner.occupation as ooccupation,owner.aadhaar as oaadhaar,owner.pan_card as opancard, owner.address as oaddress, tenant.fullname as tname,tenant.aadhaar as taadhaar,tenant.pan_card as tpancard, tenant.age as tage, tenant.occupation as toccupation, tenant.address as taddress, new_agreement.date_of_agreement as doa,new_agreement.place_of_agreement as poa, new_agreement.document_no as docno from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on new_agreement.document_no=tenant.document_no where new_agreement.document_no");
$arr=mysqli_fetch_array($sql);
$doc=$arr['docno'];
						?>
    <div class="page"
        style="width:215mm; height:130mm; margin-top:200mm; margin-bottom:1cm; margin-left:3cm; margin-right:2cm; font-family: Arial; font-size:18px;">
        <h2 align="center">LEAVE AND LICENSE AGREEMENT</h2>
        <p align="center">This agreement is made and executed on <b><?php echo $arr['doa'];?></b> at
            <b><?php echo $arr['poa'];?></b>
        </p>
        <p align="center">Between,</p>
        <p><b><?php echo $arr['oname'];?>, &nbsp;</b>&nbsp;Age:<b>&nbsp;About <?php echo $arr['oage'];?></b>&nbsp;Years,
            Occupation:<b>&nbsp;<?php echo $arr['ooccupation'];?></b>&nbsp;PANCARD:<b>&nbsp;<?php echo $arr['opancard'];?>,</b>&nbsp;
            UID: <b><?php echo $arr['oaadhaar'];?></b>
            . Residing at:<b><?php echo $arr['oaddress'];?></b>
            HEREINAFTER called ‘the Licensor (which expression shall mean and include the Licensor above
            named as also his respective heirs, successors, assigns, executors and administrators)</p>

        <p align="center">AND</p>
        <p><b><?php echo $arr['tname'];?>, &nbsp;</b>&nbsp;Age:<b>&nbsp;About <?php echo $arr['tage'];?></b>&nbsp;Years,
            Occupation:<b>&nbsp;<?php echo $arr['toccupation'];?>,</b>&nbsp;PANCARD:<b>&nbsp;<?php echo $arr['tpancard'];?>,</b>&nbsp;
            UID: <b><?php echo $arr['taadhaar'];?></b>
            . Residing at:<b><?php echo $arr['taddress'];?></b>
            HEREINAFTER called ‘the Licensee’ (which expression shall mean and include only Licensee
            above named).</p>

    </div>
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
<!-- agreement -->


<?php 
	
	$sql=mysqli_query($conn,"select * from property_details");
	 $arr=mysqli_fetch_array($sql);
     $doc=$arr['document_no'];
	?>

    <p><b>WHERE AS : </b> </p>
    <p>The LICENSOR is fully seized and possessed of or otherwise well and sufficiently entitled to hold the following
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;}?></p> <br>

    <div>
        <table style="width: 100%;">
            
            <tbody>

                <tr>
                    <td>FLAT/SHOP NO.</td>
                    <td>PLOT NO.</td>
                    <td>SECTOR</td>
                    <td>AREA(in Sq.feet)</td>
                </tr>
                <tr>
                    <td><?php echo $arr['address'];?></td>
                    <td><?php echo $arr['plot_no'];?></td>
                    <td><?php echo $arr['sector'];?></td>
                    <td><?php echo $arr['area'];?></td>
                </tr>
                <tr>
                    <td colspan="4">CIDCO APARTMENT:<b><?php echo $arr['cidco'];?></b></td>
                </tr>
                <tr>
                    <td colspan="4">CO.OP.HSG.SOCITY:<b><?php echo $arr['chs'];?></b></td>
                </tr>
                <tr>
                    <td colspan="4">NODE:<b><?php echo $arr['node'];?></b></td>
                </tr>
            </tbody>

        </table>
        <?php 
	
	$sql=mysqli_query($conn,"select * from property_details");
	 $arr=mysqli_fetch_array($sql);
     $doc=$arr['document_no'];
	?>

    </div><br>
    hereinafter called and referred to as THE SAID<b> <?php echo $arr['property_type'];?></b>.<br>
    <p><b>AND WHERE AS:</b></p>
    <p>The owner who on account of certain personal reasons is not occupying the said premise; and the LICENSEE being
        temporarily in need of a RESIDENTIAL ACCOMODATION/BUSINESS PREMISES requested the owner to give on ''LEAVE &
        LICENSE BASIS , as a temporary facility, the use of the said premises, together with the fixtures and lying
        thereon, on the terms and conditions recorded hereinafter.</p>  <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
    <p><b>AND WHERE AS:</b></p>
    <?php 
	
	

        $sql=mysqli_query($conn,"select * from tenant");
	 $arr=mysqli_fetch_array($sql);
     $doc=$arr['document_no'];
	?>
    <p>As per the recent orders from the Department of police, the Licensee furnish the following details and further
        agrees to co-operate in getting No Objection Certificate from the local police by appearing personally as when
        called by the police under which jurisdiction the said premise is covered.</p>
    <p>iPermanent Native Address:&nbsp;<?php echo $arr['permanent_address'];?></p>
    <p>iiPresent Address :&nbsp;<?php echo $arr['address'];?></p>
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
    <p>iiiThe photograph of the LICENSOR and LICENSEE is a appended in appropriate place.</p>
    <?php 
	
	$sql=mysqli_query($conn,"SELECT * FROM `new_agreement` inner join payment on new_agreement.document_no=payment.document_no");
    $doc=$arr['document_no'];
	$arr=mysqli_fetch_array($sql);
		$amt_words=$arr['rent_amount'];
		$get_amount = AmountInWords($amt_words);
	?>


    <p><b>NOW THIS AGREEMENT WITNESSETH AS UNDER</b></p>
    <p>1. The owner do hereby grants to the LICENSEE his/her permission to enter upon, occupy and look after,
        temporarily, the said premises for a certain period of MONTHS, which shall commence from DAY of
        <?php echo $arr['date_of_agreement'];?>. And shall expire on this day of <?php echo $arr['property_type'];?></p>
    <p>2. The LICENSEE convents with the owenr that LICENSEE shall observe and perform the following terms and
        conditions:</p>
    <p>b To pay a Monthly compensation of sum of <b>Rs.<?php echo $arr['rent_amount'];?>/- </b>
        (<u><?php echo $get_amount;?></u> ONLY.) as per English calendar month, in advance and thereafter on the<b><?php echo $arr['date_of_payment'];?></b> of
        each ensuring month.</p>
    <p>C The Electricity, water and any others applicable service charges shall be regularly paid by the LICENSEE, where
        society maintenance charges and Lease Tax , property TAX , if any shall be paid by the OWNER/LICENSOR.</p>
    <p>dTo use the said premise for RESIDENTIAL/BUSINESS purpose only . Note to cause ,permit or suffer anything in any
        way which may become a nuisance or annoyance or cause damage/ loss to the said premises or to the neighbor's
        property.</p>
    <p>e) Not to sublet, transfer or otherwise part with the possession of the said premises or any part thereof to
        anyone.</p>
    <p>f) TO permit the owner and facilitate him/her to inspect the said premises at any reasonable time during the
        period of this Agreement.</p>
    <p>3. It is hereby expressly agreed and declared that neither this Agreement nor anything contained herein shall be
        deemed to create any interest or estate in favor of the LICENSEE in the said premise and that relationship of
        the two parties shall always be that of LICENSOR and LICENSEE only.</p>
    <p>4) The LICENSEE is entitled to surrender the said premises by giving the LICENSOR, one calendar month’s notice,
        in writing or his intention and at the expiry of the said notice period, this Agreement shall REVOKED and the
        LICENSEE shall be entitled to get the security Deposit amount refunded, against the delivery of the vacant
        possession.</p>
    <p>a) The LICENSOR may also give one calendar month’s notice, in case the LICENSOR wish to terminate the Agreement
        entered in to between the parties, and is ready and willing to refund the security deposit against delivery of
        the possession.</p>
    <p>5. on expiry of the Agreement period , the LICENSEE shall remove all his belongings and shall handover vacant and
        peaceful physical possession back to the LICENSOR and shall quit the the said premise without causing hindrance
        . The LICENSEE is liable to pay for any damages caused by him/her, And the LICENSOR Shall give back the
        security.</p>
    <p>6. In case the LICENSEE does not vacate the said premises on the expiry of the term , then owner shall be
        entitled to and he is hereby authorized by the LICENSEE to remove all the LICENSEE’S belongings and keep the
        same outside the said premises without being responsible for any loss or damage caused to the same thereto.</p>
    <p>7. Without prior NOC of the Flat/Shop Owner, the Licensee CAN NOT apply for RATION CARD, GAS CONNECTION, MOBILE
        or LANDLINE,CREDIT CARD, ANY KIND OF LOANS. If so done by the Licensee shall be responsible and liable for the
        bill pending/outstanding of any mobile company, banks or financial institution. The flat/shop is given on purely
        temporary basis to the Licensee only for RESIDENTIAL/BUSINESS purpose only.</p>
    <p>8. Control Act 1999, as amended up to date, whereby it is mentioned if the licensee fails to deliver possession
        of the licensee period , the licensee shall be liable to pay damages/compensation, provided under this agreement
        form the date of such failure to the actual date of handling over possession of the said premise.</p>
    <p>9. The following persons are staying with the Licensee :</p>

    <table style="width: 100%;">
        <tbody>

            <tr>
                <td>Sr.No</td>
                <td>Name</td>
                <td>Relation</td>
                <td>Age</td>
            </tr>
            <?php 
	
	
        $sql=mysqli_query($conn,"select * from family_members");
        $count=1;
        $arr=mysqli_fetch_array($sql);
        $doc=$arr['document_no'];
	?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $arr['name'];?></td>
                <td><?php echo $arr['relation'];?></td>
                <td><?php echo $arr['age'];?></td>
            </tr>

            <?php $count++; if($doc==$fid){echo $arr[' ']; }else{ echo ' - ' ;} ?>

        </tbody>
    </table>


    <p>10. List of Amenities:</p>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>Sr.No</td>
                <td>Name</td>
                <td>No. of Items</td>
            </tr>
            <?php 
	
	
        $sql=mysqli_query($conn,"select * from amenities");
        $arr=mysqli_fetch_array($sql);
        $doc=$arr['document_no'];
	?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $arr['name'];?></td>
                <td><?php echo $arr['number'];?></td>

            </tr>

            <?php $count++;if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>

        </tbody>
    </table>
    <?php 
	


        $sql=mysqli_query($conn,"select * from agent_details");
        $arr=mysqli_fetch_array($sql);
        $doc=$arr['document_no'];
	?>
    <p>IN CASE THE LEAVE & LICENSE AGREEMENT IS EXTENDED THEN THE LICENSEE SHALL PAY THE COMMISSION/BROKERAGE TO THE
        ESTATE AGENT <b><?php echo $arr['agent_name'];?></b>. </p>
    <p>IN WITHNESS WHEREOF THE PARTIES HERETO HAVE EXECUTED THIS AGREEMENT IN THE MNNER HEREINAFTER APPEARING ON TH DAY
        AND THE YEAR FIRST HEREIN ABOVE WRI</p>
    <p><b>Within named 'LICENSOR'</b></p>
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>


    <?php 
	
	

        $sql=mysqli_query($conn,"select * from owner");
        $arr=mysqli_fetch_array($sql);
        $doc=$arr['document_no'];
	?>
    <p><b><?php echo $arr['abbreviation'];?><u><?php echo $arr['fullname'];?> </b></u></p>
    <p>In the presence of ………</p>

    <p>1.<?php echo $arr['name1'];?></p>
    <p>2.<?php echo $arr['name2'];?></p>
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>

    <?php 
	 $sql=mysqli_query($conn,"select * from tenant");
     $arr=mysqli_fetch_array($sql);
     $doc=$arr['document_no'];


	?>
    <p><b>SIGNED AND DEVELOPED by the</b></p>
    <p><b>Within named 'LICENSEE'</b></p>
    <p><b><?php echo $arr['abbreviation'];?><u><?php echo $arr['fullname'];?> </b></u></p>
    <p>In the presence of ………</p>

    <p>1.<?php echo $arr['name1'];?></p>
    <p>2.<?php echo $arr['name2'];?></p>
    <?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>


<!-- police noc form -->
<div class="pagebreak"> 

    <h2 align="center">भाडेकरु माहिती फॉर्म</h2>
	<p class="ex1">रजिस्टर नंबर :-</p>
	<p class="ex1">दिनांक :-</p>
<!--	<div class="row" style="padding:10px;text-align:center;">
<div class="row" style="display:flex;">
                <div class="" style="padding-top:10px;" >
				<img alt="Image html" style="max-height:800px;max-width:150px;" src="images/Shape 1.svg"height="100%">
                </div>
                <div class="" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>						
                </div>
	</div> -->
	<img src="images/photo001.jpg" width="1000px" height="200px" >
	<table width="100%">
	<tbody>
	
		<tr>

			<td style="width:5%">१</td>
			<td style="width:48%">घर मालकाचे संपूर्ण नाव, सध्याचा पत्ता, वय, मोबाईल क्रमांक <br>Owner Full Name, Address,Age & Mobile No. of Owner</td>
			<?php 
                        
						$sql=mysqli_query($conn,"select * from owner where document_no");
                        $arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
						?>
			<td colspan="3"><label><?php echo $arr['fullname'];?></label></br>
						<label><?php echo $arr['address'];?></label></br>
						<label><?php echo $arr['mobile'];?></label></td>
				

		</tr>
		<tr>
			<td>२</td>
			<td>घरमालकाचे पॅनकार्ड क्रमांक आणि आधार कार्ड क्रमांक<br>Pancard No and Aadhar Card No of Owner</td>
			<td  colspan="3"><label><?php echo $arr['pan_card'];?></label></br>
                            <label><?php echo $arr['aadhaar'];?></label></br></td>
		</tr>
		<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * from tenant where document_no");
						$arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
						?>
			<td>३</td>
			<td>भाडेकरुचे संपूर्ण नाव, यापूर्वीचा पत्ता, वय, मोबाईल क्रमांक<br>Tenant Name, Previous Address & Mobile No. of Tenant</td>
			<td  colspan="3"><label><?php echo $arr['fullname'];?></label></br>
						<label><?php echo $arr['address'];?></label></br>
						<label><?php echo $arr['mobile'];?></label></td>
		</tr>
		<tr>
			<td>४</td>
			<td>भाडेकरूचे पॅनकार्ड क्रमांक आणि आधार कार्ड क्रमांक<br>Pancard No and Aadhar Card No of Tenant</td>
			<td  colspan="3"><label><?php echo $arr['pan_card'];?></label></br>
                            <label><?php echo $arr['aadhaar'];?></label></br></td>
		</tr>
		

		<tr>
			<td>५</td>
			<td>भाडेकरुचे मूळ गावचा पत्ता<br>Tenant Permanent Address of Tenant</td>
			<td  colspan="3"><?php echo $arr['permanent_address'];?></td>
		</tr>
		<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
		<tr>
		<?php 
                        
                        $sql=mysqli_query($conn,"select * from property_details where document_no");
                        $arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
                        ?>
			<td>६</td>
			<td>भाड्याने देण्यात येणाऱ्या जागेचा पत्ता <br>Address of Rental Room</td>
			<td colspan="3"><label><?php echo $arr['address'];?></label></td>
			<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
		</tr>	

		<tr>
		<?php 
                        
                        $sql=mysqli_query($conn,"select * from agent_details where user_id='$_SESSION[id]'");
                        $arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
                        ?>
			<td>७</td>
			<td>एजंटचे नाव, पत्ता, मोबाईल क्रमांक<br>Name of Agent, Address & Mobile No.</td>
			<td colspan="3"><label><?php echo $arr['agent_name'];?></label><br>
			<label><?php echo $arr['office_address'];?></label><br>
			<?php echo $arr['mobile_no'];?></label><br></td>
			<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>

		</tr>		
		<tr>
			<td rowspan="2">८</td>
			<td rowspan="2">भाडेकरुचे परिवारातील सदस्यांची संख्या <br> No. of Tenant Family Members</td>    
			
			<td align="center">पुरुष</td>
			<td align="center">स्त्रिया</td>
			<td align="center">लहान मुले</td>
		</tr>
		<tr >
		    <?php 
		    $sql=mysqli_query($conn,"select * from family_members where gender='male' and age>18 and document_no= '$fid'");
		    $res=mysqli_num_rows($sql);
		    ?>
			<td align="center"><?php echo $res ?></td>
			<?php 
		    $sql1=mysqli_query($conn,"select * from family_members where gender='female' and age>18 and document_no= '$fid'");
		    $res1=mysqli_num_rows($sql1);
		    ?>
			<td align="center"><?php echo $res1 ?></td>
			<?php 
		    $sql2=mysqli_query($conn,"select * from family_members where age<18 and document_no= '$fid'");
		    $res2=mysqli_num_rows($sql2);
		    ?>
			<td align="center"><?php echo $res2 ?></td>
		</tr>
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * from tenant where document_no");
                        $arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
						?>
			<td>९</td>
			<td>भाडेकरुचे ई-मेल आयडी<br>E-mail ID of Tenant</td>
			<td colspan="3"><label><?php echo $arr['email'];?></label></td>
		</tr>
		<tr>
			<td>१०</td>
			<td>भाडेकरुचे पासपोर्ट नंबर <br> Passport No. of Tenant</td>
			<td colspan="3"><label><?php echo $arr['passport'];?></label></td>
		</tr>
		<tr>
			<td>११</td>
			<td>कामाचे स्वरूप [पुराव्यासह]<br>Nature of Work & Proof</td>
			<td colspan="3"><label><?php echo $arr['occupation'];?></label></td>
		</tr>
		<tr>
			<td>१२</td>
			<td>काम करत असलेल्या कार्यालयाचे नाव, पत्ता, फोन नंबर <br>Office Name, Address & Phone No.</td>
			<td colspan="3"><?php echo $arr['office_name'];?></label><br>
			<?php echo $arr['office_addres'];?></label><br>
			<?php echo $arr['office_phone'];?></label></td>
		</tr>		
		<tr>
			<td>१३</td>
			<td>भाडेकरुला ओळखणाऱ्या दोन व्यक्तीचे संपूर्ण नाव, पत्ता, मोबाईल क्रमांक <br>Two persons reference with Address & Mobile No.</td>
			<td colspan="3"><label><?php echo $arr['name1'];?></label><br>
			<label><?php echo $arr['name2'];?></label></td>
		</tr>	
		<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>	
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * ,date_add(date_of_agreement, INTERVAL no_of_month month)as Enddate from new_agreement Where document_no");
                        $arr=mysqli_fetch_array($sql);
                        $doc=$arr['document_no'];
						?>
			<td>१४</td>
			<td>करार केल्याची तारीक व कराराचा कालावधी <br>Date of Agreement & Period</td>
			<td colspan="3">Start Date:-&nbsp;<label><?php $input=$arr['date_of_agreement']; $date=strtotime($input);
										echo date('d-m-Y',$date);?></label>&nbsp;&nbsp;&nbsp;
							End Date:-&nbsp;<label><?php $input=$arr['Enddate'];$date=strtotime($input);
										echo date('d-m-Y',$date);?></label></br>
										

			<label><?php echo $arr['no_of_month'];?>&nbsp;Months</label></td>
			<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>	

		</tr>
	</tbody>
</table>
	<p align="center">अर्जा सोबत सादर करावयाची छायांकीत प्रमाणपत्रे</p>
   <div style="width: 100%;">
        <div style="width: 50%;  float: left;"> 
            <h4 align="center">घर मालक</h4>
			<p>१) ओळखपत्र</p>
			<p>२) राहण्याचा पुरावा</p>
			<p>३) लाईटबील , पजेशन लेटर , पाणीबील , टॅक्सबील, सोसायटी मेंटेनन्स पावती यापैकी कोणतेही एक</p>
			<h4 class="bluediv" align="center">घर मालकाची स्वाक्षरी&nbsp;&nbsp;Signature of Owner</h4>
        </div>
        <div style="margin-left: 50%;"> 
            <h4 align="center">भाडेकरु</h4>
			<p>१) कंपनीचे ओळखपत्र</p>
			<p>२) काम करीत असलेल्या ठिकाणचे सिलसहित प्रमाणपत्र</p>
			<p>३) मूळ वास्तव्याचा पुरावा [मतदान ओळखपत्र, पासपोर्ट, ग्रामपंचायत दाखला , शाळेचा दाखला , रेशनकार्ड यापैकी कोणतेही एक]</p>
			<h4 class="bluediv" align="center">भाडेकरूची स्वाक्षरी&nbsp;&nbsp;Signature of Tenant</h4>
        </div>
    </div>

	<h4 align="center">घोषणापत्र</h4>
	<p align="center">वरील भरुन दिलेली माहिती ही खरी असून त्यामध्ये काही खोटे आढळल्यास भी कायदेशीर कार्यवाहीस पात्र राहिन.</p>
	<p align="center">टिप:- सदर माहितीचा / फॉर्मचा उपयोग केवळ पोलीसांच्या रेकॉर्डसाठी असून अन्य कोणत्याही कारणासाठी पुरवा म्हणून वापरता येणार नाही. </p>
    </div>
    <!-- receipt -->
    <h1 style="text-align: center">Receipt</h1>
<?php $sql=mysqli_query($conn,"select tenant.fullname as tname, payment.document_no as dno, payment.security_deposit as rent from payment inner join tenant on payment.document_no=tenant.document_no where payment.document_no");
                 
          


        $arr=mysqli_fetch_array($sql);
        $doc=$arr['dno'];
                    ?>

		<p>RECEIVED OF AND FROM the withinamed LICENSEE MR/Mss:&nbsp;<b><u><?php echo $arr['tname'];?>.</u></b>
		The sum of Rs.<b><u><?php echo $arr['rent'];?></u></b>/- (<b><u><?php echo $get_amount;?>Only</u></b>)</p>
<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
	<br>
	<br>
	<div>
	<table style="width: 100%;">
	<?php 
	
	$sql=mysqli_query($conn,"select * from property_details where document_no");
    $arr=mysqli_fetch_array($sql);
    $doc=$arr['document_no'];
	?>
	<tbody>

		<tr>
			<td>FLAT/SHOP NO.</td>
			<td>PLOT NO.</td>
			<td>SECTOR</td>
			<td>AREA(in Sq.feet)</td>
		</tr>
		<tr>
			<td><?php echo $arr['address'];?></td>
			<td><?php echo $arr['plot_no'];?></td>
			<td><?php echo $arr['sector'];?></td>
			<td><?php echo $arr['area'];?></td>
		</tr>
		<tr>
			<td colspan="4">CIDCO APARTMENT:<b><?php echo $arr['cidco'];?></b></td>
		</tr>
		<tr>
			<td colspan="4">CO.OP.HSG.SOCITY:<b><?php echo $arr['chs'];?></b></td>
		</tr>
		<tr>
			<td colspan="4">NODE:<b><?php echo $arr['node'];?></b></td>
		</tr>
	</tbody>
	<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
 
</table>
</div>
	<br>
	<br>
	<br>
	<div>
		<table style="width: 100%;">
		<?php 
	
	$sql=mysqli_query($conn,"select * from payment where document_no");
    $arr=mysqli_fetch_array($sql);
    $doc=$arr['document_no'];
	?>
	<tbody style="text-align: center">
		<tr style="text-align: center">
			<td colspan="4">PAYMENT SCHEDULE OF SECURITY DEPOSIT</td>
		</tr>
		<tr style="text-align: center">
			<td>Cheque/Cash</td>
			<td>Date</td>
			<td>Amount</td>
			<td>Bank</td>
		</tr>
		<tr>
			<td><?php echo $arr['method'];?></td>
			<td><?php echo $arr['date'];?></td>
			<td><?php echo $arr['security_deposit'];?></td>
			<td><?php echo $arr['bank'];?></td>
		</tr>
	</tbody>
	<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
		</table>
	</div>

			<br>
			<br>
			<div style="padding-left: 70%;">I SAY RECEIVED</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php $sql=mysqli_query($conn,"select owner.fullname as oname,payment.document_no as pdno, owner.name1 as o1,owner.name2 as o2,owner.abbreviation as abb, payment.security_deposit as rent from payment inner join owner on payment.document_no=owner.document_no where payment.document_no");
                 
                 $arr=mysqli_fetch_array($sql);
                 $doc=$arr['pdno'];
                    ?>

			<div style="padding-left: 70%;">Rs.<u><b><?php echo $get_amount;?>/-</u></b></div>
			<br>
			<br>
			<div style="padding-left: 70%;"><u><b><?php echo $arr['abb'];?>.<?php echo $arr['oname'];?></u></b></div><br>
			<div style="padding-left: 76%;">(LICENSOR)</div>
			<div>WITNESSES:</div>
			<br>
			<br>
			<div>1.<?php echo $arr['o1'];?></div>
			<br>
			<br>
			<br>
			<div>2.<?php echo $arr['o2'];?></div>
			<?php if($doc==$fid){echo $arr['property_type']; }else{ echo ' - ' ;} ?>
</body>

</html>
