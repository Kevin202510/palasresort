<?php

    include('../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();




     if(isset($_POST['updateUsers'])){

        $target_dir = "Profileimgs/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $id = $_POST['id'];
        $firstname = $_POST["fname"];
        $profile = $_FILES["fileToUpload"]["name"];
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
        'email'=>$email,'profile'=>$profile,],"id='$id'");

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }

        if($newAPIFunctions){
            header('location: ../profile.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>