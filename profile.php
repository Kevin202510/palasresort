<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->

     
        <section style="background-image:url('image/pic1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
            
            <div class="container py-5">
            <?php 
                include('./Functions/InnovatechAPIFunctions.php');
                $newAPIFunctions = new InnovatechAPIFunctions();

             if(isset($_SESSION['ID'])){
             $id=$_SESSION['ID'];
             $sq="id='$id'";
             $newAPIFunctions->select("users","*",$sq);
             $userLists = $newAPIFunctions->sql;
                 while ($data = mysqli_fetch_assoc($userLists)){
                ?>
    
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="margin-top: 50px">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="image/fac.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3" style="color:black"><?php echo $data["fname"]  ." ". $data["lname"]; ?></h5>
        </div>
        </div>
        </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Full Name :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="color:black"><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Email :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Phone :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['contact_num']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Address :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['address']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Username :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['username']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Password :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['password']; ?></p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php }}?>
</section>



        
        <!--================ start footer Area  =================-->	
        <?php include('Pages/layouts/footer.php');?>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>