<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


    if(isset($_POST['addNew'])){
        $firstname = $_POST["fname"];
        $middlename = $_POST["mname"];
        $lastname = $_POST["lname"];
        $address = $_POST["address"];
        $contact = $_POST["contact_num"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $permission_id = $_POST["permission_id"];

        $newAPIFunctions->insert('users',['permission_id'=>$permission_id,
        'fname'=>$firstname,
        'mname'=>$middlename,
        'lname'=>$lastname,
        'address'=>$address,
        'contact_num'=>$contact,
        'username'=>$username,
        'email'=>$email,
        'password'=>$password,]);

        if($newAPIFunctions){
            header('location: ../../admin/userManagement.php');
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