<?php
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
        
        <title>Songs | Glissando</title>
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
                            <div  class="nav__link collapse nav__link active">
                                <i class='bx bx-upload nav__icon'></i>
                                <span class="nav__name">Upload</span>
                                <ion-icon name="chevron-down-outline" class="collapse__link "></ion-icon>

                                <ul class="collapse__menu">
                                    <a href="add-artist.php" class="collapse__sublink">Artist</a>
                                    <a href="add-albums.php" class="collapse__sublink">Albums</a>
                                    <a href="add-songs.php" class="collapse__sublink">Songs</a>
                                </ul>
                            </div>
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
                    <a href="form.php" class="nav__link">
                        <i class='bx bx-log-out-circle nav__icon'></i>
                        <span class="nav__name">Log Out</span>
                    </a>
                </nav>
            </div>
            <!-----------------------------------SIDE MENU ENDS------------------------------------------------>
            <h2>Add Songs</h2>
            <div class="grid-container">
                
                <form action="../php/add-songs.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-30">
                            <label for="song_name">Title</label>
                        </div>
                        <div class="col-70">
                            <input type="text" name="song_name" id="song_name" class="form-control" style="color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="song_album">Album | Artist</label>
                        </div>
                        <div class="col-70">
                            <select name="album_id" id="album_id" class="form-control" required>
    
                                <option value="">---Select Album | Artist---</option>

                                <?php
                                    include '../php/connect.php';
                                    $sql = "SELECT album_id,album_name,artist_name FROM albums,artist WHERE albums.artist_id=artist.artist_id ORDER BY album_name ASC";
                                    $res = mysqli_query($con,$sql);

                                    while($subjectData = mysqli_fetch_array($res)){ ?>

                                    <option value="<?php echo $subjectData['album_id'];?>">
                                        <?php echo $subjectData['album_name'] . ' | ' . $subjectData['artist_name'];?>
                                    </option>

                                <?php }?> 

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="song_file">Song Audio File</label>
                        </div>
                        <div class="col-70">
                            <input type="file" accept=".mp3" name="song_file" id="song_file" class="form-control" style="margin-top: 7%; margin-left: 20%; color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-30">
                            <label for="song_cover_image">Cover Photo</label>
                        </div>
                        <div class="col-70">
                            <input type="file" accept=".png, .jpg, .jpeg, .gif" name="song_cover_image" id="song_cover_image" class="form-control" style="margin-top: 7%; margin-left: 20%; color: black;" required>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="upload" value="Create Album">
                    </div>
                </form>
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>