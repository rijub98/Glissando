<?php
    $albumID = $_GET['albumID'];

    if(empty($albumID)){
        header("location:index.html");
    }

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
        
        <title>Album | Glissando</title>
    </head>
    <body>
    <div class="col">
        <h3>Delete Album</h3>
        <div class="row">
            <div class="col-md-5">
                <!----------------------------------------------FORM STARTS------------------------------------------------>
                <?php
                    include '../php/connect.php';

                    $sql = "select * from albums where album_id=$albumID";
                    $res = mysqli_query($con,$sql);
                    
                    while($row = mysqli_fetch_array($res)){ 
                        $albumName=$row['album_name'];
                    }

                    mysqli_close($con);
                ?>

                <form action="../php/delete-album.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="albumID" id="albumID" value="<?php echo $albumID;?>" class="form-control" />
                        <p> Are you sure you want to delete <?php echo $albumName;?>? </p>
                        <button type="submit" name="delete" class="btn float-right" 
                                style=" margin-left: 25%;
                                        border-radius: 5px;
                                        padding: 10px 10px 10px 10px;
                                        color: white; 
                                        background-color: crimson;
                                        border: none;
                                        outline: none;">
                                                                            Confirm Delete
                        </button>
                    </form>
                    <!----------------------------------------------FORM ENDS------------------------------------------------>
                </div>
            </div>
        </div>
    </body>
</html>