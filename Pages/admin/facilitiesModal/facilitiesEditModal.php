<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Facilities</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST"  id="facilitiesform" action="facilitiesModal/facilitiesModalFunctions.php">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
            <label class="form-label">Facility img</label>
            <input type="file" name="image" id="images"required>
              <div id="tagomoto">
                  <label class="form-label">Facility Image</label>
                        <img id="facilitiesImages" src="..." width="470" height="250">
                      </div>
                      <div class="mb-3">
                    <label class="form-label">Change Facility img</label>
                    <input type="file"  id="newimg" >
                </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Facility Name</label>
                <input type="text" class="form-control" id="names" name="name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Facility Descriptionme</label>
                <input type="text" class="form-control" id="descriptions" name="description" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Day Rate</label>
                <input type="number" class="form-control" id="day_rates" name="day_rate" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Night Rate</label>
                <input type="number" class="form-control" id="night_rates" name="night_rate" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Over Night Rate</label>
                <input type="number" class="form-control" id="overnigth_rates" name="overnigth_rate" required>
                </div>
              </div>
            </div>

            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Facility Name</label>
                <input type="text" class="form-control" id="names" name="name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Facility Description</label>
                <input type="text" class="form-control" id="descriptions" name="description" required>
            </div> -->

            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Day Rate</label>
                <input type="number" class="form-control" id="day_rates" name="day_rate" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Night Rate</label>
                <input type="number" class="form-control" id="night_rates" name="night_rate" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Over Night Rate</label>
                <input type="number" class="form-control" id="overnigth_rates" name="overnigth_rate" required>
            </div> -->
            <div class="form-group">
                <label for="exampleInputEmail1">Facility Type</label>
                <select class="dropdown-item" aria-labelledby="btnGroupDrop1" id="facility_types" name="facility_type" required>
                  <option class="dropdown-item" value="rooms">PRIVATE ROOMS</option>
                  <option class="dropdown-item" value="cottage">COTTAGE </option>
                  <option class="dropdown-item" value="pool">POOL</option>
                  <option class="dropdown-item" value="adrenaline_game">ADRENALINE GAME</option>
                  <option class="dropdown-item" value="sports_center">SPORTS CENTER</option>
                  <option class="dropdown-item" value="function_pavillion">FUNCTION PAVILLION</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="dropdown-item" aria-labelledby="btnGroupDrop1" id="statuss" name="status" required>
                  <option class="dropdown-item" value="available">Available</option>
                  <option class="dropdown-item" value="nonavailable">Non-Available</option>
                </select>
            </div> -->
            
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
      <form method="POST" action="facilitiesModal/facilitiesModalFunctions.php">
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

