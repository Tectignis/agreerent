//owner
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
        $("#spanname").show().html("**Enter Alphabets only").css("color","red").focus();
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
          $("#spanAadharCard").show().html("**Invalid Aadhar No").css("color","red").focus();
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
          $("#spanCard").show().html("**Invalid Pan No").css("color","red").focus();
          return false;
       }
           else{
            odnkpan="yes";
            $("#spanCard").hide();
           }
    }
  
      
});

//tenant
let tenanttname,validTenantPan,validTenantAadhar;
$(document).ready(function(){
$("#spannameTenant").hide();
$("#spanAadharCardTenant").hide();
$("#spanCardTenant").hide();

$("#txtname3").keyup(function(){
   tentname_fun();
});
function tentname_fun(){
    let txt=$("#txtname3").val();
	let vali =/^[A-Za-z ]+$/;
	 if(!vali.test(txt)){
        tenanttname="no";
	    $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
		 return false;
	 }
     else{
        tenanttname="yes";
        $("#spannameTenant").hide();
     }
}

$("#txAdhartr").keyup(function(){
   tentadhar_fun();
});
function tentadhar_fun(){
    let aadharcard=$("#txAdhartr").val();
   let vali =/^\d{12}$/; 
   if(!vali.test(aadharcard)){
    validTenantAadhar="no";
      $("#spanAadharCardTenant").show().html("**Invalid Aadhar No").css("color","red").focus();
            odnkadhar = false;
      return false;
   }
       else{
        validTenantAadhar="yes";
        $("#spanAadharCardTenant").hide();                             
       }
}

$("#txtPANCard1").keyup(function(){
   tentpancard_fun();
});
function tentpancard_fun(){
    let pancard=$("#txtPANCard1").val();
   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
   if(!vali.test(pancard)){
    validTenantPan="no";
      $("#spanCardTenant").show().html("**Invalid Pan No").css("color","red").focus();
      return false;
   }
       else{
        validTenantPan="yes";
        $("#spanCardTenant").hide();
       }
}
});

//property
let propertydnkname
$(document).ready(function(){
    $("#spanCardTenant").hide();

$("#addressPro").keyup(function(){
    propname_fun();
});
function propname_fun(){
    let txt=$("#addressPro").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
            propertydnkname="no";
			  $("#spanCardTenant").show().html("** Enter Alphabets only").css("color","red").focus();
			  return false;
		   }
           else{
            propertydnkname="yes";
            $("#spanCardTenant").hide();}
}
});

//family
let familydnkname
$(document).ready(function(){
    $("#spanfamname").hide();

$("#txtname1").keyup(function(){
   family_fun();
});
function family_fun(){
    let txt=$("#txtname1").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        familydnkname="no";
       $("#spanfamname").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        familydnkname="yes";
     $("#spanfamname").hide();} 
}
});

//witness
let ownerdnkname,ownerdnk2name,tendnkname,ten2dnkna;
$(document).ready(function(){
$("#spanownername").hide();
$("#spanowner2name").hide();
$("#spantenantname").hide();
$("#spantenant2name").hide();

$("#nameowner").keyup(function(){
  ownewitname_fun();
});
function ownewitname_fun(){
    let txt=$("#nameowner").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        ownerdnkname="no";
       $("#spanownername").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        ownerdnkname="yes";
     $("#spanownername").hide();} 
}

$("#nameowner2").keyup(function(){
  ownerwitname2_fun();
});
function ownerwitname2_fun(){
    let txt=$("#nameowner2").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        ownerdnk2name="no";
       $("#spanowner2name").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        ownerdnk2name="yes";
     $("#spanowner2name").hide();} 
}

$("#twitness1").keyup(function(){
  tenrwiname_fun();
});
function tenrwiname_fun(){
    let txt=$("#twitness1").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        tendnkname="no";
       $("#spantenantname").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        tendnkname="yes";
     $("#spantenantname").hide();}
}

$("#twitness2").keyup(function(){
    twewitname_fun();
});
function twewitname_fun(){
    let txt=$("#twitness2").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        ten2dnkna="no";
       $("#spantenant2name").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        ten2dnkna="yes";
     $("#spantenant2name").hide();}
}
});

//aminities
let amindnkval;
$(document).ready(function(){
$("#spanaminitiesname").hide();

$("#txtname2").keyup(function(){
  aminities_fun();
});
function aminities_fun(){
    let txt=$("#txtname2").val();
    let vali =/^[A-Za-z ]+$/;
    if(!vali.test(txt)){
        amindnkval="no";
       $("#spanaminitiesname").show().html("** Enter Alphabets only").css("color","red").focus();
       return false;
    }
    else{
        amindnkval="yes";
     $("#spanaminitiesname").hide();}
}
});