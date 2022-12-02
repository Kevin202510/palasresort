<?php

    include('../Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();

    if(isset($_POST['id'])){
    $dataid = "id=" . $_POST['id'];
    $newAPIFunctions->select("users","*",$dataid);
    $getUser = $newAPIFunctions->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
    echo json_encode($res);
}

?>