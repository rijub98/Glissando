<?php
    include 'connect.php';

    $albumID=$_POST['albumID'];
    

    $sql = "UPDATE albums SET ";

    $comma = false;
    
    if(isset($_POST['album_name'])){
      $album_name=$_POST['album_name'];
      $sql .= "album_name='$album_name'";

      $comma = true;
    }

    if(isset($_POST['album_release_date'])){

      if($comma){
        $sql .= ",";
      }

      $album_release_date=$_POST['album_release_date'];
      $sql .= "album_release_date='$album_release_date'";

      $comma = true;
    }

    if(isset($_POST['album_genre'])){

      if($comma){
        $sql .= ",";
      }

      $album_genre=$_POST['album_genre'];
      $sql .= "album_genre='$album_genre'";

      $comma = true;
    }

    if(isset($_POST['artist_id'])){

      if($comma){
        $sql .= ",";
      }

      $artist_id=$_POST['artist_id'];
      $sql .= "artist_id='$artist_id'";

      $comma = true;
    }

    $file_name = "";
    echo("<pre>");
    print_r($_POST);

    if(isset($_FILES['album_cover_image']['error'])){
        if($_FILES['album_cover_image']['error'] == 0){
            $target_dir = "../uploads/image/albums/";
            $file_name = time()."_".rand(1,10000000)."_".$_FILES["album_cover_image"]["name"];
            
            $file_name = str_replace(" ", "_", $file_name);

            $source = $_FILES["album_cover_image"]["tmp_name"];
            $destination = $target_dir.$file_name;

            if(move_uploaded_file($source, $destination)){
            }
            else {
                $file_name = "";
            }

            if($comma){
              $sql .= ",";
            }

            $sql .= "album_cover_image='$file_name'";
        }
    }

    $sql .= " WHERE album_id=$albumID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Album details updated sucessfully";  
    }
    else {
      $status = "Failed to update album details";
    }
    
    header("location: ../html/view-albums.php?status=".$status);
    mysqli_close($con);
?>