<?php include('Pages/layouts/head.php');?>

<!-- <header class="header_area">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light"> -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- <a class="navbar-brand logo_h" href="index.php"><img src="image/pic5.png" alt=""><img src="image/pals.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
            </ul>
        </div> 
    </nav>
</div>
</header> -->




<?php 

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
                        echo "<script>alert('Sucess Fully To Create Account');</script>";
                        header('location:login.php');
                        
                    }else{
                        echo "<script>alert('May Error!'');</script>";
               
                }
    } 
?>






<section class="accomodation_area section_gap" style="background-image: url('image/act.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
background-size: 100% 100%;">
        <div class="container">
        <div class="card" style="width: 40rem;margin-left: 280px;background-color: hsla(0, 0%, 0%, 0.5);" > 
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
                                <select class="form-control" id="permissions_id" name="permission_id" style="width:100%">
                                    <?php 
                                     
                                        $newAPIFunctions->select("permissions","*","permissions_id=2");
                                        $rolesLists = $newAPIFunctions->sql;

                                        while ($datas = mysqli_fetch_assoc($rolesLists)){
                                    ?>
                                    <option style="width:100%" value="<?php echo $datas["permissions_id"]; ?>"><?php echo $datas["permission_name"]; ?></option>
                                    <?php } ?>
                                </select>
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
</section>


<?php include('Pages/layouts/footer.php');?>  
<?php include('Pages/layouts/scripts.php');?>