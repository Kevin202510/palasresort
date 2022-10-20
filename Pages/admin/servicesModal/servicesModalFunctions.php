<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


    if(isset($_POST['addNew'])){
        $service_name = $_POST["service_name"];

        $newAPIFunctions->insert('services',['service_name'=>$service_name,]);

        if($newAPIFunctions){
            header('location: ../../admin/serviceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['updateServices'])){
        // echo "<script>alert('update');</script>";
        $id = $_POST['id'];
        $service_name = $_POST["service_name"];

        $newAPIFunctions->update('services',[
        'service_name'=>$service_name,],"service_id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/serviceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['delete'])){
        
        $id = $_POST['id'];

        $newAPIFunctions->delete('services',"service_id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/serviceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>