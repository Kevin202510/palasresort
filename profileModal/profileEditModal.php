<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="profileModal/profileModalFunctions.php" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <input type="hidden" id="permissions_id" name="permission_id">
            <input type="hidden" class="form-control" id="email" name="email">
            Select Photo
            <input type="file" name="fileToUpload" id="fileToUpload">
            
            <!-- <div id="tagomoto">
                  <label class="form-label">Facility Image</label>
                        <img id="proImages" src="..." width="470" height="250">
                      </div>
                      <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file"  id="newimg" >
                </div>
            </div> -->
            <div class="row"> 
              <div class="col-md-14">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname"required>
                </div>
              </div>
            </div>
            

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Middle Name</label>
                <input type="text" class="form-control" id="mname" name="mname"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname"required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Address</label>
                <input type="text" class="form-control" id="address" name="address"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Contact Number</label>
                <input type="number" class="form-control" id="contact_num" name="contact_num"required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label"style="color:#987554;font-family : bradley hand, cursive">Username</label>
                <input type="text" class="form-control" id="username" name="username"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1"style="color:#987554;font-family : bradley hand, cursive">Password</label>
                <input type="text" class="form-control" id="password" name="password">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel"style="color:#987554;font-family : bradley hand, cursive">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="usersModal/usersModalFunctions.php">
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

