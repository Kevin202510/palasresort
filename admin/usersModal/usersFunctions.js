$(document).ready(function(){

    $("body").on('click','#edit',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $.post("usersModal/updateuser.php",{userId: idss},function(data,status){
            var datas = JSON.parse(data);
            $("#id").val(datas.id);
            $("#firstname").val(datas.firstname);
            $("#lastname").val(datas.lastname);
            $("#address").val(datas.address);
            $("#contact").val(datas.contact);
            $("#email").val(datas.email);
            $("#password").val(datas.password);
            $('#permission_id option[value='+datas.permission_id+']').attr("selected", "selected");
        })

        $("#myModalLabel").html("Update User");
        $("#btn-save").attr('name',"updateUsers");
        $("#btn-save").html("Update User");
        $("#myModal").modal("show");
    });

    $("body").on('click','#delete',function(e){
        
        var idss = $(e.currentTarget).data('id');
        $("#ids").val(idss);
        $("#myModalDelete").modal("show");
    });
    
})