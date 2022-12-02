<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<head>
<script src="jquery-3.6.1.min.js"></script>
</head>  
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
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="margin-top: 100px">
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
             <img src="profileModal/Profileimgs/<?php echo $data['profile']; ?>"  width="200" height="150" alt="avatar">
            <h5 class="my-3" style="color:black"><?php echo $data["fname"]  ." ". $data["lname"]; ?></h5>
            <a href="email-verification.php?email=<?php echo $data['email'];?>" class="btn btn-primary btn-sm " tabindex="-1" role="button" aria-disabled="true"><i class="fa fa-key" aria-hidden="true"></i>Verify My Account</a>
            <button style="margin-right:5px;" type="button" class="btn btn-secondary" id="edit" data-id="<?php echo $data['id']; ?>"><i class="fa fa-pencil " aria-hidden="true"></i>Edit Profile</button>
          </div>
        </div>
        </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Fullname :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="color:black"><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Email Address :</p>
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


<?php include('profileModal/profileEditModal.php'); ?>  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>

        <script src="profileModal/profileFunctions.js"></script>


        