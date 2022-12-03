<?php 
session_start(); 
 if(!session_id()){
    header("Location:index.php");
    die();
 }

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
            
                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                </ul>
            
                </div> 
            </nav>
        </div>
    </header>

      
    <section class="accomodation_area section_gap"style="align-items:center; background-image: url('image/act.jpg');background-repeat: no-repeat; background-attachment: fixed;background-size: 100% 100%;">
        <div class="container">
            <div class="d-flex justify-content-center" style="margin-top:25px;">
                <div class="card" style="width: 35rem;background-color: hsla(0, 0%, 0%, 0.5);" > 
                <div class="card-header">
                <div class="myform form">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1 style="color:white;">Email Verification</h1>
						 </div>
					</div>
                </div>
                <div class="card-body">
                <form action="" method="post" >
                    <div class="form-group">
                        <label for="exampleInputEmail1"style="color:white;">Email Address</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $_GET['email']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"style="color:white;">Verification Code</label>
                        <input type="text" class="form-control" name="verification_code" placeholder="Enter verification code" required />
                    </div>
                
                    <div class="col-md-12 text-center ">
                        <input type="submit" name="verify_email" class=" btn btn-block mybtn btn-info tx-tfm" value="Verify Email">
                    </div>
                
                </form>
                </div>
                </div> 
            </div>   
        </div>
    </section>


<?php include('Pages/layouts/scripts.php');?>
<?php include('Pages/layouts/footer.php');?>

<script>
    window.history.forward();
             function noBack() { 
                  window.history.forward(); 
             }
</script>