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
        
   }else if(isset($_POST['print'])){
   
        $bl = $_POST["balancessss"];
        $pay =  $_POST["paymentssss"];
        $sukli =  $bl-$pay; 
        $total = $sukli- $sukli;
        
    
        $id = $_POST['idssss'];
        $reservation_id = $_POST["reservation_idssss"];
        $time_in = $_POST["time_inssss"];
        $balance =  $total;

        $newAPIFunctions->update('entrances',['reservation_id'=>$reservation_id,
        'time_in'=>$time_in,
        'balance'=>$balance,],"id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/entranceManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>