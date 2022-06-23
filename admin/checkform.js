$(document).ready(function () {
  //owner
  $("#subm").prop('disabled',true);
  $("#spanname").hide();
  $("#spanAadharCard").hide();
  $("#spanCard").hide();

  let odnkname=true;
  let odnkadhar=true;
  let odnkpan=true;

  $("#txtname").keyup(function(){
      ownname_fun();
  });
  function ownname_fun(){
      let txt=$("#txtname").val();
     let vali =/^[A-Za-z ]+$/;
     if(!vali.test(txt)){
      $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
      odnkname = false;
      return false;
    
     }
         else{
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
        $("#spanAadharCard").show().html("*Invalid Aadhar No").css("color","red").focus();
              odnkadhar = false;
        return false;
     }
         else{
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
        $("#spanCard").show().html("*Invalid Pan No").css("color","red").focus();
              odnkpan = false;
        return false;
     }
         else{
          $("#spanCard").hide();
         }
  }

  $("#subm").on("click", function(){

    ownname_fun();
    owneradhar_fun();
    ownpan_fun();

    if(odnkname == true && odnkadhar == true && odnkpan == true){
      $("#subm").prop('disabled',false);
    }
    else{$("#subm").prop('disabled',true); }
       
  });
  $("#subm").on("click", function () {
    let no = $("#no").val();
    let examplemr = $("#examplemr").val();
    let txtname = $("#txtname").val();
    let id1 = $("#id1").val();
    let mobile = $("#mobile").val();
    let txAdhar = $("#txAdhar").val();
    let txtPANCard = $("#txtPANCard").val();
    let address = $("#address").val();
    let subm = $("#subm").val();
    
    if(examplemr==''|| txtname==''|| id1==''|| mobile=='' || address=='' || txtPANCard=='' ||txAdhar=='') {
      swal("oops sorry", "Please fill all fields.", "error")
      return false;
  }else{
    $.ajax({
      url: "form.php",
      type: "POST",
      data: {
        no: no,
        examplemr: examplemr,
        txtname: txtname,
        id1: id1,
        mobile: mobile,
        txAdhar: txAdhar,
        txtPANCard: txtPANCard,
        address: address,
        subm: subm,
      },
      cache: false,
      success: function (res) {
        // alert(res);
      },
    });
  }
  });

  //tenant
  $("#submitenant").on("click", function () {
    let exampledno = $("#no3").val();
    let exampleSelectmr = $("#exampleSelectmr").val();
    let txtname3 = $("#txtname3").val();
    let phone = $("#phone").val();
    let officename = $("#officename").val();
    let officeno = $("#officeno").val();
    let officeaddress = $("#officeaddress").val();
    let emailcheck = $("#emailcheck").val();
    let passport = $("#passport").val();
    let txAdhartr = $("#txAdhartr").val();
    let id2 = $("#id2").val();
    let txtPANCard1 = $("#txtPANCard1").val();
    let residenceAddress = $("#residenceAddress").val();
    let presentAddress = $("#presentAddress").val();
    let tenant = $("#submitenant").val();

    $.ajax({
      url: "form.php",
      type: "POST",
      data: {
        exampledno: exampledno,
        exampleSelectmr: exampleSelectmr,
        txtname3: txtname3,
        phone: phone,
        officename: officename,
        officeno: officeno,
        officeaddress: officeaddress,
        emailcheck: emailcheck,
        passport: passport,
        id2: id2,
        txAdhartr: txAdhartr,
        txtPANCard1: txtPANCard1,
        residenceAddress: residenceAddress,
        presentAddress: presentAddress,
        tenant: tenant,
      },
      cache: false,
      success: function (res2) {
        // swal("", res2, "success");
      },
    });
  });

  //property
  $("#submitproperty").on("click", function () {
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
      url: "form.php",
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
        //  alert(res3);
      },
    });
  });

  //family
  $("#submitmember").on("click", function () {
    let no4 = $("#no4").val();
    let txtname1 = $("#txtname1").val();
    let exampleSelectrelation = $("#exampleSelectrelation").val();
    let relativeage = $("#relativeage").val();
    let relativegender = $("#relativegender").val();
    let submitmember = $("#submitmember").val();

    $.ajax({
      url: "form.php",
      type: "POST",
      data: {
        no4: no4,
        txtname1: txtname1,
        exampleSelectrelation: exampleSelectrelation,
        relativeage: relativeage,
        relativegender: relativegender,
        submitmember: submitmember,
      },
      cache: false,
      success: function (res4) {
        $("#displayfamily").html(res4);
        //  alert(res4);
      },
    });
  });

  //witness
  $("#submitwitness").on("click", function () {
    let no5 = $("#no5").val();
    let nameowner = $("#nameowner").val();
    let nameowner2 = $("#nameowner2").val();
    let twitness1 = $("#twitness1").val();
    let twitness2 = $("#twitness2").val();
    let submitwitness = $("#submitwitness").val();

    $.ajax({
      url: "form.php",
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
        // alert(res5);
      },
    });
  });

  //aminities
  $("#submitaminities").on("click", function () {
    let no6 = $("#no6").val();
    let txtname2 = $("#txtname2").val();
    let itemnumbe = $("#itemnumbe").val();
    let submitaminities = $("#submitaminities").val();

    $.ajax({
      url: "form.php",
      type: "POST",
      data: {
        no6: no6,
        txtname2: txtname2,
        itemnumbe: itemnumbe,
        submitaminities: submitaminities,
      },
      cache: false,
      success: function (res6) {
        $("#displayaminities").html(res6);
        //  alert(res6);
      },
    });
  });
  //payment
  $("#submitpayment").on("click", function () {
    let no7 = $("#no7").val();
    let deposit = $("#deposit").val();
    let rent = $("#rent").val();
    let checkselec = $("#checkselec").val();
    let rentpay = $("#rentpay").val();
    let bank = $("#bank").val();
    let date = $("#date").val();
    let tid = $("#tid").val();
    let submitpayment = $("#submitpayment").val();

    $.ajax({
      url: "form.php",
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
        swal("", res7, "success").then(function() {
          window.location.href = "case.php";
      });
      },
    });
  });

  //insert payment
  $("#savepayment").on("click", function () {
    let no7 = $("#no7").val();
    let deposit = $("#deposit").val();
    let rent = $("#rent").val();
    let checkselec = $("#checkselec").val();
    let rentpay = $("#rentpay").val();
    let bank = $("#bank").val();
    let date = $("#date").val();
    let tid = $("#tid").val();
    let savepayment = $("#savepayment").val();

    $.ajax({
      url: "form.php",
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
        savepayment: savepayment,
      },
      cache: false,
      success: function (res8) {
        swal("", res8, "success");
      },
    });
  });
});
