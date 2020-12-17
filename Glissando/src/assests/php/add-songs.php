<?php
    include 'connect.php';
    
    if(isset($_POST['song_name'])){
       $file_name = "";
        echo("<pre>");
        print_r($_POST);

        if(isset($_FILES['song_file']['error'])){
            if($_FILES['song_file']['error'] == 0){
                $target_dir = "../uploads/songs/";
                $file_name = time()."_".rand(1,10000000)."_".$_FILES["song_file"]["name"];
                
                $file_name = str_replace(" ", "_", $file_name);

                $source = $_FILES["song_file"]["tmp_name"];
                $destination = $target_dir.$file_name;
 
                if(move_uploaded_file($source, $destination)){
                }
                else {
                    $file_name = "";
                }
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
            }
        }


        $song_name = $_POST['song_name'];
        $album_id = $_POST['album_id'];

        $sql = "INSERT INTO songs(song_name, song_file, song_cover_image, album_id)  
                VALUES('{$song_name}', '{$file_name}', '{$song_cover_image}', '{$album_id}')";
        
        if($con->query($sql)){
            $status = "Song added Sucessfully";
		    header("location: ../html/view-songs.php?status=".$status);
        }
        else {
            $status = "Failed to add song to database";
		    header("location: ../html/view-songs.php?status=".$status);
        }
        die();
    }
?> 