<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


    if(isset($_POST['addNew'])){
        $service_id = $_POST["service_id"];
        $facility_id  = $_POST["facility_id"];
        $customer_id = $_POST["customer_id"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $person_adult_quantity = $_POST["person_adult_quantity"];
        $person_kids_quantity = $_POST["person_kids_quantity"];
        $newAPIFunctions->insert('reservations',['service_id'=>$service_id,
        'facility_id'=>$facility_id,
        'customer_id'=>$customer_id,
        'date'=>$date,
        'time'=>$time,
        'person_adult_quantity'=>$person_adult_quantity,
        'person_kids_quantity'=>$person_kids_quantity,]);

        if($newAPIFunctions){
            header('location: ../../admin/reservationManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['updateUsers'])){
        // echo "<script>alert('update');</script>";
        $id = $_POST['id'];
        $firstname = $_POST["fname"];
        $middlename = $_POST["mname"];
        $lastname = $_POST["lname"];
        $address = $_POST["address"];
        $contact = $_POST["contact_num"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $permission_id = $_POST["permission_id"];

        $newAPIFunctions->update('users',['permission_id'=>$permission_id,
        'fname'=>$firstname,
        'mname'=>$middlename,
        'lname'=>$lastname,
        'address'=>$address,
        'contact_num'=>$contact,
        'username'=>$username,
        'email'=>$email,],"id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/userManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['delete'])){
        
        $id = $_POST['id'];

        $newAPIFunctions->delete('users',"id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/userManagement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>