





$("#checkselec")



let submitproperty = document.getElementById("submitproperty");
submitproperty.addEventListener("click", function(){
let exampleproperties = document.getElementById("exampleproperties").value;
let address = document.getElementById("addressPro").value;
let sector = document.getElementById("sector").value;
let plotno = document.getElementById("plotno").value;
let cidco = document.getElementById("cidco").value;
let area = document.getElementById("area").value;
let chs = document.getElementById("chs").value;
let node = document.getElementById("node").value;

if(exampleproperties == "" || address == "" || sector == "" || plotno == "" || cidco == "" || area == "" || chs == "" || node == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});





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



<!-- owner -->

	let validName, validAge, validAadhar, validPan, validMobile;
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spanname").hide();
	    $("#txtname").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtname").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			validName="no";
			  $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
			
		   }
		   else{
			validName="yes";
		       $("#spanname").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCard").hide();
	    $("#txtPANCard").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCard").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			validPan="no";
			    $("#spanCard").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
			validPan="yes";
		       $("#spanCard").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCard").hide();
	    $("#txAdhar").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdhar").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			validAadhar="no";
			    $("#spanAadharCard").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
			validAadhar="yes";
		       $("#spanAadharCard").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		   //MOBILE NO VALIDATION
		   $("#mobilespan").hide();
	    $("#mobile").keyup(function(){
			mobile_check();
	   });
	   function mobile_check(){
		   let mobileno=$("#mobile").val();
		   let vali =/^[6-9]\d{9}$/; 
		   if(!vali.test(mobileno)){
			validMobile="no";
			    $("#mobilespan").show().html("*Invalid Mobile No").css("color","red").focus();
				mobile_err=false;
			 return false;
		   }
		   else{
			validMobile="yes";
		       $("#mobilespan").hide(); 
		   }
	   }

	   $("#sub").click(function(){
		mobile_err = true;
			   mobile_check();
			   
			   if((mobile_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



      //age validation
      $("#demo").hide();
	    $("#id1").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#id1").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
	     	validAge="no";
            $("#demo").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
			validAge="yes";
            $("#demo").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



  });
  let subm = document.getElementById("subm");
  subm.addEventListener("click", function(){
  // let no1 = document.getElementById("no").value;
  let abbreviation = document.getElementById("examplemr").value;
  let name = document.getElementById("txtname").value;
  let age = document.getElementById("id1").value;
  let mobile = document.getElementById("mobile").value;
  let aadhaar = document.getElementById("txAdhar").value;
  let pancard = document.getElementById("txtPANCard").value;
  let address = document.getElementById("address").value;
  if( validName == "no" || validAge == "no" || validAadhar== "no" || validPan== "no" ||abbreviation == "" || name == "" || age == "" || mobile == "" || aadhaar== "" || pancard== "" || address== ""  ){
    swal("Oops...", "Please fill all the fields", "error");
  }
      else{
      swal("Saved!", "Agreement Save", "success");
    }
  });
    // let subm = document.getElementById("subm");
    //   subm.addEventListener("click", function(){
    //   let no1 = document.getElementById("no").value;
    //   let abbreviation = document.getElementById("examplemr").value;
    //   let address = document.getElementById("address").value;
    //   let ownername = document.getElementById("textname").value;

    //   // if(no1 == "" || abbreviation == "" || name == "" || age == "" || mobile == "" || aadhaar== "" || pancard== "" || address== ""  ){
    //   //     swal("Oops...", "Please fill all the fields", "error");
    //   // }
      
    //   // if(no1 == "" || abbreviation == "" || validName == "no" || validAge == "no" || mobile == "" || validAadhar== "no" || validPan== "no" || address== ""  ){
    //   //     swal("Oops...", "Please fill all the fields", "error");
    //   // }
    //   if( no1 == "" || ownername == "" || abbreviation == "" || validName == "no" || validAge == "no" || validMobile == "no" || validAadhar== "no" || validPan== "no" || address== ""  ){
    //       swal("Oops...", "Please fill all the fields", "error");
    //   }
    //       else{
    //         swal("Saved!", "Agreement Save", "success");
    //       }
    //   });


<!-- Tenant -->



 let validTenantName, validTenantAge, validTenantAadhar, validTenantPan, validTenantMobile, validTenantEmail;

  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameTenant").hide();
	    $("#txtNameTenant").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		validTenantName="no";
		   let txt=$("#txtNameTenant").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
			validTenantName="yes";
		       $("#spannameTenant").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


	

		  

      //PAN card validation
	   $("#spanCardTenant").hide();
	    $("#txtPANCardTenant").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCardTenant").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			validTenantPan="no";
			    $("#spanCardTenant").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
			validTenantPan="yes";
		       $("#spanCardTenant").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCardTenant").hide();
	    $("#txAdharTenant").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdharTenant").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			validTenantAadhar="no";
			    $("#spanAadharCardTenant").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
			validTenantAadhar="yes";
		       $("#spanAadharCardTenant").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


		  	  
		   //MOBILE NO VALIDATION
		   $("#phoneTenantSpan").hide();
	    $("#phoneTenant").keyup(function(){
	     mobile_check();
	   });
	   function mobile_check(){
		   let mobileno=$("#phoneTenant").val();
		   let vali =/^[6-9]\d{9}$/; 
		   if(!vali.test(mobileno)){
			validTenantMobile="no";
			    $("#phoneTenantSpan").show().html("*Invalid Mobile No").css("color","red").focus();
				mobile_err=false;
			 return false;
		   }
		   else{
			validTenantMobile="yes";
		       $("#phoneTenantSpan").hide(); 
		   }
	   }

	   $("#sub").click(function(){
		mobile_err = true;
		mobile_check();
			   
			   if((mobile_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		
		  
      //age validation
      $("#demoTenant").hide();
	    $("#idTenant").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#idTenant").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
		validTenantAge="no";
            $("#demoTenant").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
			validTenantAge="yes";
            $("#demoTenant").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		    // EMAIL NO
			$("#emailcheckTenantSpan").hide();
	    $("#emailcheckTenant").keyup(function(){
			email_check();
	   });
	   function email_check(){
	
		   let email=$("#emailcheckTenant").val();
		   let vali =/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
		   if(!vali.test(email)){
			validTenantEmail="no";
			  $("#emailcheckTenantSpan").show().html("Enter Valid Email No").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
			validTenantEmail="yes";
		       $("#emailcheckTenantSpan").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
		email_err = true;
	   email_check();
			   
			   if((email_err==true)){
			      return true;
			   }
			   else{return false;}
		  });




 });
 let submitenant = document.getElementById("submitenant");
     submitenant.addEventListener("click", function(){
     // let no2 = document.getElementById("no2").value;
     let name1 = document.getElementById("txtNameTenant").value;
     let officename = document.getElementById("officename").value;
     let officeno = document.getElementById("officeno").value;
     let phoneTenant = document.getElementById("phoneTenant").value;
     let txAdharTenant = document.getElementById("txAdharTenant").value;
     let emailcheckTenant = document.getElementById("emailcheckTenant").value;
     let idTenant = document.getElementById("idTenant").value;
     let pan = document.getElementById("txtPANCardTenant").value;
     let officeaddress = document.getElementById("officeaddress").value;
     let abbreviation = document.getElementById("exampleSelectmr").value;
     let address = document.getElementById("residenceAddress").value;
     let permanent_address = document.getElementById("presentAddress").value;
    
     // if( no2 == "" || abbreviation == "" || validTenantName == "no" || validTenantMobile == "no" || validTenantEmail == "no" || validTenantAadhar == "no" || validTenantAge == "no" || validTenantPan == "no" || address == "" || permanent_address == ""  ){
     //     swal("Oops...", "Please fill all the fields", "error");
     // }
     if( name1=="" || officename=="" || officeno=="" || phoneTenant=="" || txAdharTenant=="" || emailcheckTenant=="" || idTenant=="" || pan=="" || officeaddress=="" ||abbreviation == "" || validTenantName == "no" || validTenantMobile == "no" || validTenantEmail == "no" || validTenantAadhar == "no" || validTenantAge == "no" || validTenantPan == "no" || address == "" || permanent_address == ""  ){
         swal("Oops...", "Please fill all the fields", "error");
     }
         else{
             swal("Saved!", "Agreement Save", "success");
         }
     });


<!-- Property -->

  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameTenant").hide();
	    $("#txtNameTenant").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtNameTenant").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spannameTenant").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCardTenant").hide();
	    $("#txtPANCardTenant").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCardTenant").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			    $("#spanCardTenant").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
		       $("#spanCardTenant").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCardTenant").hide();
	    $("#txAdharTenant").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdharTenant").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			    $("#spanAadharCardTenant").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
		       $("#spanAadharCardTenant").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //age validation
      $("#demoTenant").hide();
	    $("#idTenant").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#idTenant").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demoTenant").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demoTenant").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });


<!-- Family Member -->

	let validFamilyName, validFamilyAge;
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameFamily").hide();
	    $("#txtnameFamily").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtnameFamily").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			validFamilyName="no";
			  $("#spannameFamily").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
			validFamilyName="yes";
		       $("#spannameFamily").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

      //age validation
      $("#demoFamily").hide();
	    $("#relativeage").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#relativeage").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
		validFamilyAge="no";
            $("#demoFamily").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
			validFamilyAge="yes";
            $("#demoFamily").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
 let submitmember = document.getElementById("submitmember");
 submitmember.addEventListener("click", function(){
 // let no4 = document.getElementById("noFamily").value;
 let relation = document.getElementById("exampleSelectrelation").value;
 let gender = document.getElementById("relativegender").value; 
 let relativeage = document.getElementById("relativeage").value;
 let txtnameFamily = document.getElementById("txtnameFamily").value;

 // if(no4 == "" || name2 == "" || relation == "" || age == "" || gender == ""  ){
 //     swal("Oops...", "Please fill all the fields", "error");
 // }
 if(relativeage=="" || txtnameFamily=="" ||  validFamilyName == "no" || relation == "" || validFamilyAge == "no" || gender == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
 }
    else{
        swal("Saved!", "Agreement Save", "success");
    }
 });



<!-- Witness -->

 let validOwn1, validOwn2, validT1, validT2;

 $(document).ready(function(){

	
		   //Owner witness
		   $("#owitness1span").hide();
	    $("#owitness1").keyup(function(){
	     ownerW_check();
	   });
	   function ownerW_check(){
		   let ownerW=$("#owitness1").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(ownerW)){
			validOwn1="no";
			  $("#owitness1span").show().html("Enter Alphabets only").css("color","red").focus();
			  ownerW_err=false;
			  return false;
		   }
		   else{
			validOwn1="yes";
		       $("#owitness1span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
		ownerW_err = true;
		ownerW_check();
			   
			   if((ownerW_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		    //Owner name
			$("#nameowner2span").hide();
	    $("#nameowner2").keyup(function(){
			ownerN_check();
	   });
	   function ownerN_check(){
		   let ownerN=$("#nameowner2").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(ownerN)){
			validOwn2="no";
			  $("#nameowner2span").show().html("Enter Alphabets only").css("color","red").focus();
			  ownerN_err=false;
			  return false;
		   }
		   else{
			validOwn2="yes";
		       $("#nameowner2span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
		ownerN_err = true;
		ownerN_check();
			   
			   if((ownerN_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


   //TENANT Witness
   $("#twitness1span").hide();
	    $("#twitness1").keyup(function(){
	     tenantW_check();
	   });
	   function tenantW_check(){
		   let tenantW=$("#twitness1").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(tenantW)){
			validT1="no";
			  $("#twitness1span").show().html("Enter Alphabets only").css("color","red").focus();
			  tenantW_err=false;
			  return false;
		   }
		   else{
			validT1="yes";
		       $("#twitness1span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
		tenantW_err = true;
		tenantW_check();
			   
			   if((tenantW_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

		  //TENANT Witness
		  $("#twitness2span").hide();
	    $("#twitness2").keyup(function(){
			tenantN_check();
	   });
	   function tenantN_check(){
		   let tenantN=$("#twitness2").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(tenantN)){
			validT2="no";
		   $("#twitness2span").show().html("Enter Alphabets only").css("color","red").focus();
			  tenantN_err=false;
			  return false;
		   }
		   else{
			validT2="yes";
		       $("#twitness2span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
		tenantN_err = true;
		tenantN_check();
			   
			   if((tenantN_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
 });

 let submitwitness = document.getElementById("submitwitness");
 submitwitness.addEventListener("click", function(){
 // let noWitness = document.getElementById("noWitness").value;
 let owitness1 = document.getElementById("owitness1").value;
 let owitness2 = document.getElementById("nameowner2").value;
 let twitness1 = document.getElementById("twitness1").value;
 let twitness2 = document.getElementById("twitness2").value;


 // if(noWitness == "" || owitness1 == "" || owitness2 == "" || twitness1 == "" || twitness2 == ""  ){
 //     swal("Oops...", "Please fill all the fields", "error");
 // }
 if(owitness1 == "" || owitness2 == "" || twitness1 == "" || twitness2 == "" || validOwn1 == "no" || validOwn2 == "no" || validT1 == "no" || validT2 == "no"  ){
    swal("Oops...", "Please fill all the fields", "error");
 }
    else{
        swal("Saved!", "Agreement Save", "success");
    }
 });



<!-- Amenities -->

	let AmenitiesName;

   $(document).ready(function(){
	   //TENANT
	   $("#spannameAmenities").hide();
	    $("#txtnameAmenities").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtnameAmenities").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			AmenitiesName="no";
			  $("#spannameAmenities").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
			AmenitiesName="yes";
		       $("#spannameAmenities").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
	
   });
   let submitaminities = document.getElementById("submitaminities");
 submitaminities.addEventListener("click", function(){
 // let no6 = document.getElementById("noAmenities").value;
 let txtnameAmenities = document.getElementById("txtnameAmenities").value;
 let number = document.getElementById("itemnumber").value;



 // if(no6 == "" || name3 == "" || number == ""   ){
 //     swal("Oops...", "Please fill all the fields", "error");
 // }

 if( AmenitiesName == "no" || number == ""  || txtnameAmenities==""  ){
    swal("Oops...", "Please fill all the fields", "error");
 }
    else{
        swal("Saved!", "Agreement Save", "success");
    }
 });
