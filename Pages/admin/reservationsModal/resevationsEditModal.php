<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"style="color:#987554;font-family : bradley hand, cursive">Add Reservation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="reservationsModal/reservationsModalFunctions.php">
      <input type="hidden" name="id" id="id">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Service</label>
                <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="service_ids" name="service_id" required>
                  <?php
                      $newAPIFunctions->select("services","*");
                      $serviceLists = $newAPIFunctions->sql;
                      while ($data = mysqli_fetch_assoc($serviceLists)){
                          ?>
                  <option class="dropdown-item" value = "<?php echo $data['service_id']; ?>" ><?php echo $data['service_name']; ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Facilities</label>
                <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="facility_ids" name="facility_id" required>
                  <?php
                      $newAPIFunctions->select("facilities","*");
                      $serviceLists = $newAPIFunctions->sql;
                      while ($data = mysqli_fetch_assoc($serviceLists)){
                          ?>
                  <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"style="color:#987554;font-family : bradley hand, cursive">Customer</label>
                <select class="dropdown-item"  aria-labelledby="btnGroupDrop1" id="customer_ids" name="customer_id" required>
              <?php
                  $newAPIFunctions->select("users","*","permission_id=2");
                  $userLists = $newAPIFunctions->sql;
                     while ($data = mysqli_fetch_assoc($userLists)){
                      ?>
              <option class="dropdown-item" value = "<?php echo $data['id']; ?>" ><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></option>
              <?php } ?>
            </select>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Date</label>
                <input type="date" class="form-control" id="dates" name="date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Time</label>
                <input type="time" class="form-control" id="times" name="time">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Adult</label>
                <input type="number" class="form-control" id="person_adult_quantitys" name="person_adult_quantity">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Kids</label>
                <input type="number" class="form-control" id="person_kids_quantitys" name="person_kids_quantity">
                </div>
              </div>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="reservationsModal/reservationsModalFunctions.php">
            <input type="hidden" name="id" id="ids">
            <p style="color:#987554;font-family : bradley hand, cursive">ARE YOU SURE YOU WANT TO DELETE THIS?</p>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-mul" name="delete">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

