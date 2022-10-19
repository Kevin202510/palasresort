<?php

    include('../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


    if(isset($_POST['addnewuser'])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $permission_id = $_POST["permission_id"];

        $newAPIFunctions->insert('userstables',['permission_id'=>$permission_id,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'address'=>$address,
        'contact'=>$contact,
        'email'=>$email,
        'password'=>$password,]);

        if($newAPIFunctions){
            header('location: ../../adminViews/usersList.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['updateUsers'])){
        
        $id = $_POST['id'];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $permission_id = $_POST["permission_id"];

        $newAPIFunctions->update('userstables',['permission_id'=>$permission_id,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'address'=>$address,
        'contact'=>$contact,
        'email'=>$email,
        'password'=>$password,],"id='$id'");

        if($newAPIFunctions){
            header('location: ../../adminViews/usersList.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['deleteUser'])){
        
        $id = $_POST['id'];

        $newAPIFunctions->delete('userstables',"id='$id'");

        if($newAPIFunctions){
            header('location: ../../adminViews/usersList.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>