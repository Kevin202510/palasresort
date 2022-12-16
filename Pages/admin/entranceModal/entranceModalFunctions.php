<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();



    if(isset($_POST['addNew'])){
        $reservation_id = $_POST["reservation_id"];
        $total_balance = $_POST["total_balance"];
        $time_in = date("h:i a");

        $newAPIFunctions->insert('entrances',['reservation_id'=>$reservation_id,
        'time_in'=>$time_in,
        'balance'=>$total_balance]);

        if($newAPIFunctions){
            header('location: ../../admin/entranceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
        
   }
    else if(isset($_POST['OutEntance'])){
        $id = $_POST['idz'];
        $reservation_id = $_POST["reservation_idz"];
        $time_in = $_POST["time_inz"];
        $time_out = date("h:i a");
        $balance = $_POST["balancez"];
        $status = $_POST["facility_idzz"];
        $customer_idz = $_POST["customer_idzzz"];

        $newAPIFunctions->update('entrances',['reservation_id'=>$reservation_id,
        'time_out'=>$time_out,
        'balance'=>$balance,],"id='$id'");

        
        $newAPIFunctions->update('facilities',['status'=>0,],"id='$status'");
         $newAPIFunctions->insert('sales',['user_id'=> $customer_idz ,'reservation_id'=>$reservation_id]);
        



        if($newAPIFunctions){
            header('location: ../../admin/entranceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


    else if(isset($_POST['extendkoto'])){
        $xt= $_POST["extendm"];
        $blanc= $_POST["balancem"];

        $extend=  $xt+ $blanc;

        $id = $_POST['idm'];
        $reservation_id = $_POST["reservation_idm"];
        $facility_id = $_POST["facility_idm"];
        $customer_id = $_POST["customer_idm"];
        

        $newAPIFunctions->update('reservations',[ 'total_balance'=>$extend,],"res_id ='$reservation_id'");



        if($newAPIFunctions){
            header('location: ../../admin/entranceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>