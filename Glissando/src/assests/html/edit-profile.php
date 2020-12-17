<?php
    session_start();

    $userID = $_SESSION['id'];
    if(empty($userID)){
        header("location:index.html");
    }

    $is_admin = $_SESSION['alogin'];

    if (isset($_GET['status'])) {
        $sta = $_GET['status'];
        echo "<script type='text/javascript'>alert('$sta');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald:wght@500&display=swap" rel="stylesheet">
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="../css/add.css">
        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        
        <title>Profile | Glissando</title>
    </head>
    <body>
        <div class="container">
            <!-----------------------------------SIDE MENU STARTS---------------------------------------->
            <div class="l-navbar" id="navbar">
                <nav class="nav">
                    <div>
                        <div class="nav__brand">
                            <i class='bx bx-menu nav__toggle' id="nav-toggle"></i>
                            
                            <a href="index.html" class="nav__logo">Glissando</a>
                        </div>
                        <div class="nav__list">
                            <a href="home.php" class="nav__link">
                                <i class='bx bx-home nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                            <?php
                                if($is_admin){
                                    ?>
                                    <div  class="nav__link collapse">
                                        <i class='bx bx-collection nav__icon'></i>
                                        <span class="nav__name">Collection</span>
                                        <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                                        <ul class="collapse__menu">
                                            <a href="view-artist.php" class="collapse__sublink">Artist</a>
                                            <a href="view-albums.php" class="collapse__sublink">Albums</a>
                                            <a href="view-songs.php" class="collapse__sublink">Songs</a>
                                        </ul>
                                    </div>
                                    <div  class="nav__link collapse nav__link">
                                        <i class='bx bx-upload nav__icon'></i>
                                        <span class="nav__name">Upload</span>
                                        <ion-icon name="chevron-down-outline" class="collapse__link "></ion-icon>

                                        <ul class="collapse__menu">
                                            <a href="add-artist.php" class="collapse__sublink">Artist</a>
                                            <a href="add-albums.php" class="collapse__sublink">Albums</a>
                                            <a href="add-songs.php" class="collapse__sublink">Songs</a>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>
                                    <div  class="nav__link collapse">
                                        <i class='bx bx-collection nav__icon'></i>
                                        <span class="nav__name">Collection</span>
                                        <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                                        <ul class="collapse__menu">
                                            <a href="view-artist.php" class="collapse__sublink">Artist</a>
                                            <a href="view-albums.php" class="collapse__sublink">Albums</a>
                                            <a href="view-songs.php" class="collapse__sublink">Songs</a>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            ?>
                            <div href="#" class="nav__link collapse active">
                                <i class='bx bx-user nav__icon' ></i>
                                <span class="nav__name">Profile</span>
                                <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                                <ul class="collapse__menu">
                                    <a href="profile.php" class="collapse__sublink">View</a>
                                    <a href="edit-profile.php" class="collapse__sublink">Edit</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="form.php" class="nav__link">
                        <i class='bx bx-log-out-circle nav__icon'></i>
                        <span class="nav__name">Log Out</span>
                    </a>
                </nav>
            </div>
            <!-----------------------------------SIDE MENU ENDS------------------------------------------------>
            <h2>Edit Profile</h2>
            <div class="grid-container">
                <?php
                    include '../php/connect.php';

                    $sql = "select * from users where u_id=$userID";
            
                    $res = mysqli_query($con,$sql);
                     
                    while($row = mysqli_fetch_array($res)){ 
                        $username=$row['username'];
                        $password=$row['password'];
                        $first_name=$row['first_name'];
                        $last_name=$row['last_name'];
                        $email=$row['email'];
                    }
                    mysqli_close($con);
                ?>
                <form action="../php/edit-profile.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="userID" id="userID" value="<?php echo $userID;?>" class="form-control" />
                    <div class="row">
                        <div class="col-30">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="username" id="username" value="<?php echo $username;?>" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="password" id="password" value="<?php echo $password;?>" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="email" id="email" value="<?php echo $email;?>" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="upload" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>