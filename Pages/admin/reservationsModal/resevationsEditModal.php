<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform">
            <input type="hidden" name="id" id="id">
            
            <div class="form-group">
             <label class="form-label">Service:</label>
              <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="service_id" name="service_id" required>
              <?php
                  $newAPIFunctions->select("services","*");
                  $serviceLists = $newAPIFunctions->sql;
                  while ($data = mysqli_fetch_assoc($serviceLists)){
                      ?>
              <option class="dropdown-item" value = "<?php echo $data['service_id']; ?>" ><?php echo $data['service_name']; ?></option>
              <?php } ?>
            </select>
            </div>

            
            <div class="form-group">
                <label for="exampleInputEmail1">Facilities</label>
                <!-- <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="facility_id" name="facility_id" required> -->
                    <?php
                        $newAPIFunctions->select("facilities","*");
                        $facilitiesLists = $newAPIFunctions->sql;
                        while ($data = mysqli_fetch_assoc($facilitiesLists)){
                         ?>
                         <input type="checkbox" id="facility_id" name='facility_id' value='[<?php echo $data['id']; ?>]'>  <?php echo $data['name']; ?>                     
                    <?php } ?>
               </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Customer</label>
                <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="customer_id" name="customer_id" required>
              <?php
                  $newAPIFunctions->select("users","*","permission_id=2");
                  $userLists = $newAPIFunctions->sql;
                     while ($data = mysqli_fetch_assoc($userLists)){
                      ?>
              <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></option>
              <?php } ?>
            </select>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Time</label>
                <input type="time" class="form-control" id="time" name="time">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Adult</label>
                <input type="number" class="form-control" id="person_adult_quantity" name="person_adult_quantity">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Kids</label>
                <input type="number" class="form-control" id="person_kids_quantity" name="person_kids_quantity">
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeform">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-mul" name="addNew">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="usersModal/usersModalFunctions.php">
            <input type="hidden" name="id" id="ids">
            <p>ARE YOU SURE YOU WANT TO DELETE THIS?</p>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-mul" name="delete">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
