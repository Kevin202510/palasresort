<!-- header -->
<?php include('../adminLayouts/head.php') ?>

     <!-- HEADER -->
     <?php include('../adminLayouts/header.php') ?>


     <!-- MENU -->
     <?php include('../adminLayouts/menu.php') ?>


     <!-- ABOUT -->
     <section>
          <div class="container">
               <div class="row">
                    <div class="container-fluid" style="margin-top:70px;">
                    <div class="card" style="background-color:#f1dcdc; border: 3px solid #f3eded; border-radius:10px;padding: 10px;">
                         <div class="card-body">
                              <div class="row" style="height:50px;">
                              <div class="col-md-8"><h5 class="card-title">List of Users</h5></div>
                              <div class="col-md-4"><button type="button" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">Add</button></div>
                              </div>
                              <table class="table table-hover">
                                   <thead>
                                        <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Fullname</th>
                                             <th scope="col">Address</th>
                                             <th scope="col">Contact</th>
                                             <th scope="col">Email</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                             include('../Functions/InnovatechAPIFunctions.php');
                                             $newAPIFunctions = new InnovatechAPIFunctions();
                                             $newAPIFunctions->select("userstables","*","permission_id!=4");
                                             $userLists = $newAPIFunctions->sql;
                                        
                                             $index = 1;
                                             while ($data = mysqli_fetch_assoc($userLists)){
                                        ?>
                                        <tr>
                                             <th><?php echo $index; ?></th>
                                             <th><?php echo $data["firstname"] ." ". $data["lastname"]; ?></th>
                                             <th><?php echo $data["address"]; ?></th>
                                             <th><?php echo $data["contact"]; ?></th>
                                             <th><?php echo $data["email"]; ?></th>
                                             <th><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['id']; ?>" id="delete">Delete</button></th>
                                        </tr>
                                        <?php 
                                             $index++;}
                                        ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
                    </div>
                    <?php include("usersModal/usersEditModal.php"); ?>
               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <?php include('../adminLayouts/footer.php') ?>

     <script src="usersModal/usersFunctions.js"></script>