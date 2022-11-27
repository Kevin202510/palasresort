<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->
        
        <section class="accomodation_area section_gap">
            <div class="container">
               <h1>HELLO PROFILE</h1>
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
               <p><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p><br>
               <p><?php echo $data['address']; ?></p><br>
               <p><?php echo $data['contact_num']; ?></p><br>
               <p><?php echo $data['email']; ?></p><br>
               <p><?php echo $data['username']; ?></p><br>
               <p><?php echo $data['password']; ?></p><br>

             <?php }}?>
            </div>
        </section>
        
        <!--================ start footer Area  =================-->	
        <?php include('Pages/layouts/footer.php');?>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>