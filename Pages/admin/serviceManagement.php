<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card" style="margin-top:50px;">
              <div class="card-body">
                  <div class="card-title">
                    <h4 class="card-title">Services Management</h4>
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
                        <th scope="col">Service Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tbody>
                      <?php
                          include('../../Functions/InnovatechAPIFunctions.php');
                          $newAPIFunctions = new InnovatechAPIFunctions();
                          $newAPIFunctions->select("services","*");
                          $serviceLists = $newAPIFunctions->sql;
                  
                          $index = 1;
                          while ($data = mysqli_fetch_assoc($serviceLists)){
                      ?>
                          <tr>
                              <td class="text-wrap"><?php echo $data['service_id']; ?></td>
                              <td class="text-wrap"><?php echo $data["service_name"]; ?></td>
                              <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['service_id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['service_id']; ?>" id="delete">Delete</button></td>
                          </tr>

                          <?php $index++; } ?>
                    </tbody>
                  </table>
              </div>
            </div>
            
        </div>


    <?php include('servicesModal/servicesEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="servicesModal/servicesFunctions.js"></script>