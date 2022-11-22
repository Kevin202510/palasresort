
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
      
    <section class="accomodation_area section_gap"style="background-image: url('image/act.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
background-size: 100% 100%;">
            <div class="container" >
            <div class="card" style="width: 30rem;margin-left: 350px;background-color: hsla(0, 0%, 0%, 0.5);" > 
            <div class="row" >
			<div class="col-md-5 mx-auto">
			<div  id="first">  
				<div class="myform form">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1 style="color:white;">Log In</h1>
						 </div>
					</div>
             
                   <form action="" method="post" name="login" >
                           <div class="form-group">
                              <label for="exampleInputEmail1"style="color:white;">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1"style="color:white;">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                          
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                
                           <div class="form-group">
                              <p class="text-center"style="color:white;">Don't have account? <a href="register.php" id="signup">Create An Account</a></p>
                          
                        </form>
                     </div>
				</div>
			</div>
        </div> 
			</div>
		</div>
      </div>   
    
            </div>
        </section>

<?php include('Pages/layouts/footer.php');?>
<?php include('Pages/layouts/scripts.php');?>