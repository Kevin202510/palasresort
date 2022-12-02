<?php

    include('../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


     if(isset($_POST['updateUsers'])){
        // echo "<script>alert('update');</script>";
        $id = $_POST['id'];
        $firstname = $_POST["fname"];
        $middlename = $_POST["mname"];
        $lastname = $_POST["lname"];
        $address = $_POST["address"];
        $contact = $_POST["contact_num"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $permission_id = $_POST["permission_id"];

        $newAPIFunctions->update('users',['permission_id'=>$permission_id,
        'fname'=>$firstname,
        'mname'=>$middlename,
        'lname'=>$lastname,
        'address'=>$address,
        'contact_num'=>$contact,
        'username'=>$username,
        'password'=>$password,
        'email'=>$email,],"id='$id'");

        if($newAPIFunctions){
            header('location: ../profile.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>