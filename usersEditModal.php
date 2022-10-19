<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="usersModal/usersModalFunctions.php">
            <input type="hidden" name="id" id="id">
             <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Permission</label>
                <select class="form-control" id="permission_id" name="permission_id">
                    <?php 
                        $newAPIFunctions->select("roles","*");
                        $rolesLists = $newAPIFunctions->sql;
                        $index1 = 1;

                        while ($datas = mysqli_fetch_assoc($rolesLists)){
                    ?>
                    <option value="<?php echo $index1; ?>"><?php echo $datas["roleName"]; ?></option>
                    <?php $index1++;} ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-save" name="addnewuser">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete User</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="usersModal/usersModalFunctions.php">
            <input type="hidden" name="id" id="ids">
             <p>Are you sure you want to delete this User?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" data>Close</button>
                <button type="submit" class="btn btn-primary" id="btn-save" name="deleteUser">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>  