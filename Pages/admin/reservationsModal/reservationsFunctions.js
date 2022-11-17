$(document).ready(function(){

    $("body").on('click','#edit',function(e){
        
        var idss = $(e.currentTarget).data('id');
     
        $.post("reservationsModal/updatereservations.php",{id: idss},function(data,status){
            var datas = JSON.parse(data);
            $("#id").val(datas.res_id);
            $('#service_ids option[value='+datas.service_id+']').attr("selected", "selected");
            $('#facility_ids option[value='+datas.facility_id+']').attr("selected", "selected");
            $('#customer_ids option[value='+datas.customer_id+']').attr("selected", "selected");
            $("#dates").val(datas.date);
            $("#times").val(datas.time);
            $("#person_adult_quantitys").val(datas.person_adult_quantity);
            $("#person_kids_quantitys").val(datas.person_kids_quantity);

            
            $("#btn-mul").attr('name',"updateReservations");
            $("#btn-mul").html("Update Reservations");
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