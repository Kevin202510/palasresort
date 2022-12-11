<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card" style="margin-top:50px;">
              <div class="card-body">
                  <div class="card-title">
                    <h4 class="card-title" style="color:#987554;font-family : bradley hand, cursive">Facilities Management</h4>
                    <div class="d-flex flex-row-reverse">
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>Facilities
                    </button>
                    </div>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr >
                      <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Facility Rates</th>
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
                          $stataus="Available";
                          while ($data = mysqli_fetch_assoc($userLists)){
                      ?>
                          <tr>
                              <td><?php echo $index; ?></td>
                              <td><img alt="Chania" width="120" height="120" src="./facilitiesimage/images/<?php echo $data['image']; ?>"></td>
                              <td><?php echo $data["name"]; ?></td>
                              <td class="text-wrap"><p> <?php echo $data["description"]." <br> Day Rate : ". $data["day_rate"]." <br> Night Rate : ". $data["night_rate"] . " <br> Overnight Rate : ". $data["overnigth_rate"]?></p></td>
                              <td><?php echo $data["facility_type"]; ?></td>
                              <td><?php echo $stataus; ?></td>
                              <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg></button><button type="button" class="btn btn-danger" data-id="<?php echo $data['id']; ?>" id="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                          </svg></button></td>
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