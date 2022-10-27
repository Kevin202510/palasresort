<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();


    if(isset($_POST['addNew'])){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $day_rate = $_POST["day_rate"];
        $night_rate = $_POST["night_rate"];
        $overnigth_rate = $_POST["overnigth_rate"];
        $facility_type = $_POST["facility_type"];
        // $status = $_POST["status"];
        $image = $_POST["image"];

        $newAPIFunctions->insert('facilities',['name'=>$name,
        'description'=>$description,
        'day_rate'=>$day_rate,
        'night_rate'=>$night_rate,
        'overnigth_rate'=>$overnigth_rate,
        'facility_type'=>$facility_type,
        'image'=>$image,]);
        if($newAPIFunctions){
            header('location: ../../admin/facilitiesMangement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['updateFacilities'])){
        // echo "<script>alert('update');</script>";
        $id = $_POST['id'];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $day_rate = $_POST["day_rate"];
        $night_rate = $_POST["night_rate"];
        $overnigth_rate = $_POST["overnigth_rate"];
        $facility_type = $_POST["facility_type"];
        // $status = $_POST["status"];
        $image = $_POST["image"];

        $newAPIFunctions->update('facilities',['name'=>$name,
        'description'=>$description,
        'day_rate'=>$day_rate,
        'night_rate'=>$night_rate,
        'overnigth_rate'=>$overnigth_rate,
        'facility_type'=>$facility_type,
        'image'=>$image,],"id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/facilitiesMangement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }else if(isset($_POST['delete'])){
        
        $id = $_POST['id'];

        $newAPIFunctions->delete('facilities',"id='$id'");

        if($newAPIFunctions){
            header('location: ../../admin/facilitiesMangement.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }


?>