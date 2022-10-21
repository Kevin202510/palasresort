<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card" style="margin-top:50px;">
              <div class="card-body">
                  <div class="card-title">
                    <h4 class="card-title">Facilities Management</h4>
                    <div class="d-flex flex-row-reverse">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add
                      </button>
                    </div>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr >
                      <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Facility Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tbody>
                      <?php
                          include('../../Functions/InnovatechAPIFunctions.php');
                          $newAPIFunctions = new InnovatechAPIFunctions();
                          $newAPIFunctions->select("facilities","*");
                          $userLists = $newAPIFunctions->sql;
                  
                          $index = 1;
                          while ($data = mysqli_fetch_assoc($userLists)){
                      ?>
                          <tr>
                              <td><?php echo $index; ?></td>
                              <td><img alt="Chania" width="120" height="120" src="./facilitiesimage/images/<?php echo $data['image']; ?>"></td>
                              <td><?php echo $data["name"]; ?></td>
                              <td class="text-wrap"><p> <?php echo $data["description"]." <br> Day Rate : ". $data["day_rate"]." <br> Night Rate : ". $data["night_rate"] . " <br> Overnight Rate : ". $data["overnigth_rate"]?></p></td>
                              <td><?php echo $data["facility_type"]; ?></td>
                              <td><?php echo $data["status"]; ?></td>
                              <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['id']; ?>" id="delete">Delete</button></td>
                          </tr>

                          <?php $index++; } ?>
                    </tbody>
                  </table>
              </div>
            </div>
            
        </div>


    <?php include('facilitiesModal/facilitiesEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>
<script src="facilitiesModal/facilitiesFunctions.js"></script>