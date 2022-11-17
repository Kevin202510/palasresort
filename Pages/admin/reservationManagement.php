<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Reservation Management</h6>
              <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
              </button>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Facility Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PersonQuantity</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Balance</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  include('../../Functions/InnovatechAPIFunctions.php');
                  $newAPIFunctions = new InnovatechAPIFunctions();
                  $newAPIFunctions->selectleftjoin3();
                  $serviceLists = $newAPIFunctions->sql;
          
                  $index = 1;
                  $reserv_stat="Paid";
                  while ($data = mysqli_fetch_assoc($serviceLists)){
                    if($data['reservation_status']==0){
                      $reserv_stat = "Not Paid";
                    }
              ?>
              <tr>
                <td class="text-wrap"><?php echo $index?></td>
                <td class="text-wrap"><?php echo $data["service_name"];?></td>
                <td class="text-wrap"><?php echo $data["name"]; ?></td>
                <td class="text-wrap"><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></td>
                <td class="text-wrap"><p> Date:<?php echo $data["date"]." <br> Time : ". $data["time"]?></p></td>
                <td class="text-wrap"><p> Adult:<?php echo $data["person_adult_quantity"]." <br> Kids : ". $data["person_kids_quantity"]?></p></td>
                <td class="text-wrap"><?php echo $data["total_balance"]; ?></td>
                <td class="text-wrap"><?php echo $reserv_stat; ?></td>
                <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['res_id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['res_id']; ?>" id="delete">Delete</button></td>
              </tr>
              <?php $index++; } ?>
              </tbody>
              </table>
                </div>
              </div>
            </div>
          </div>
            
        </div>


        <?php include('reservationsModal/resevationsEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="reservationsModal/reservationsFunctions.js"></script>