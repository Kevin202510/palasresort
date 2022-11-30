<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



<section>  
<div class="container">
<div class="section_title " >
            <h2 class="title_color"style="margin-top: 100px"></h2>
        </div> 
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

            <div class="card mb-4" style="max-width: 800px;margin-left: 100px">
            <div class="row mb_30">
                <div class="col-md-4">
                <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="250" height="327" alt="">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <img src="image/pic5.png" width="120" height="90" alt="">
                    <p class="card-text">Service : <?php echo $data["service_name"]."<br>"."Facility : ". $data["name"]."<br>Facility : ".$data["fname"] ." ". $data["mname"] ." ". $data["lname"];?><br>Adult : <?php echo $data["person_adult_quantity"]." <br>Kids : ". $data["person_kids_quantity"]." <br>Balance :₱ ". $data["total_balance"]?><small class="text-muted"><br>Date : <?php echo $data["date"]."Time : ". $data["time"]?></small></p>
                    <button type="submit" class="btn theme_btn button_hover" id="btn-mul" name="booking">Edit</button>
                    <button type="button" class="btn btn-danger" data-id="<?php echo $data['res_id']; ?>" id="delete">Cancel</button></td>
                </div>  
                </div>
            </div>
            </div>
            <?php }}}?>

            </div>
            
</div>
 
</section>
 
  
        
      
		
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>