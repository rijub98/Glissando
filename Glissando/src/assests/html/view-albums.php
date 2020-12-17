<?php
    session_start();    // Start the session

    $userID = $_SESSION['id'];  //It fetches the value of the u_id from the database and stored in  $userID variable

    //If u_id is empty then it will redirect to index page
    if(empty($userID)){
        header("location:index.php");
    }

    $is_admin = $_SESSION['alogin'];    //It fetches the value of the admin from the database and stored in  $is_admin variable

    // It checks the status and displays it
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
        <link rel="stylesheet" href="../css/view.css">
        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        
        <title>Albums | Glissando</title>
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
                                // The following content will display on if it is admin
                                if($is_admin){
                                    ?>
                                    <div  class="nav__link collapse active">
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
                                // otherwise it will the following content shown below
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

                            <div href="#" class="nav__link collapse">
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
                    <a href="#" class="nav__link">
                        <i class='bx bx-log-out-circle nav__icon'></i>
                        <span class="nav__name">Log Out</span>
                    </a>
                </nav>
            </div>
            <!-----------------------------------SIDE MENU ENDS------------------------------------------------>
            <div class="container">
                <h2>Albums</h2>
                <?php
                include '../php/connect.php';

                // Selects the artists details in ascending order
                $sql = "SELECT * FROM albums,artist WHERE albums.artist_id=artist.artist_id ORDER BY album_name ASC";
                $albumImageRelativeDir = "../uploads/image/albums/";    // The path of the image is stored in this variable                        
                $res = mysqli_query($con,$sql);                         // It executes the given query on the database
                $dyn_table = "";                                        // Initialize as empty string

                 // The condition runs as long as it fetches every row as an array
                while($row = mysqli_fetch_array($res))
                {
                    if (empty($row['album_name'])) {
                        continue;
                    }
                    else{
                        
                        $albumID = $row['album_id'];

                        // It is a string that creates the table in dynamic manner in html
                        // .= is an concatenation assignment
                        $dyn_table .= "<tr>";
                        $dyn_table .= '<td align="center"><pre>';
                        $dyn_table .= '<img src="' . $albumImageRelativeDir . $row['album_cover_image'] . '" height="150" width="150">';
                        $dyn_table .= PHP_EOL;
                        $dyn_table .= "{$row['album_name']}";
                        $dyn_table .= ' (';
                        $dyn_table .= "{$row['artist_name']}";
                        $dyn_table .= ')';
                        $dyn_table .= PHP_EOL;

                        $date = date_create($row['album_release_date']);
                        $dyn_table .= '(';
                        $dyn_table .= date_format($date,"d-M-Y");
                        $dyn_table .= ')';
                        $dyn_table .= '</pre>';
                        if($is_admin){
                            $dyn_table .= '<form>';
                            $dyn_table .= '<input type="button" class="button editbutton" value="Edit" onclick="editAlbum(' . $albumID .')">';
                            $dyn_table .= '</form>';
                            $dyn_table .= '<form>';
                            $dyn_table .= '<input type="button" class="button deletebutton" value="Delete" onclick="deleteAlbum(' . $albumID .')">';
                            $dyn_table .= '</form>';
                        }
                        $dyn_table .= '</td></tr>';
                    }
                }
            ?>
            <style>
                th, td {
                  padding: 15px;
                }
            </style>
            <table>
                <?php echo $dyn_table;   // Displays the table  ?>
            </table>
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/edit-delete.js"></script>
    </body>
</html>