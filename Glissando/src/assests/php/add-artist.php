<?php
    include 'connect.php';
    
    if(isset($_POST['artist_name'])){
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
            }
        }

        $artist_name = $_POST['artist_name'];
        $artist_bio = $_POST['artist_bio'];

        $sql = "INSERT INTO artist(artist_name, artist_bio, artist_photo)  
                VALUES('{$artist_name}', '{$artist_bio}', '{$file_name}')";
        
        if($con->query($sql)){
            $status = "Artist added Sucessfully";
		    header("location: ../html/view-artist.php?status=".$status);
        }
        else {
            $status = "Failed to add artist to database";
		    header("location: ../html/view-artist.php?status=".$status);
        }
        die();
    }
?> 