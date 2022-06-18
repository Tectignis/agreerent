$(document).ready(function () {
    //owner
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
        subm: subm
      },
      cache: false,
      success: function (res) {
         alert(res);
      },
    });
  });
    
    //tenant
  $("#submitenant").on("click", function () {
    let exampledno = $("#exampledno").val();
    let exampleSelectmr = $("#exampleSelectmr").val();
    let txtname3 = $("#txtname3").val();
    let phone = $("#phone").val();
    let emailcheck = $("#emailcheck").val();
    let passport = $("#passport").val();
    let txtAadhar1 = $("#txtAadhar1").val();
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
        emailcheck: emailcheck,
        passport: passport,
        id2: id2,
        txtAadhar1: txtAadhar1,
        txtPANCard1: txtPANCard1,
        residenceAddress: residenceAddress,
        presentAddress: presentAddress,
        tenant: tenant,
      },
      cache: false,
      success: function (res2) {
         alert(res2);
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
          alert(res3);
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
           submitmember: submitmember
         },
         cache: false,
           success: function (res4) {
               $("#displayfamily").html(res4);
               alert(res4);
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
          alert(res5);
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
               alert(res6);
         },
       });
     });
    ;
    //payment
     $("#submitpayment").on("click", function () {
       let no7 = $("#no7").val();
       let deposit = $("#deposit").val();
       let rent = $("#rent").val();
       let checkselec = $("#checkselec").val();
       let date_of_payment = $("#rentpay").val();
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
           rentpay:rentpay,
           checkselec: checkselec,
             bank: bank,
             date: date,
                tid: tid,
                date_of_payment:date_of_payment,
           submitpayment: submitpayment,
         },
         cache: false,
         success: function (res7) {
           
         },
       });
     });  

  
       
});
