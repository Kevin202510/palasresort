<?php

    include('../../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();

    if(isset($_POST['userId'])){
    $dataid = "id=" . $_POST['userId'];
    $newAPIFunctions->select("userstables","*",$dataid);
    $getUser = $newAPIFunctions->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
    echo json_encode($res);
}

?>