<?php
    include 'connect.php';
    
    if(isset($_POST['album_name'])){
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
            }
        }

        $album_name = $_POST['album_name'];
        $album_release_date = $_POST['album_release_date'];
        $album_genre = $_POST['album_genre'];
        $artist_id = $_POST['artist_id'];
        
        $sql = "INSERT INTO albums(album_name, album_release_date, album_genre, album_cover_image, artist_id)  
                VALUES('{$album_name}', '{$album_release_date}', '{$album_genre}', '{$file_name}', '{$artist_id}')";
        
        if($con->query($sql)){
            $status = "Album added Sucessfully";
		    header("location: ../html/view-albums.php?status=".$status);
        }
        else {
            $status = "Failed to add album to database";
		    header("location: ../html/view-albums.php?status=".$status);
        }
        die();
    }
?> 