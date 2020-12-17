<?php
    include 'connect.php';

    $albumID=$_POST['albumID'];
  
    $sql = "DELETE FROM albums WHERE album_id=$albumID";

    mysqli_query($con,$sql);
        
    if(mysqli_affected_rows($con) > 0){
      $status = "Album deleted sucessfully";  
    }
    else {
      $status = "Failed to delete album";
    }
    
    header("location: ../html/view-albums.php?status=".$status);
    mysqli_close($con);
?>