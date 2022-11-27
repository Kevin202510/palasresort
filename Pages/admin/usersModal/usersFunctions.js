$(document).ready(function(){

    $("body").on('click','#edit',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $.post("usersModal/updateuser.php",{id: idss},function(data,status){
            var datas = JSON.parse(data);
            $("#id").val(datas.id);
            $("#fname").val(datas.fname);
            $("#mname").val(datas.mname);
            $("#lname").val(datas.lname);
            $("#address").val(datas.address);
            $("#contact_num").val(datas.contact_num);
            $("#username").val(datas.username);
            $("#email").val(datas.email);
            // alert(datas.permission_id);
            $('#permissions_id option[value='+datas.permission_id+']').attr("selected", "selected");
        })

        // $("#myModalLabel").html("Update User");
        $("#btn-mul").attr('name',"updateUsers");
        $("#btn-mul").html("Update User");
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