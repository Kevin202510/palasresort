

    <?php include('Pages/layouts/head.php');?>

<!--================Header Area =================-->
<?php include('Pages/layouts/header.php');?>
<!--================Header Area =================-->
    
    <section class="about_history_area section_gap">
        <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Users</h3>
            <div class="col-md-2"><button type="button" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">Add</button></div>
            <div class="progress-table-wrap" >
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rolename</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php
                        include('Functions/InnovatechAPIFunctions.php');
                        $newAPIFunctions = new InnovatechAPIFunctions();
                        $newAPIFunctions->select("users","*","permission_id!=3");
                        $userLists = $newAPIFunctions->sql;
                
                        $index = 1;
                        while ($data = mysqli_fetch_assoc($userLists)){
                    ?>
                        <tr>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $data["permission_id"]; ?></td>
                            <td><?php echo $data["fname"] ." ". $data["mname"] ." ". $data["lname"]; ?></td>
                            <td><?php echo $data["address"]; ?></td>
                            <td><?php echo $data["contact_num"]; ?></td>
                            <td><?php echo $data["username"]; ?></td>
                            <td><?php echo $data["email"]; ?></td>
                            <td><button style="margin-right:5px;" type="button" class="btn btn-primary" id="edit" data-id="<?php echo $data['id']; ?>">Edit</button><button type="button" class="btn btn-danger" data-id="<?php echo $data['id']; ?>" id="delete">Delete</button></td>
                        </tr>

                        <?php $index++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>

<?php include('usersEditModal.php');?>
    
<!--================ start footer Area  =================-->	
 <!-- include('Pages/layouts/footer.php');?> -->
<!--================ End footer Area  =================-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('Pages/layouts/scripts.php');?>

<script src="usersFunctions.js"></script>