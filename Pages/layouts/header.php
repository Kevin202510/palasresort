<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php"><img src="image/pic5.png" alt=""><img src="image/pals.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <?php if(isset($_SESSION['PERMISSION_ID'])){
                        if($_SESSION['PERMISSION_ID']!=2){
                       ?>
                        <li class="nav-item active"><a class="nav-link" href="Pages/admin/index.php">Admin</a></li>
                        <?php }}?>
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="facilities.php">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item submenu dropdown">
                    <?php 
                    if(isset($_SESSION['PERMISSION_ID'])){?>
                        <a href="#" class="nav-link dropdown-toggle" style="margin-right:30px" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['FULLNAME']; ?></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="myreserves.php">My Reservation</a></li>
                            <li class="nav-item">
                                <form method="post">
                                    <input type="submit" name="logoutnako" class="btn btn-primary btn-sm" style="width:100%" class="nav-link" value="Logout">
                                </form>
                            </li>
                        </ul>
                    <?php }else{ ?>
                        <a href="#" class="nav-link dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        </ul>
                    </li> 
                    <?php }?>
                    <!-- <li class="nav-item"><a class="nav-link" href="elements.html">Elemests</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>  <li class="nav-item"><a class="nav-link" href="login.php">login</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="register.php">Profile</a></li> -->
                </ul>
            </div> 
        </nav>
    </div>
</header>