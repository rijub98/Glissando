<?php
    /*
        define() takes name and its value and these names are connected by mysqli_connect() and stored in $con variable.
        After connecting, it falls under the condition whether the connection fails or not.
    */
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
