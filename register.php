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
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
            </ul>
        </div> 
    </nav>
</div>
</header>

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
                    <form method="POST" id="serviceform" action="usersModal/usersModalFunctions.php">
                            <input type="hidden" name="id" id="id">

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"></label>
                                <select class="form-control" id="permissions_id" name="permission_id">
                                    <?php 
                                        include('./Functions/InnovatechAPIFunctions.php');
                                        $newAPIFunctions = new InnovatechAPIFunctions();
                                        $newAPIFunctions->select("permissions","*","permissions_id=2");
                                        $rolesLists = $newAPIFunctions->sql;

                                        while ($datas = mysqli_fetch_assoc($rolesLists)){
                                    ?>
                                    <option value="<?php echo $datas["permissions_id"]; ?>"><?php echo $datas["permission_name"]; ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname"required>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname"required>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Address</label>
                                <input type="text" class="form-control" id="address" name="address"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Contact Number</label>
                                <input type="number" class="form-control" id="contact_num" name="contact_num"required>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Username</label>
                                <input type="text" class="form-control" id="username" name="username"required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input" class="form-control-label"style="color:white;">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            </div>
                            <div class="form-group" id="pass">
                                <label for="exampleInputEmail1"style="color:white;">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-mul" name="addNew">Submit</button>
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