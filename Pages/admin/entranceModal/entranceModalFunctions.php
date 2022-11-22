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
    }else if(isset($_POST['updateReservations'])){
        // echo "<script>alert('update');</script>";
        $id = $_POST['id'];
        $service_id = $_POST["service_id"];
        $facility_id = $_POST["facility_id"];
        $customer_id = $_POST["customer_id"];
        $date = $_POST["date"];
        $time = date("g:i a", strtotime($_POST["time"]));
        $person_adult_quantity = $_POST["person_adult_quantity"];
        $person_kids_quantity = $_POST["person_kids_quantity"];

        $newAPIFunctions->update('reservations',['service_id'=>$service_id,
        'facility_id'=>$facility_id,
        'customer_id'=>$customer_id,
        'date'=>$date,
        'time'=>$time,
        'person_adult_quantity'=>$person_adult_quantity,
        'person_kids_quantity'=>$person_kids_quantity,],"res_id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/reservationManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['delete'])){
        
        $id = $_POST['id'];

        $newAPIFunctions->delete('reservations',"res_id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/reservationManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>