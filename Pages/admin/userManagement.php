<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="color:#987554;font-family : bradley hand, cursive">Users Management</h6>
              <button type="button" style="float:right;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg> Users
              </button>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
              <thead style="background-color:#FFE900">
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
                <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg></button><button type="button" class="btn btn-warning" data-id="<?php echo $data['id']; ?>" id="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                          </svg></button></td>
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