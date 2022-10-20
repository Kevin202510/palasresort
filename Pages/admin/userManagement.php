<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

            <div class="card" style="margin-top:50px;">
              <div class="card-body">
                  <div class="card-title">
                    <h4 class="card-title">Users Management</h4>
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
                        <th scope="col">Role</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tbody>
                      <?php
                          include('../../Functions/InnovatechAPIFunctions.php');
                          $newAPIFunctions = new InnovatechAPIFunctions();
                          $newAPIFunctions->selectleftjoin("users","permissions","permissions_id","permission_id","permission_id!=1");
                          $userLists = $newAPIFunctions->sql;
                  
                          $index = 1;
                          while ($data = mysqli_fetch_assoc($userLists)){
                      ?>
                          <tr>
                              <td class="text-wrap"><?php echo $data['id']; ?></td>
                              <td class="text-wrap"><?php echo $data["permission_name"]; ?></td>
                              <td class="text-wrap"><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></td>
                              <td class="text-wrap"><?php echo $data["address"]; ?></td>
                              <td class="text-wrap"><?php echo $data["contact_num"]; ?></td>
                              <td class="text-wrap"><?php echo $data["username"]; ?></td>
                              <td class="text-wrap"><?php echo $data["email"]; ?></td>
                              <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['id']; ?>" id="delete">Delete</button></td>
                          </tr>

                          <?php $index++; } ?>
                    </tbody>
                  </table>
              </div>
            </div>
            
        </div>


    <?php include('usersModal/usersEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="usersModal/usersFunctions.js"></script>