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
            elseif($data["facility_type"] == "rooms"){
                if(date_format(date_create($time),"a")==="pm"){
                    $bal = $data["night_rate"];
                    }else{
                    $bal = $data["function_pavillion"];
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
        if($newAPIFunctions){
            echo "<script>alert('Sucess Reserve!');</script>";

        }else{
            echo '<script>alert("May Error!");</script>';
        }
    }
  
    ?>

    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax"style="background-image:url('image/fac.jpg')" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>A Perfect Place to Stay & Relax</h6>
                <h2>PALAS RESORT</h2>
                <h2>FACILITIES</h2>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Book<br> Your Room</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                            <form method="POST" >
                                <input type="hidden" name="id" id="id">
                                    <div class="input-group">
                                    <select class="wide"  aria-labelledby="btnGroupDrop1" id="service_ids" name="service_id" required>
                                        <?php
                                            $newAPIFunctions->select("services","*","service_id=5");
                                            $serviceLists = $newAPIFunctions->sql;
                                            while ($data = mysqli_fetch_assoc($serviceLists)){
                                                ?>
                                        <option class="dropdown-item" value = "<?php echo $data['service_id']; ?>" ><?php echo $data['service_name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group">
                                        <select class="wide"  aria-labelledby="btnGroupDrop1" id="facility_ids" name="facility_id" required>
                                        <?php
                                            $newAPIFunctions->select("facilities","*");
                                            $serviceLists = $newAPIFunctions->sql;
                                            while ($data = mysqli_fetch_assoc($serviceLists)){
                                                ?>
                                        <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="input-group">
                                    <select class="wide"  aria-labelledby="btnGroupDrop1" id="customer_ids" name="customer_id" required>
                                        <?php
                                        if(isset($_SESSION['ID'])){
                                            $id=$_SESSION['ID'];
                                            $sq="id='$id'";
                                            $newAPIFunctions->select("users","*",$sq);
                                            $userLists = $newAPIFunctions->sql;
                                                while ($data = mysqli_fetch_assoc($userLists)){
                                                ?>
                                        <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></option>
                                        <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                    <input type="number" class="form-control" id="person_adult_quantitys" name="person_adult_quantity" placeholder="Adult Quantity" required>
                                    </div>
                                    <div class="input-group">
                                    <input type="number" class="form-control" id="person_kids_quantitys" name="person_kids_quantity" placeholder="Kids Quantity" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                    <input type="date" class="form-control" id="dates" name="date">
                                    </div>
                                    <div class="input-group">
                                    <input type="time" class="form-control" id="times" name="time">
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['PERMISSION_ID'])){?>
                                       <?php 
                                        if(isset($_SESSION['ID'])){
                                            $id=$_SESSION['ID'];
                                            $sq="id='$id'";
                                      
                                       $newAPIFunctions->select("users","*",$sq);
                                            $userLists = $newAPIFunctions->sql;
                                                while ($data = mysqli_fetch_assoc($userLists)){?>
                                                    <?php
                                                    if($data["email_verified_at"] == NULL) {
                                                        ?>
                                                     <li class="nav-item"><a class="book_now_btn button_hover" href="profile.php">Verify Account</a></li>
                                                
                                                      <?php } else{?>
                                                      
                                                     <button type="submit" class="book_now_btn button_hover" id="btn-mul" name="booking">Book Now</button>
                                                     <?php }?> 
                                         <?php }}}else{ ?>

                                        <li class="nav-item"><a class="book_now_btn button_hover" href="register.php">Register</a></li>
                                <?php }?>
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

<section class="accomodation_area section_gap">

   <div class="container">
    
  
        <div class="section_title text-center">
            <h2 class="title_color">Rooms Accomodation</h2>
            <p>The more we feel concern for others and seek their well-being, the more friends we will have and the more welcome we will feel </p>
        </div>  
        <div class="row mb_30">
        <?php
        $newAPIFunctions->select("facilities","*");
        $userLists = $newAPIFunctions->sql;

        while ($data = mysqli_fetch_assoc($userLists)){
             if($data["facility_type"] == "rooms"){
             
             ?>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                    <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="250" height="300" alt="">
                        <a href="#" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#"><h4 class="sec_h4">Log Cabin</h4></a>
                    <p>Name:<small><?php echo $data["name"]; ?></small>
                   description:<small><?php echo $data["description"]; ?></small></p>
                    <h7>Day Rate: <small>₱<?php echo $data["day_rate"]; ?></small><br>Night Rate: <small>₱<?php echo $data["night_rate"]; ?></small><br>Over Night: <small>₱<?php echo $data["overnigth_rate"]; ?></small></h7>
                </div>
               
            </div>
            
            <?php }}?>
        </div>
      
    
    </div>
 
</section>


<!--================ Accomodation Area  =================-->





<!--================ Latest Blog Area  =================-->
<section class="latest_blog_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">latest posts from blog</h2>
            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool1.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a> -->
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool2.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a> -->
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool3.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">It S Classified How To Utilize Free</h4></a> -->
                        <p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool4.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a> -->
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool5.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a> -->
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/pool/pool6.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <!-- <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a> -->
                        </div>
                        <!-- <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a> -->
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>	
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