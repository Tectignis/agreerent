$(document).ready(function () {
  
  //owner
  
  $("#subm").on("click", function () {
    if(odnkname == "no" || odnkadhar == "no" || odnkpan == "no" || odnkmobil == "no"){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
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
      swal("oops..", "Please fill all fields.", "error");
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
        swal("saved..", res, "success");
      },
    });
  }
}
  });

  //tenant
  $("#submitenant").on("click", function () {
    if(tenanttname == "no" || validTenantPan == "no" || validTenantAadhar == "no" || tdnkmob=="no"){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
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

    if(exampleSelectmr==''|| txtname3==''|| phone==''|| officename=='' || officeno=='' || officeaddress=='' || emailcheck=='' || txAdhartr=='' || id2=='' || txtPANCard1=='' || residenceAddress=='' || presentAddress=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
        swal("saved..", res2, "success");
      },
    });
  }
}
  });

  //property
  $("#submitproperty").on("click", function () {
    if(propertydnkname == "no" ){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
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

    if(exampleproperties==''|| addressPro==''|| sector==''|| plotno=='' || area=='' || chs=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
        swal("saved..", res3, "success");;
      },
    });
  }
}
  });

  //family
  $("#submitmember").on("click", function () {
    if(familydnkname == "no" ){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
    let no4 = $("#no4").val();
    let txtname1 = $("#txtname1").val();
    let exampleSelectrelation = $("#exampleSelectrelation").val();
    let relativeage = $("#relativeage").val();
    let relativegender = $("#relativegender").val();
    let submitmember = $("#submitmember").val();
    if(txtname1==''|| exampleSelectrelation==''|| relativeage==''|| relativegender=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
        swal("saved..","Successfully Added", "success");
      },
    });
  }
}
  });

  //witness
  $("#submitwitness").on("click", function () {
    if(ownerdnkname == "no" || ownerdnk2name=="no" || tendnkname=="no" || ten2dnkna=="no"){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
    let no5 = $("#no5").val();
    let nameowner = $("#nameowner").val();
    let nameowner2 = $("#nameowner2").val();
    let twitness1 = $("#twitness1").val();
    let twitness2 = $("#twitness2").val();
    let submitwitness = $("#submitwitness").val();
    if(nameowner==''|| nameowner2==''|| twitness1==''|| twitness2=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
        swal("saved..",res5, "success");
      },
    });
  }
}
  });

  //aminities
  $("#submitaminities").on("click", function () {
    if(amindnkval == "no" ){
      swal("Oops...", "Please fill all the fields correctly", "error");
    }
      else{
    let no6 = $("#no6").val();
    let txtname2 = $("#txtname2").val();
    let itemnumbe = $("#itemnumbe").val();
    let submitaminities = $("#submitaminities").val();
    if(txtname2==''|| itemnumbe=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
        swal("saved..","Successfully Inserted", "success");
      },
    });
  }
}
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
    if(deposit==''|| rent==''|| checkselec==''|| rentpay=='' || bank=='' || date=='' || tid=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
  }
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
    if(deposit==''|| rent==''|| checkselec==''|| rentpay=='' || bank=='' || date=='' || tid=='') {
      swal("oops..", "Please fill all fields.", "error");
      return false;
  }else{
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
  }
  });
  
});

  
    // Aminities Delete 
function fun(idd) {
let el=idd;
      let idImage = idd;
      let confirmalert = confirm("Are you sure?");
      if (confirmalert == true) {
         // AJAX Request
         $.ajax({
           url: 'form.php',
           type: 'POST',
           data: { idImage:idImage },
           success: function(del){
            if(del==1){
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(800,function(){
               $(this).remove();
            });
          }
          else{
            alert("invalid otp");
          }
           }
         });
      }
   
    }

    //family Delete
    function familyfun(faidd) {
      let fel=faidd;
            let famidImage = faidd;
            let confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
               // AJAX Request
               $.ajax({
                 url: 'form.php',
                 type: 'POST',
                 data: { famidImage:famidImage },
                 success: function(famdel){
                  if(famdel==1){
                  $(fel).closest('tr').css('background','tomato');
                  $(fel).closest('tr').fadeOut(800,function(){
                     $(this).remove();
                  });
                }
                else{
                  alert("invalid otp");
                }
                 }
               });
            }
         
          }
   
   
  