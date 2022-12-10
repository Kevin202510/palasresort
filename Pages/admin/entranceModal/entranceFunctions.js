$(document).ready(function(){

  $("#reservation_id").on('keypress',function(e) {
      if(e.which == 13) {
        $.post("entranceModal/updateentrance.php",{reserv_id: $("#reservation_id").val()},function(data,status){
          var datas = JSON.parse(data);

          // console.log(datas);

          $("#reservation_ids").val(datas.res_id);
          $("#customername").val(datas.fname + " " + datas.mname + " " + datas.lname);
          $("#facilityname").val(datas.name);
          $("#total_balance").val(datas.total_balance);
          let status_res = "Paid";
          if(datas.reservation_status==0){
            status_res = "Not Paid";
          }
          $("#payment_status").val(status_res);
          $("#reservation_date_time").val(datas.date +" "+ datas.time);
          
          
          $("#exampleModal").modal("show");
        });
      }
  });

  $("body").on('click','#pays',function(e){
        
    var idss = $(e.currentTarget).data('id');
    $.post("entranceModal/updateentrance.php",{id: idss},function(data,status){
        console.log(data);
        var datas = JSON.parse(data);
        $("#idss").val(datas.id);
        $("#reservation_idss").val(datas.reservation_id );
        $("#time_inss").val(datas.time_in);
        $("#balancess").val(datas.balance);
        $("#customer_names").val(datas.fname+" "+datas.lname);
        
        $("#muls").attr('name',"bayad");
        $("#muls").html("Payment");
    })

    // $("#myModalLabel").html("Update User");
    
    $("#exampleModalPay").modal("show");
});

$("body").on('click',"#mulss",function(e){
  e.preventDefault();
  $("#exampleModalPay").modal("hide");
  const myTimeout = setTimeout(renderReciept(), 1000);
});

function renderReciept(){
  $("#resiboModalDelete").modal("show");
  $("#idsss").val($("#idss").val());
  $("#reservation_idsss").val($("#reservation_idss").val());
  $("#fullname").val($("#customer_names").val());
  $("#time_insss").val($("#time_inss").val());
  $("#balancesss").val($("#balancess").val());
  $("#paymentsss").val($("#payments").val());
  $("#change").val(parseInt($("#paymentsss").val())-parseInt($("#balancesss").val()));
 
}

$("body").on('click',"#prints",function(e){
  // e.preventDefault();

  alert($("#reservation_idsss").val());
  $.post("entranceModal/updateentrance.php",{resi_id: $("#reservation_idsss").val()},function(data,status){
    alert("tapos na");
  })

});
    $("body").on('click','#delete',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $("#ids").val(idss);
        $("#exampleModalDelete").modal("show");
    });
    
    $("#closeform").click(function(){
        $("#serviceform")[0].reset();


        $("#exampleModal").modal("hide");
    });

       $("#closeforms").click(function(){
        $("#serviceform")[0].reset();


        $("#exampleModalPay").modal("hide");
    });


    $("#times").focusout(function(){
        var time = $("#times").val().split(':'),
        hours,minutes,meridian;
        hours = time[0];
        minutes = time[1];
        if (hours > 12) {
          meridian = 'PM';
          hours -= 12;
        } else if (hours < 12) {
          meridian = 'AM';
          if (hours == 0) {
            hours = 12;
          }
        } else {
          meridian = 'PM';
        }
        console.log(hours + ':' + minutes + ' ' + meridian);
    });

function onTimeChange() {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  alert(hours + ':' + minutes + ' ' + meridian);
}
      
})