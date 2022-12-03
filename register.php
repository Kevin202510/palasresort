<?php   session_start();?>
<?php include('Pages/layouts/head.php');?>

<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">

            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php"><img src="image/pic5.png" alt=""><img src="image/pals.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent" >
            <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active">
            <form method="post">
                <button name="logoutnako" class=" btn btn-block mybtn btn-info tx-tfm" class="nav-link">home</button>

            </form>    
        </li> 
            </ul>
        
            </div> 
        </nav>
    </div>
</header>




<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

    include('./Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();

        if (isset($_POST['register'])) {
            $firstname = $_POST["fname"];
            $middlename = $_POST["mname"];
            $lastname = $_POST["lname"];
            $address = $_POST["address"];
            $contact = $_POST["contact_num"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $permission_id = $_POST["permission_id"];

            $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'torreschelsea114@gmail.com';

        //SMTP password
        $mail->Password = 'aimeupnhjmpmxypf';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('torreschelsea114@gmail.com', 'palasresort.com');

        //Add a recipient
        $mail->addAddress($email, $firstname);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b><a href="http://localhost/palasresort/email-verification.php?email="' . $email.'">VERIFY MY ACCOUNT</a></p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $newAPIFunctions->insert('users',['permission_id'=>$permission_id,
        'fname'=>$firstname,
        'mname'=>$middlename,
        'lname'=>$lastname,
        'address'=>$address,
        'contact_num'=>$contact,
        'username'=>$username,
        'email'=>$email,
        'password'=>$password,
        'verification_code'=>$verification_code]);

        if($newAPIFunctions){
            echo "<script>alert('Sucess Fully To Create Account');</script>";
            header('location: email-verification.php?email=' . $email);
            
        }else{
            echo "<script>alert('May Error!'');</script>";
   
    }

        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    } 
?>






<section class="accomodation_area section_gap" style="background-image: url('image/act.jpg');background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="card" style="width: 40rem;background-color: hsla(0, 0%, 0%, 0.5);" > 
        <div class="row" >
			<div class="col-md-20 mx-auto">

                <div id="second">
			      <div class="myform form">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 style="color:white;">Sign Up</h1>
                           </div>
                        </div>
                    <form method="POST" id="serviceform">
                            <input type="hidden" name="id" id="id">

                            <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"></label>
            
                                    <?php 
                                     
                                        $newAPIFunctions->select("permissions","*","permissions_id=2");
                                        $rolesLists = $newAPIFunctions->sql;

                                        while ($datas = mysqli_fetch_assoc($rolesLists)){
                                    ?>
                                      <input type="hidden" value="<?php echo $datas["permissions_id"]; ?>" name="permission_id">
                                    <?php } ?>
                            
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">First Name</label>
                                <input type="text" class="form-control"  name="fname"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Middle Name</label>
                                <input type="text" class="form-control"  name="mname"required>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Last Name</label>
                                <input type="text" class="form-control"  name="lname"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Address</label>
                                <input type="text" class="form-control"  name="address"required>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Contact Number</label>
                                <input type="number" class="form-control"  name="contact_num"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Username</label>
                                <input type="text" class="form-control"  name="username"required>
                                </div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Email Address</label>
                                <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6" id="pass">
                                <label for="exampleInputEmail1"style="color:white;">Password</label>
                                <input type="password" class="form-control"  name="password" required>
                            </div>
                         </div>
                             <br>
                            <div class="col-md-12 text-center ">
                            <button type="submit" class="btn btn-info"  name="register">Create Account</button>
                            </div>
                        </form>
                        <p class="text-center"style="color:white;">You have account? <a href="login.php" id="signup">LogIn Account</a></p>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
    </div>
</section>


 
<?php include('Pages/layouts/scripts.php');?>