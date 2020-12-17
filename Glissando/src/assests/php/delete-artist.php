<?php
    include 'connect.php';

    $artistID=$_POST['artistID'];
  
    $sql = "DELETE FROM artist WHERE artist_id=$artistID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Artist deleted sucessfully";  
      header("location: ../html/view-artist.php?status=".$status);
    }
    else {
      $status = "Failed to delete artist";
      header("location: ../html/view-artist.php?status=".$status);
    }
    
    mysqli_close($con);
?>