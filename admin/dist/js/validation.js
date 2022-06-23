let odnkname,odnkadhar, odnkpan;
$(document).ready(function(){
    $("#spanname").hide();
    $("#spanAadharCard").hide();
    $("#spanCard").hide();
  
    $("#txtname").keyup(function(){
        ownname_fun();
    });
    function ownname_fun(){
        odnkname="no";
        let txt=$("#txtname").val();
       let vali =/^[A-Za-z ]+$/;
       if(!vali.test(txt)){
        $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
        odnkname = false;
        return false;
       }
           else{
            odnkname="yes";
            $("#spanname").hide()
           }
    }
  
    $("#txAdhar").keyup(function(){
        owneradhar_fun();
    });
    function owneradhar_fun(){
        let aadharcard=$("#txAdhar").val();
       let vali =/^\d{12}$/; 
       if(!vali.test(aadharcard)){
        odnkadhar="no";
          $("#spanAadharCard").show().html("*Invalid Aadhar No").css("color","red").focus();
                odnkadhar = false;
          return false;
       }
           else{
            odnkadhar="yes";
            $("#spanAadharCard").hide();                             
           }
    }
  
    $("#txtPANCard").keyup(function(){
        ownpan_fun();
    });
    function ownpan_fun(){
        let pancard=$("#txtPANCard").val();
       let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
       if(!vali.test(pancard)){
        odnkpan="no";
          $("#spanCard").show().html("*Invalid Pan No").css("color","red").focus();
          return false;
       }
           else{
            odnkpan="yes";
            $("#spanCard").hide();
           }
    }
  
      
});

//tenant
let tenanttname;
$(document).ready(function(){
$("#spannamete").hide();

$("#txtname3").keyup(function(){
   tentname_fun();
});
function tentname_fun(){
    let txt=$("#txtNameTenant").val();
	let vali =/^[A-Za-z ]+$/;
	 if(!vali.test(txt)){
        tenanttname="no";
	    $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
		 return false;
	 }
     else{
        tenanttname="yes";
        $("#spannamete").hide();
     }
}
});