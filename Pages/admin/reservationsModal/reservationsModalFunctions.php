<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();



    if(isset($_POST['addNew'])){
        $service_id = $_POST["service_id"];
        $facility_id = $_POST["facility_id"];
        $customer_id = $_POST["customer_id"];
        $date = $_POST["date"];
        $time = date("g:i a", $_POST["time"]);
        $person_adult_quantity = $_POST["person_adult_quantity"];
        $person_kids_quantity = $_POST["person_kids_quantity"];

        $newAPIFunctions->select("facilities","*","id='$facility_id'");
        $serviceLists = $newAPIFunctions->sql;
        $bal;
        while ($data = mysqli_fetch_assoc($serviceLists)){
            if(date_format(date_create($time),"a")==="pm"){
                $bal = $data["night_rate"] * ($person_adult_quantity+$person_kids_quantity);
              }else{
                $bal = $data["day_rate"] * ($person_adult_quantity+$person_kids_quantity);
              }
        }

        $newAPIFunctions->insert('reservations',['service_id'=>$service_id,
        'facility_id'=>$facility_id,
        'customer_id'=>$customer_id,
        'date'=>$date,
        'time'=>$time,
        'total_balance'=>$bal,
        'person_adult_quantity'=>$person_adult_quantity,
        'person_kids_quantity'=>$person_kids_quantity,]);
        if($newAPIFunctions){
            header('location: ../../admin/reservationManagement.php');
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
    }else{
        $res_id = $_POST['res_id'];
        $newAPIFunctions->selectleftjoin("entrances","reservations","reservation_id","res_id","reservation_id!="+$res_id);
        $serviceLists = $newAPIFunctions->sql;
    }


?>