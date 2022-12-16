<?php include('page/head.php'); ?>

<?php include('page/sidebar.php'); ?>

<main class="main-content position-relative border-radius-lg ">
      <?php include('page/navigationbar.php'); ?>
      
      <!-- Content side -->

        <div class="container-fluid py-4">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="color:#987554;font-family : bradley hand, cursive">Entrance Management</h6>
              <div class="row" style="float:right;">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="reservation_id" placeholder="Reservation Customer Id" >
                </div>
              </div>
              </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
              <thead style="background-color:#FFE900">
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time In</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time Out</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Balance</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  include('../../Functions/InnovatechAPIFunctions.php');
                  $newAPIFunctions = new InnovatechAPIFunctions();
                  $newAPIFunctions->select45();
                  $serviceLists = $newAPIFunctions->sql;
                  $index = 1;
                
                  while ($data = mysqli_fetch_assoc($serviceLists)){
               
                    $r = $data["reservation_status"];
                    if($r == 1){
                    $reserv_stat="Paid";
                    }
                    else{
                      $reserv_stat="Not Paid";
                    }

                    if($data["res_id"] == $data["reservation_id"]){       
              ?>
              <tr>
                <td class="text-wrap"><?php echo $index?></td>
                <td class="text-wrap"><?php echo $data["reservation_id"];?></td>
                <td class="text-wrap"><?php echo $data["time_in"]; ?></td>
                <td class="text-wrap"><?php echo $data["time_out"]; ?></td>
                <td class="text-wrap"><?php echo $data["total_balance"]; ?></td>
                <td class="text-wrap"><?php echo $reserv_stat; ?></td>
                <?php if($data["time_out"] == NULL){ ?>
                <td><?php if($r == 0){ ?><button style="margin-right:5px;" type="button" class="btn btn-success" id="pays" data-id="<?php echo $data['id']; ?>">Payment <?php }else{?>
                          </button><h7 style="color:green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                          <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                        </svg>Paid</h7><br><?php }?>
                              <?php if($r == 1){ ?><button style="margin-right:5px;" type="button" class="btn btn-info" id="extend" data-id="<?php echo $data['id']; ?>">Extend</button>
                              <button style="margin-right:5px;" type="button" class="btn btn-warning" id="out" data-id="<?php echo $data['id']; ?>">Out</button>
                                <?php }?></td>
                 <?php }else{ ?>
                  <td><h7 style="color:green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                  <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                </svg>Out</h7></td>
                  <?php }?>
              </tr>
              <?php $index++; }} ?>
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