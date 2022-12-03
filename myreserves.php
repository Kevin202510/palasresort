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
<div class="card">
    <div class="card-header" style="background-color:#72cc50">
        <center><h1 style="color:white">MY RESERVATIONS</h1></center>
    </div>
    <div class="card-body" style="background-image:url('image/wood.jpg')">
<div class="row justify-content-center">
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
             <div class="card" style="margin-right:10px; margin-top:10px;">
                <div class="card-body" style="text-align:center;">
                <div class="col-md-4">
                    <div class="card">
                    <img src="Pages/admin/facilitiesimage/images/<?php echo $data['image']; ?>" width="220" height="150" alt="">
                    </div>
                </div>
                    
                    <p class="card-text">Service : <?php echo $data["service_name"]."<br>"."Facility : ". $data["name"];?><br>Adult : <?php echo $data["person_adult_quantity"]." Kids : ". $data["person_kids_quantity"]." <br>Balance :₱ ". $data["total_balance"]?><small class="text-muted"><br>Date : <?php echo $data["date"]."Time : ". $data["time"]?></small></p>
                    <button style="margin-right:5px;" type="button" class="btn theme_btn button_hover" id="edit" data-id="<?php echo $data['res_id']; ?>">Edit</button>
                    <button type="button" class="btn btn-danger" data-id="<?php echo $data['res_id']; ?>" id="delete">Cancel</button>
                    <button type="button" class="btn btn-light" id="qrcodegen"  data-id="<?php echo $data['res_id']; ?>" ><span><i class="fa fa-qrcode fa-3x" aria-hidden="true"></i></span></button>
                </div>
             </div>
            <?php }}}?>
            
    </div>
</div>
</div>
            
</div>
 
</section>
 
  
        <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="qr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">QRCODE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
            <div id="qrcode" style="background-color:white; width:100px; height:100px; margin-top:15px;"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="downloadqr">Download</button>
      </div>
    </div>
  </div>
</div>
      
		

<?php include('myreservationsModal/myresevationsEditModal.php'); ?>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <?php include('Pages/layouts/scripts.php');?>

<script src="myreservationsModal/myreservationsFunctions.js"></script>       

<script type="text/javascript" src="qrcode.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        };

        $("body").on('click','#qrcodegen',function(e){
                var idss = $(e.currentTarget).data('id');
                // alert(idss);
                makeCode(idss);
                $("#qr").modal("show");
        });

        $("#downloadqr").click(function(){
            let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
                downloadURI(dataUrl, 'qrcode.jpg');
        });

        var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

function makeCode (elText) {
    var newtext = ""+elText+"";	
	qrcode.makeCode(newtext);
}

    });
</script>