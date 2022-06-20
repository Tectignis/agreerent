
<?php  
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
if(!isset($_SESSION['id'])) 
{
 header("Location:adminlogin.php"); 
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
</style>

<body>

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
</body>

</html>
