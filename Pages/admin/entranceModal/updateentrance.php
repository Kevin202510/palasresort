<?php

    include('../../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();
    
   
    if(isset($_POST['id'])){
        $dataid = $_POST['id'];
        $newAPIFunctions->select3($dataid);
        $getUser = $newAPIFunctions->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
        echo json_encode($res);
    }
    
    else if(isset($_POST['id'])){
    $dataid = "res_id=" . $_POST['id'];
    $newAPIFunctions->select("reservations","*",$dataid);
    $getUser = $newAPIFunctions->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
    echo json_encode($res);
    }else if(isset($_POST['reserv_id'])){
        $newAPIFunctions->selectleftjoin3where($_POST['reserv_id']);
        $getUser = $newAPIFunctions->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
        echo json_encode($res);
    }else if(isset($_POST["resi_id"])){
        $valid = $_POST["resi_id"];
        $newAPIFunctions->update('reservations',['reservation_status'=>1],"res_id='$valid'");
    }



?>