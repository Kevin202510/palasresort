<?php

include('./Functions/InnovatechAPIFunctions.php');
$newAPIFunctions = new InnovatechAPIFunctions();

if (isset($_POST["verify_email"]))
{
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];
    $timestamp = time();
    $formatted = date('y-m-d h:i:s T', $timestamp);
    
    $newAPIFunctions->update('users',['email_verified_at'=> $formatted],"email = '" . $email . "' AND verification_code = '" . $verification_code . "'");

        if($newAPIFunctions){
            header('location: index.php');
        }else{
            echo '<script>alert("May Error!");</script>';
        }
}

?>

<form method="POST">
    <input type="text" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />

    <input type="submit" name="verify_email" value="Verify Email">
</form>