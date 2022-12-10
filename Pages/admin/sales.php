<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Entrance Management</h6>
              <div class="row" style="float:right;">
              <div class="col-md-12">
                <div class="input-group">
                </div>
              </div>
              </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Balance</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fullname</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  include('../../Functions/InnovatechAPIFunctions.php');
                  $newAPIFunctions = new InnovatechAPIFunctions();
                  $newAPIFunctions->select41();
                  $serviceLists = $newAPIFunctions->sql;
          
                  $index = 1;
                //   $reserv_stat="Paid";
                  while ($data = mysqli_fetch_assoc($serviceLists)){
                    // if($data['reservation_status']==0){
                    //   $reserv_stat = "Not Paid";
                    // }
              ?>
              <tr>
                <td class="text-wrap"><?php echo $index?></td>
                <td class="text-wrap"><?php echo $data["reservation_id"];?></td>
                <td class="text-wrap"><?php echo $data["updated_at"]; ?></td>
                <td class="text-wrap"><?php echo $data["total_balance"]; ?></td>
                <td class="text-wrap"><?php echo $data["fname"]; ?></td>
              </tr>
              <?php $index++; } ?>
              </tbody>
              </table>
                </div>
              </div>
            </div>
          </div> 
        </div>


        


        <?php include('entranceModal/entranceEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="entranceModal/entranceFunctions.js"></script>