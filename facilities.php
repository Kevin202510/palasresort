
    <?php include('Pages/layouts/head.php');?>

<!--================Header Area =================-->
<?php include('Pages/layouts/header.php');?>
<!--================Header Area =================-->

<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
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
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker11'>
                                            <input type='text' class="form-control" placeholder="Arrival Date"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" placeholder="Departure Date"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select class="wide">
                                            <option data-display="Adult">Adult</option>
                                            <option value="1">Old</option>
                                            <option value="2">Younger</option>
                                            <option value="3">Potato</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <select class="wide">
                                            <option data-display="Child">Child</option>
                                            <option value="1">Child</option>
                                            <option value="2">Baby</option>
                                            <option value="3">Child</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select class="wide">
                                            <option data-display="Child">Number of Rooms</option>
                                            <option value="1">Room 01</option>
                                            <option value="2">Room 02</option>
                                            <option value="3">Room 03</option>
                                        </select>
                                    </div>
                                    <a class="book_now_btn button_hover" href="#">Book Now</a>
                                </div>
                            </div>
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
        include('./Functions/InnovatechAPIFunctions.php');
        $newAPIFunctions = new InnovatechAPIFunctions();
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
    
     
<br>
<br>

 <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Adrenaline Game</h2>
            <p>The more we feel concern for others and seek their well-being, the more friends we will have and the more welcome we will feel </p>
        </div>
        <div class="row mb_30">
        <?php
        $newAPIFunctions->select("facilities","*");
        $userLists = $newAPIFunctions->sql;

        while ($data = mysqli_fetch_assoc($userLists)){
            if($data["facility_type"] == "adrenaline_game"){
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