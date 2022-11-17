<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Users Management</h6>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fullname</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                </tr>
              </thead>
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
                <td><?php echo $index; ?></td>
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
          </div>
            
        </div>
            
        </div>


    <?php include('usersModal/usersEditModal.php'); ?>

      <!-- End Content Side -->
    
</main>

<?php include('page/scripts.php'); ?>

<script src="usersModal/usersFunctions.js"></script>