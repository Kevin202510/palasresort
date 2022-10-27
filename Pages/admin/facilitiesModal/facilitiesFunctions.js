$(document).ready(function(){
    $("#tagomoto").hide();
    
    $("body").on('click','#edit',function(e){
        $("#tagomoto").show();
        

        var idss = $(e.currentTarget).data('id');
        $.post("facilitiesModal/updatefacilities.php",{id: idss},function(data,status){
            // alert(datas);
            var datas = JSON.parse(data);
            $("#images").prop("type","hidden");
            $("#id").val(datas.id);
            $("#names").val(datas.name);
            $("#descriptions").val(datas.description);
            $("#day_rates").val(datas.day_rate);
            $("#night_rates").val(datas.night_rate);
            $("#overnigth_rates").val(datas.overnigth_rate);
            $('#facility_types option[value='+datas.facility_type+']').attr("selected", "selected");
            // $('#statuss option[value='+datas.status+']').attr("selected", "selected");
            $("#images").val(datas.image);
            $("#facilitiesImages").attr("src","./facilitiesimage/images/"+datas.image);
            $("#newimg").on("click",function(){
                $("#images").val('');
                 alert("sadas");
            });
        
            $("#newimg").on("change",function(){
                $("#images").val($("#newimg").val().split('\\').pop());
                $("#facilitiesImages").attr("src","./facilitiesimage/images/"+$("#images").val());
            });
            
            alert(image);
          
        })

        // $("#myModalLabel").html("Update User");
        $("#btn-mul").attr('name',"updateFacilities");
        $("#btn-mul").html("Update Facilities");
        $("#pass").hide();
        $("#exampleModal").modal("show");
    });

    $("body").on('click','#delete',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $("#ids").val(idss);
        $("#exampleModalDelete").modal("show");
    });
    
    $("#closeform").click(function(){
        $("#facilitiesform")[0].reset();


        $("#exampleModal").modal("hide");
        $("#tagomoto").hide();
    });

})