<?php 
session_start(); 
 if(!session_id()){
    header("Location:index.php");
    die();
 }

 $_SESSION['PERMISSION_ID'] = 0;
 $_SESSION['FULLNAME'] = 0;

 include('./Functions/InnovatechAPIFunctions.php');
 $newAPIFunctions = new InnovatechAPIFunctions();

 if(isset($_POST["login"])){

    $username=$_POST["username"];
    $password=$_POST["password"];

    $que = "username='$username' AND password='$password'";
    $newAPIFunctions->select("users","*",$que);
    $userLists = $newAPIFunctions->sql;
    $user_id;
    while ($data = mysqli_fetch_assoc($userLists)){
        if($data['permission_id']==1 || $data['permission_id']==3){
            $_SESSION['PERMISSION_ID'] = $data['permission_id'];
            $_SESSION['FULLNAME'] = $data['fname']." ".$data['lname'];
            $_SESSION['ADDRESS'] = $data['address'];
            $_SESSION['CONTACT_NUM'] = $data['contact_num'];
            $_SESSION['EMAIL'] = $data['email '];
            $_SESSION['USERNAME'] = $data['username'];
            $_SESSION['PASSWORD'] = $data['	password'];
            $_SESSION['ID'] = $data['id'];
        
            header("location: Pages/admin/index.php");
        }else{
            $_SESSION['PERMISSION_ID'] = $data['permission_id'];
            $_SESSION['FULLNAME'] = $data['fname']." ".$data['lname'];
            $_SESSION['ADDRESS'] = $data['address'];
            $_SESSION['CONTACT_NUM'] = $data['contact_num'];
            $_SESSION['EMAIL'] = $data['email '];
            $_SESSION['USERNAME'] = $data['username'];
            $_SESSION['PASSWORD'] = $data['	password'];
            $_SESSION['ID'] = $data['id'];
            header("location: index.php");
        }
    }
    // if($userLists ){
    //     if(!session_id())
    //         session_start();
    //         $_SESSION['user_id'] = true;
    //         $_SESSION['fullname'] = $fullname;
    //         header("location:index.php");
    //         die();
    // }else{
    //     echo"<script>alert('login faild');</script>";
    // }
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

      
    <section class="accomodation_area section_gap"style="background-image: url('image/act.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%">
           
           <div class="container" >
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 30rem;height: 33rem;background-color: hsla(0, 0%, 0%, 0.5);" > 
            <div class="row" >
			<div class="col-md-5 mx-auto">
			<div  id="first">  
				<div class="myform form">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center" style="margin-top: 60px">
							<h1 style="color:white;font-family: comic sans ms, cursive;">Log In</h1>
						 </div>
					</div>
             
                           <form action="" method="post" style="margin-top: 50px" >
                           <div class="form-group">
                              <label for="exampleInputEmail1"style="color:white;">Username</label>
                              <input type="text" name="username"  class="form-control"   placeholder="User">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1"style="color:white;">Password</label>
                              <input type="password" name="password"class="form-control"  placeholder="Enter Password">
                           </div>
                          
                           <div class="col-md-12 text-center ">
                              <button type="submit" name ="login"class=" btn btn-block mybtn btn-info tx-tfm">Login</button>
                            </div>
                           
                           <div class="col-md-12 ">
                              <div class="login-or">
                                
                           <div class="form-group">
                              <br><p class="text-center"style="color:white;">Don't have account? <a href="register.php" id="signup">Create An Account</a></p>
                            </div>  
                          
                            </form>
                     </div>
				</div>
			</div>
        </div> 
			</div>
		</div>
      </div>   
      </div> 
            </div>
        </section>


<?php include('Pages/layouts/scripts.php');?>

<script>
    window.history.forward();
             function noBack() { 
                  window.history.forward(); 
             }
</script>