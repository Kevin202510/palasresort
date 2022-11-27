<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->

    <section>      
        <div class="section_title text-center" >
            <h2 class="title_color">RESERVE</h2>
        </div>  
        <div class="">
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

            <div class="col-lg-8" style="margin-left: 100px">
                    <div class="row accomodation_item text-center">
                        <div class="hotel_img">
                        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="150" height="200" alt="">
                           <form method="POST" >
                           <button type="submit" class="btn theme_btn button_hover" id="btn-mul" name="booking">Edit</button>    </form>
                        </div>
                        <div class="hotel_img">
                            <p>Service : <?php echo $data["service_name"]."<br>"."Facility : ". $data["name"]."<br>Facility : ".$data["fname"] ." ". $data["mname"] ." ". $data["lname"];?></p>
                            <p>Date : <?php echo $data["date"]."Time : ". $data["time"]?></p>
                            <p>Adult : <?php echo $data["person_adult_quantity"]." Kids : ". $data["person_kids_quantity"]." Balance : ". $data["total_balance"]?></p>
                        </div>
                    </div>
               
            </div>
            

        </div>
      
      
    
    </div>
    <?php }}}?>
</section>
        
        <!--================ start footer Area  =================-->	
        <?php include('Pages/layouts/footer.php');?>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>