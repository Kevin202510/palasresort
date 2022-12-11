<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

<!--================Header Area =================-->
<?php include('Pages/layouts/header.php');?>
<!--================Header Area =================-->

<!--================Banner Area =================-->
<section class="banner_area">

    <?php
    include('./Functions/InnovatechAPIFunctions.php');
    $newAPIFunctions = new InnovatechAPIFunctions();
 
    if(isset($_POST['booking'])){
        $service_id = $_POST["service_id"];
        $facility_id = $_POST["facility_id"];
        $customer_id = $_POST["customer_id"];
        $date = $_POST["date"];
        $time = date("g:i a", strtotime($_POST["time"]));
        $person_adult_quantity = $_POST["person_adult_quantity"];
        $person_kids_quantity = $_POST["person_kids_quantity"];

        $newAPIFunctions->select("facilities","*","id='$facility_id'");
        $serviceLists = $newAPIFunctions->sql;
        $bal;
        while ($data = mysqli_fetch_assoc($serviceLists)){
            if($data["facility_type"] == "pool"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }else{
                    $bal = $data["day_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }
            }
            elseif($data["facility_type"] == "adrenaline_game"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }else{
                    $bal = $data["day_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }
            }
            elseif($data["facility_type"] == "sports_center"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }else{
                    $bal = $data["day_rate"] * ($person_adult_quantity+$person_kids_quantity);
                }
            }
            elseif($data["facility_type"] == "cottage"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"];
                    }else{
                    $bal = $data["day_rate"];
                    }
                } 

            elseif($data["facility_type"] == "rooms"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"];
                  }else{
                    $bal = $data["day_rate"];
                  }
                } 
            elseif($data["facility_type"] == "function_pavillion"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"];
                    }else{
                    $bal = $data["day_rate"];
                    }
                }
        }
        

        $newAPIFunctions->insert('reservations',['service_id'=>$service_id,
        'facility_id'=>$facility_id,
        'customer_id'=>$customer_id,
        'date'=>$date,
        'time'=>$time,
        'total_balance'=>$bal,
        'person_adult_quantity'=>$person_adult_quantity,
        'person_kids_quantity'=>$person_kids_quantity,]);

        $valid = $_POST["facility_id"];
        $newAPIFunctions->update('facilities',['status'=>1],"id='$valid'");
        
        if($newAPIFunctions){
            echo "<script>alert('Sucess Reserve!');</script>";

        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }
  
    ?>

    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax"style="background-image:url('image/pal2.jpg');background: size 80%" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>A Perfect Place to Stay & Relax</h6>
                <h2>PALAS RESORT</h2>
                <p>A place where you can go and relax your mind in the heart of nature</p>
                
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    
                    <h2>Book<br>Your Facilities</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                            <form method="POST" >
                                <input type="hidden" name="id" id="id">
                                    <?php
                                        $newAPIFunctions->select("services","*","service_id=5");
                                        $serviceLists = $newAPIFunctions->sql;
                                        while ($data = mysqli_fetch_assoc($serviceLists)){
                                            ?>
                                    <input type="hidden" id="service_ids" name="service_id"  value = "<?php echo $data['service_id']; ?>">
                                    <?php } ?>
                                
                                    <?php
                                    if(isset($_SESSION['ID'])){
                                        $id=$_SESSION['ID'];
                                        $sq="id='$id'";
                                        $newAPIFunctions->select("users","*",$sq);
                                        $userLists = $newAPIFunctions->sql;
                                            while ($data = mysqli_fetch_assoc($userLists)){
                                            ?>
                                    <input type="hidden" id="customer_ids" name="customer_id"  value = "<?php echo $data['id']; ?>">
                                    <?php }} ?>


                                    <div class="input-group"  style="background-color:white">
                                        <select class="wide"  aria-labelledby="btnGroupDrop1" id="facility_ids" name="facility_id" required>
                                        <?php
                                            $newAPIFunctions->select("facilities","*");
                                            $serviceLists = $newAPIFunctions->sql;
                                            while ($data = mysqli_fetch_assoc($serviceLists)){
                                                if($data['status'] == 0){
                                                ?>
                                        <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></option>
                                        <?php } }?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                    <input type="number" class="form-control" id="person_adult_quantitys" name="person_adult_quantity" placeholder="Adult Quantity" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="book_tabel_item">
                                    <div class="input-group">
                                    <input type="date" class="form-control" id="dates" name="date">
                                    </div>
                                    <div class="input-group">
                                    <input type="number" class="form-control" id="person_kids_quantitys" name="person_kids_quantity" placeholder="Kids Quantity" >
                                    </div>
                                 
                                </div>
                            </div>

                            <div class="col-md-4">
                               
                                    <div class="input-group">
                                    <input type="time" class="form-control" id="times" name="time">
                                    </div>
                                

                                <?php if(isset($_SESSION['PERMISSION_ID'])){?>
                                       <?php 
                                        if(isset($_SESSION['ID'])){
                                            $id=$_SESSION['ID'];
                                            $sq="id='$id'";
                                      
                                       $newAPIFunctions->select("users","*",$sq);
                                            $userLists = $newAPIFunctions->sql;
                                                while ($data = mysqli_fetch_assoc($userLists)){?>
                                                <?php  if($_SESSION['PERMISSION_ID'] == 1 || $_SESSION['PERMISSION_ID'] == 3) { ?>
                                                    <a style="margin-top:10px" class="book_now_btn button_hover" href="Pages/admin/index.php">Cant Reserve</a>
                                                    <?php } else{?>
                                                         <?php
                                                            
                                                                if($data["email_verified_at"] == NULL) {
                                                                    ?>
                                                                <a style="margin-top:10px" class="book_now_btn button_hover" href="profile.php">Verify Account</a>
                                                            
                                                                <?php } else{?>
                                                                
                                                                <button type="submit" class="book_now_btn button_hover" id="btn-mul" name="booking" style="margin-top:10px">Book Now</button>
                                                                <?php }?> 
                                         <?php }}}}else{ ?>

                                        <a style="margin-top:10px" class="book_now_btn button_hover" href="register.php">Register</a>
                                <?php }?>
                            </div> 
                            </div>      
                      </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->

<!--================ Accomodation Area  =================-->


<section style="background-image:url('image/wood2.jpg');background-repeat: no-repeat; background-size: 100% 100%">
    <div class="section_title text-center">
                <h2 class="title_color" style=" height:50px;background-color: #fae746;font-family: impact, sans-serif;">Rooms</h2>
            </div> 
    <div class="container"> 
    <div class="row justify-content-center">
    <?php
            $newAPIFunctions->select("facilities","*");
            $userLists = $newAPIFunctions->sql;

            while ($data = mysqli_fetch_assoc($userLists)){
                if($data["facility_type"] == "rooms"){
                    if($data['status'] == 0){                
                ?>
    <div class="card" style="width: 18rem;text-align:center;margin-right: 50px; margin-bottom: 30px">
    <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
    <div class="card-body">
                    <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
        <h4 class="card-text"><small> Description : <?php echo $data["description"]; ?><br>Day Rate: ₱ <?php echo $data["day_rate"]; ?><br>Night Rate: ₱ <?php echo $data["night_rate"]; ?></small></h4>
    </div>
    </div>
    <?php }}}?>
    </div>

</div>
    </section>

 <section style="background-image:url('image/wood2.jpg') ;background-repeat: no-repeat; background-size: 100% 100%">
        <div class="section_title text-center">
                    <h2 class="title_color" style=" height:50px;background-color:#fae746;font-family: impact, sans-serif;">Cottages</h2>
                </div> 
        <div class="container"> 
        <div class="row justify-content-center">
        <?php
                $newAPIFunctions->select("facilities","*");
                $userLists = $newAPIFunctions->sql;

                while ($data = mysqli_fetch_assoc($userLists)){
                    if($data["facility_type"] == "cottage"){
                        if($data['status'] == 0){
                    
                    ?>
        <div class="card" style="width: 18rem;text-align:center;margin-right:50px; margin-bottom: 30px">
        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
        <div class="card-body">
                        <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
                        <h4 class="card-text"><small> Description : <?php echo $data["description"]; ?><br>Day Rate: ₱ <?php echo $data["day_rate"]; ?><br>Night Rate: ₱ <?php echo $data["night_rate"]; ?></small></h4>
        </div>
        </div>
        <?php }}}?>
        </div>

    </div>
</section>

<section style="background-image:url('image/wood2.jpg');background-repeat: no-repeat; background-size: 100% 100%">
        <div class="section_title text-center">
                    <h2 class="title_color" style=" height:50px;background-color:#fae746;font-family: impact, sans-serif;">Function Pavillion</h2>
                </div> 
        <div class="container"> 
        <div class="row justify-content-center">
        <?php
                $newAPIFunctions->select("facilities","*");
                $userLists = $newAPIFunctions->sql;

                while ($data = mysqli_fetch_assoc($userLists)){
                    if($data["facility_type"] == "function_pavillion"){
                        if($data['status'] == 0){
                    
                    ?>
        <div class="card" style="width: 18rem;text-align:center;margin-right:80px; margin-bottom: 50px">
        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
        <div class="card-body">
                            <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
                            <h4 class="card-text"><small> Description : <?php echo $data["description"]; ?><br>Day Rate: ₱ <?php echo $data["day_rate"]; ?><br>Night Rate: ₱ <?php echo $data["night_rate"]; ?></small></h4>
        </div>
        </div>
        <?php }}}?>
        </div>

    </div>
</section>

<section style="background-image:url('image/wood2.jpg');background-repeat: no-repeat; background-size: 100% 100%">
        <div class="section_title text-center">
                    <h2 class="title_color" style=" height:50px;background-color:#fae746;font-family: impact, sans-serif;">Pools</h2>
                </div> 
        <div class="container"> 
        <div class="row justify-content-center">
        <?php
                $newAPIFunctions->select("facilities","*");
                $userLists = $newAPIFunctions->sql;

                while ($data = mysqli_fetch_assoc($userLists)){
                    if($data["facility_type"] == "pool"){
                        if($data['status'] == 0){
                    
                    ?>
        <div class="card" style="width: 18rem;text-align:center;margin-right:50px; margin-bottom: 30px">
        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
        <div class="card-body">
                            <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
            <h4 class="card-text"><small description:<?php echo $data["description"]; ?><br>Day Rate: ₱ <?php echo $data["day_rate"]; ?><br>Night Rate: ₱ <?php echo $data["night_rate"]; ?><br>Over Night: ₱ <?php echo $data["overnigth_rate"]; ?></small></h4>
        </div>
        </div>
        <?php }}}?>
        </div>

    </div>
</section>

<section style="background-image:url('image/wood2.jpg');background-repeat: no-repeat; background-size: 100% 100%">
        <div class="section_title text-center">
                    <h2 class="title_color" style=" height:50px;background-color:#fae746;font-family: impact, sans-serif;">Sports Center</h2>
                </div> 
        <div class="container"> 
        <div class="row justify-content-center">
        <?php
                $newAPIFunctions->select("facilities","*");
                $userLists = $newAPIFunctions->sql;

                while ($data = mysqli_fetch_assoc($userLists)){
                    if($data["facility_type"] == "sports_center"){
                        if($data['status'] == 0){
                    
                    ?>
        <div class="card" style="width: 18rem;text-align:center;margin-right:50px; margin-bottom: 50px">
        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
        <div class="card-body">
                            <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
                            <h4 class="card-text"><small> Description:<?php echo $data["description"]; ?><br>Day Rate:₱<?php echo $data["day_rate"]; ?><br>Night Rate: ₱<?php echo $data["night_rate"]; ?></small></h4>
        </div>
        </div>
        <?php }}}?>
        </div>

    </div>
</section>

<section style="background-image:url('image/wood2.jpg');background-repeat: no-repeat; background-size: 100% 100%">
        <div class="section_title text-center">
                    <h2 class="title_color" style=" height:50px;background-color:#fae746;font-family: impact, sans-serif;">Adrenaline Games</h2>
                </div> 
        <div class="container"> 
        <div class="row justify-content-center">
        <?php
                $newAPIFunctions->select("facilities","*");
                $userLists = $newAPIFunctions->sql;

                while ($data = mysqli_fetch_assoc($userLists)){
                    if($data["facility_type"] == "adrenaline_game"){
                        if($data['status'] == 0){
                    
                    ?>
        <div class="card" style="width: 18rem;text-align:center;margin-right:50px; margin-bottom: 50px">
        <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="286" height="230" alt="">
        <div class="card-body">
                            <a href="#"><h4 class="sec_h4"><?php echo $data["name"]; ?></h4></a>
                            <h4 class="card-text"><small> Description:<?php echo $data["description"]; ?><br>Day Rate:₱<?php echo $data["day_rate"]; ?><br>Night Rate: ₱<?php echo $data["night_rate"]; ?></small></h4>
        </div>
        </div>
        <?php }}}?>
        </div>

    </div>
</section>


<!--================ Accomodation Area  =================-->

                </div>
            </div>
        </div>
    </div>
</section>


<!--================ Recent Area  =================-->

<!--================ start footer Area  =================-->	
<?php include('Pages/layouts/footer.php');?>
<!--================ End footer Area  =================-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('Pages/layouts/scripts.php');?>