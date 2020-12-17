<?php
    include 'connect.php';

    $artistID=$_POST['artistID'];
    

    $sql = "UPDATE artist SET ";

    $comma = false;
    
    if(isset($_POST['artist_name'])){
      $artist_name=$_POST['artist_name'];
      $sql .= "artist_name='$artist_name'";

      $comma = true;
    }

    if(isset($_POST['artist_bio'])){

      if($comma){
        $sql .= ",";
      }

      $artist_bio=$_POST['artist_bio'];
      $sql .= "artist_bio='$artist_bio'";

      $comma = true;
    }

    $file_name = "";
    echo("<pre>");
    print_r($_POST);

    if(isset($_FILES['artist_photo']['error'])){
        if($_FILES['artist_photo']['error'] == 0){
            $target_dir = "../uploads/image/artist/";
            $file_name = time()."_".rand(1,10000000)."_".$_FILES["artist_photo"]["name"];
            
            $file_name = str_replace(" ", "_", $file_name);

            $source = $_FILES["artist_photo"]["tmp_name"];
            $destination = $target_dir.$file_name;

            if(move_uploaded_file($source, $destination)){
            }
            else {
                $file_name = "";
            }

            if($comma){
              $sql .= ",";
            }

            $sql .= "artist_photo='$file_name'";
        }
    }

    $sql .= " WHERE artist_id=$artistID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Artist details updated sucessfully";  
    }
    else {
      $status = "Failed to update artist details";
    }
    
    header("location: ../html/view-artist.php?status=".$status);
    mysqli_close($con);
?>