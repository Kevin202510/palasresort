$(document).ready(function(){

    $("#btn-mul").click(function(e){
        e.preventDefault(); 
        let arr = [];
        $.each($("input[name='facility_id']:checked"), function(){
            arr.push($(this).val());
        });

        let newarrayfacility_id = arr.toString().replace(/[\[\]']+/g,'');
        // alert(newarrayfacility_id);
        let datatoadd = {
            facility_id:newarrayfacility_id,
            service_id:$("#service_id").val(),
            customer_id:$("#customer_id").val(),
            date:$("#date").val(),
            time:$("#time").val(),
            person_adult_quantity:$("#person_adult_quantity").val(),
            person_kids_quantity:$("#person_kids_quantity").val(),
            addNew:$("#btn-mul").val(),
        }

            $.post("reservationsModal/reservationsModalFunctions.php",datatoadd,function(data,status){

                if(status=="success"){
                    $("#exampleModal").modal("hide");
                }

                setTimeout(function () {
                    alert("YOUR WORK HAS BEEN SAVE!");
                    location.reload();
                }, 2000);

                // alert("ghasdas");

            });

        // setTimeout(add(),3000);

        // location.reload();

    });

    $("body").on('click','#edit',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $.post("servicesModal/updateservices.php",{id: idss},function(data,status){
            // alert(datas);
            var datas = JSON.parse(data);
            $("#id").val(datas.service_id);
            // alert(datas.service_name);
            $("#service_name").val(datas.service_name);
        })

        // $("#myModalLabel").html("Update User");
        $("#btn-mul").attr('name',"updateServices");
        $("#btn-mul").html("Update Service");
        $("#pass").hide();
        $("#exampleModal").modal("show");
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
      
})