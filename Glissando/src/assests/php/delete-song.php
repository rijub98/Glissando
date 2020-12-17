<?php
    include 'connect.php';

    $songID=$_POST['songID'];
  
    $sql = "DELETE FROM songs WHERE song_id=$songID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Song deleted sucessfully";  
    }
    else {
      $status = "Failed to delete song";
    }
    
    header("location: ../html/view-songs.php?status=".$status);
    mysqli_close($con);
?>