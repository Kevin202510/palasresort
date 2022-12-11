
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Reservation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="myreservationsModal/myreservationsModalFunctions.php">
      <input type="hidden" name="id" id="id">
      <input type="hidden" class="form-control"  id="service_ids" name="service_id">
      <input type="hidden" class="form-control"  id="facility_ids" name="facility_id">
      <input type="hidden" class="form-control"  id="customer_ids" name="customer_id">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Date</label>
                <input type="date" class="form-control" id="dates" name="date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Time</label>
                <input type="time" class="form-control" id="times" name="time">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Adult</label>
                <input type="number" class="form-control" id="person_adult_quantitys" name="person_adult_quantity">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Kids</label>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="myreservationsModal/myreservationsModalFunctions.php">
            <input type="hidden" name="id" id="ids">
            <input type="hidden" name="facility_id" id="facility_idz">
            <p>ARE YOU SURE YOU WANT TO CANCEL YOUR RESERVATION?</p>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-mul" name="delete">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

