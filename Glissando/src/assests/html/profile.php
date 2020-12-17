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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="../css/profile.css">
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
            <div class="col-md-10">
                <div class="container1">
                    <table class="table">
                            <thread>
                                <tr style="text-align:center;">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                </tr>
                            </thread>
                            <?php
                                include '../php/connect.php';

                                if($is_admin)
                                    $sql = "select * from users";
                                else
                                    $sql = "select * from users where u_id=$userID";

                                $res = $con->query($sql);

                                if($res->num_rows > 0)
                                    while($row = $res->fetch_assoc()):?>
                                    <tr>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['last_name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td></td>
                                    </tr>        
                            <?php endwhile; ?>           
                    </table>
                </div>   
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>