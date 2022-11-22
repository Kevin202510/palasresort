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

    $("body").on('click','#pay',function(e){
        
        var idss = $(e.currentTarget).data('id');
     
        $.post("entranceModal/updateentrance.php",{reserv_id: idss},function(data,status){
            var datas = JSON.parse(data);
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

          
            $("#btn-mul").attr('name',"Payment");
            $("#btn-mul").html("Payment");
            $("#pass").hide();
            $("#exampleModal").modal("show");
            
         
        })

        // $("#myModalLabel").html("Update User");
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