<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->

          
        <div class="section_title text-center">
            <h2 class="title_color">RESERVE</h2>
        </div>  
        <div class="row mb_30">
        <?php
          include('./Functions/InnovatechAPIFunctions.php');
          $newAPIFunctions = new InnovatechAPIFunctions();
         if(isset($_SESSION['ID'])){
            $id=$_SESSION['ID'];
            $sq="id='$id'";
            $newAPIFunctions->selectleftjoin3();
                 $serviceLists = $newAPIFunctions->sql;
                 $reserv_stat="Paid";
                 while ($data = mysqli_fetch_assoc($serviceLists)){
               if($data["customer_id"]==$id){
             
             ?>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                    <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="250" height="300" alt="">
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <p><?php echo $data["service_name"]."Time : ". $data["name"]?></p>
                    <p><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p>
                    <p>Date:<?php echo $data["date"]."Time : ". $data["time"]?></p>
                    <p>Adult:<?php echo $data["person_adult_quantity"]." Kids : ". $data["person_kids_quantity"]." Balance : ". $data["total_balance"]?></p>
                </div>
               
            </div>
            
            <?php }}}?>
        </div>
      
    
    </div>
 
</section>
        
        <!--================ start footer Area  =================-->	
        <?php include('Pages/layouts/footer.php');?>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>