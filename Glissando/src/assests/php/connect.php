<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB','glissando');
    $con = mysqli_connect(HOST,USER,PASS,DB);
    if(mysqli_connect_errno($con))
    {
        $status = "Failed to connect";
        header("location: form.php?status=".$status);
    }
?>