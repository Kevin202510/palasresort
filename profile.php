<?php   session_start();?>
    <?php include('Pages/layouts/head.php');?>

        <!--================Header Area =================-->
        <?php include('Pages/layouts/header.php');?>
        <!--================Header Area =================-->
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<head>
<script src="jquery-3.6.1.min.js"></script>
</head>  
        <section style="background-image:url('image/pic1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
            
            <div class="container py-5">
            <?php 
                include('./Functions/InnovatechAPIFunctions.php');
                $newAPIFunctions = new InnovatechAPIFunctions();

             if(isset($_SESSION['ID'])){
             $id=$_SESSION['ID'];
             $sq="id='$id'";
             $newAPIFunctions->select("users","*",$sq);
             $userLists = $newAPIFunctions->sql;
                 while ($data = mysqli_fetch_assoc($userLists)){
                ?>
    
 <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="margin-top: 100px">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="image/fac.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3" style="color:black"><?php echo $data["fname"]  ." ". $data["lname"]; ?></h5>
            <a href="email-verification.php?email=<?php echo $data['email'];?>" class="btn btn-primary btn-sm " tabindex="-1" role="button" aria-disabled="true">Verify My Account</a>
            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit User
              </button>
          </div>
        </div>
        </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Fullname :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="color:black"><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Email Address :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black">Phone :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['contact_num']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Address :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['address']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Username :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['username']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="color:black" >Password :</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['password']; ?></p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php }}?>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" id="serviceform" action="usersModal/usersModalFunctions.php">
            <input type="hidden" name="id" id="id">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Permission</label>
                <select class="form-control" id="permissions_id" name="permission_id">
                    <?php 
                        $newAPIFunctions->select("permissions","*","permissions_id!=1");
                        $rolesLists = $newAPIFunctions->sql;

                        while ($datas = mysqli_fetch_assoc($rolesLists)){
                    ?>
                    <option value="<?php echo $datas["permissions_id"]; ?>"><?php echo $datas["permission_name"]; ?></option>
                    <?php } ?>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Firstname</label>
                <input type="text" class="form-control" id="fname" name="fname"required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Middlename</label>
                <input type="text" class="form-control" id="mname" name="mname"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Lastname</label>
                <input type="text" class="form-control" id="lname" name="lname"required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Contact Number</label>
                <input type="number" class="form-control" id="contact_num" name="contact_num"required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" required>
                </div>
              </div>
            </div>
            <div class="form-group" id="pass">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="password" name="password">
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

<script>
      $(document).ready(function(){

      $("body").on('click','#edit',function(e){

      var idss = $(e.currentTarget).data('id');
      $.post("usersModal/updateuser.php",{id: idss},function(data,status){
          var datas = JSON.parse(data);
          $("#id").val(datas.id);
          $("#fname").val(datas.fname);
          $("#mname").val(datas.mname);
          $("#lname").val(datas.lname);
          $("#address").val(datas.address);
          $("#contact_num").val(datas.contact_num);
          $("#username").val(datas.username);
          $("#email").val(datas.email);
          // alert(datas.permission_id);
          $('#permissions_id option[value='+datas.permission_id+']').attr("selected", "selected");
      })

      // $("#myModalLabel").html("Update User");
      $("#btn-mul").attr('name',"updateUsers");
      $("#btn-mul").html("Update User");
      $("#pass").hide();
      $("#exampleModal").modal("show");
      });

      $("body").on('click','#delete',function(e){

      var idss = $(e.currentTarget).data('id');
      $("#ids").val(idss);
      $("#exampleModalDelete").modal("show");
      });

      $("#closeform").click(function(){
      $("#serviceform")[0].reset();


      $("#exampleModal").modal("hide");
      });

      })

</script>
    
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include('Pages/layouts/scripts.php');?>