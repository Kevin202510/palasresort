<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card" style="margin-top:50px;">
              <div class="card-body">
                  <div class="card-title">
                    <h4 class="card-title">Reservation Management</h4>
                    <div class="d-flex flex-row-reverse">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add
                      </button>
                    </div>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reserve</th>
                        <th scope="col">Date and Time</th>
                        <th scope="col">PersonQuantity</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Status</th>
                        <th scope="col">CreateUpdateAt</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tbody>
                      <?php
                          include('../../Functions/InnovatechAPIFunctions.php');
                          $newAPIFunctions = new InnovatechAPIFunctions();
                          $newAPIFunctions->selectleftjoin3();
                          $serviceLists = $newAPIFunctions->sql;
                  
                          $index = 1;
                          while ($data = mysqli_fetch_assoc($serviceLists)){
                      ?>
                          <tr>
                              <td class="text-wrap"><?php echo $index?></td>
                              <td class="text-wrap"><p> service:<?php echo $data["service_name"]." <br> Facility : ". $data["facility_id"]." <br> Customer: ". $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p></td>
                              <td class="text-wrap"><p> Date:<?php echo $data["date"]." <br> Time : ". $data["time"]?></p></td>
                              <td class="text-wrap"><p> Adult:<?php echo $data["person_adult_quantity"]." <br> Kids : ". $data["person_kids_quantity"]?></p></td>
                              <td class="text-wrap"><?php echo $data['total_balance']; ?></td>
                              <td class="text-wrap"><?php echo $data['reservation_status']; ?></td>
                              <td class="text-wrap">Create At<?php echo $data['created_at']." <br> Update At : ".$data['updated_at']?></td>
                              <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['service_id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['service_id']; ?>" id="delete">Delete</button></td>
                          </tr>

                          <?php $index++; } ?>
                    </tbody>
                  </table>
              </div>
            </div>
            
        </div>


        <?php include('reservationsModal/resevationsEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="reservationsModal/reservationsFunctions.js"></script>