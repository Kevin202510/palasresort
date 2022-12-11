

<!-- PRINT MODAL -->
<div class="modal fade" id="resiboModalDelete" tabindex="-1" aria-labelledby="resiboModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="resiboModalLabel">Receipt</h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button> -->
      </div>
      <div class="modal-body">
      <form method="POST" id="salesform">
        <div class="row">
           <input type="hidden" name="idssss" id="idsss">
           <input type="hidden" name="reservation_idssss" id="reservation_idsss">
           <input type="hidden" name="time_inssss" id="time_insss">
           <input type="text" id="fullname" disabled>
           Balance:<input type="number" name="balancessss" id="balancesss" readonly>
           Payment:<input type="number" name="paymentssss" id="paymentsss" readonly>
           Change:<input type="number" name="change" id="change" readonly>
           Receipt:<input type="number" id="recip" disabled >
          </div> 
            <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-secondary" id="prints" name="print">Print</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- PRINT MODAL -->

<!-- TIME OUT -->
<div class="modal fade" id="outModal" tabindex="-1" aria-labelledby="outModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outModalLabel">Time Out</h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button> -->
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="entranceModal/entranceModalFunctions.php">
        <div class="row">
           <input type="text" name="idz" id="idzz">
           <input type="text" name="reservation_idz" id="reservation_idzz">
           <input type="text" name="time_inz" id="time_inzz">
           <input type="text" name="time_out" id="time_outzz">
           <input type="text" name="balancez" id="balancezz">
          </div> 
            <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary" id="btns" name="addNew">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- TIME OUT -->  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Entrance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="entranceModal/entranceModalFunctions.php">
            <input type="hidden" name="reservation_id" id="reservation_ids">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Name</label>
                <input type="text" class="form-control" id="customername" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Facility Name</label>
                <input type="text" class="form-control" id="facilityname" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Total Balance</label>
                <input type="text" class="form-control" id="total_balance" name="total_balance">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Payment Status</label>
                <input type="text" class="form-control" id="payment_status" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Reservation Date and Time</label>
                <input type="text" class="form-control" id="reservation_date_time" disabled>
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



<!-- PAYMENT MODAL -->
<div class="modal fade" id="exampleModalPay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform">
      <input type="hidden" id="idss" name="id">
        <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Fullname</label>
                <input type="text" class="form-control"  id="customer_names" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Reservation ID</label>
                <input type="text" class="form-control"  id="reservation_idss" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Time in</label>
                <input type="text" class="form-control" id="time_inss" disabled>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label" >Balance</label>
                <input type="text" class="form-control"  id="balancess" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Payment</label>
                <input type="number" class="form-control" id="payments" name="payment" equired >
                </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeforms">Close</button>
            <button type="submit" class="btn btn-primary" id="mulss" name="addNew">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- PAYMENT MODAL -->


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

