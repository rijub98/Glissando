<?php
    include 'connect.php';

    $songID=$_POST['songID'];
    

    $sql = "UPDATE songs SET ";

    $comma = false;
    
    if(isset($_POST['album_id'])){
      $album_id=$_POST['album_id'];
      $sql .= "album_id='$album_id'";

      $comma = true;
    }

    if(isset($_POST['song_name'])){

      if($comma){
        $sql .= ",";
      }

      $song_name=$_POST['song_name'];
      $sql .= "song_name='$song_name'";

      $comma = true;
    }

    $file_name = "";
    echo("<pre>");
    print_r($_POST);

    if(isset($_FILES['song_file']['error'])){
        if($_FILES['song_file']['error'] == 0){
            $target_dir = "../uploads/songs/";
            $song_file = time()."_".rand(1,10000000)."_".$_FILES["song_file"]["name"];
            
            $song_file = str_replace(" ", "_", $song_file);

            $source = $_FILES["song_file"]["tmp_name"];
            $destination = $target_dir.$song_file;

            if(move_uploaded_file($source, $destination)){
            }
            else {
                $song_file = "";
            }

            if($comma){
              $sql .= ",";
            }

            $sql .= "song_file='$song_file'";
        }
    }

    if(isset($_FILES['song_cover_image']['error'])){
        if($_FILES['song_cover_image']['error'] == 0){
            $target_dir = "../uploads/image/songs/";
            $song_cover_image = time()."_".rand(1,10000000)."_".$_FILES["song_cover_image"]["name"];
            
            $song_cover_image = str_replace(" ", "_", $song_cover_image);

            $source = $_FILES["song_cover_image"]["tmp_name"];
            $destination = $target_dir.$song_cover_image;

            if(move_uploaded_file($source, $destination)){
            }
            else {
                $song_cover_image = "";
            }

            if($comma){
              $sql .= ",";
            }

            $sql .= "song_cover_image='$song_cover_image'";
        }
    }

    $sql .= " WHERE song_id=$songID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Song details updated sucessfully";  
    }
    else {
      $status = "Failed to update song details";
    }
    
    header("location: ../html/view-songs.php?status=".$status);
    mysqli_close($con);
?>