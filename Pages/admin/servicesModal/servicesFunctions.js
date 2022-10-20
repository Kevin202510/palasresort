$(document).ready(function(){

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
    
})