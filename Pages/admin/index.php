<?php session_start(); ?>

<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card">
              <div class="card-body">
     
        <section style="background-image:url('image/pic1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
            
            <div class="container py-5">
            <?php 
                   include('../../Functions/InnovatechAPIFunctions.php');
                   $newAPIFunctions = new InnovatechAPIFunctions();

             if(isset($_SESSION['ID'])){
             $id=$_SESSION['ID'];
             $sq="id='$id'";
             $newAPIFunctions->select("users","*",$sq);
             $userLists = $newAPIFunctions->sql;
                 while ($data = mysqli_fetch_assoc($userLists)){
                ?>
    
 <div class="row">
      
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <div class="image-upload">
            <label for="file-input">
            <?php if($data['profile'] == NULL){ ?>
            <img src="../../profileModal/Profileimgs/profile.jpg"  width="200" height="150" alt="avatar">
            <?php } else{?>
            <img src="../../profileModal/Profileimgs/<?php echo $data['profile']; ?>"  width="200" height="150" alt="avatar">
            <?php }?>
            </label>
            <input id="file-input" type="file" style="display: none;"/>
          </div>
            <h5 class="my-3" style="color:black"><?php echo $data["fname"]  ." ". $data["lname"]; ?></h5>
            
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

                    
              </div>
            </div>
            



        </div>

      <!-- End Content Side -->
    
</main>
<?php include('../../profileModal/profileEditModal.php'); ?>  

<?php include('page/scripts.php'); ?>

<script src="../../profileModal/profileFunctions.js"></script>