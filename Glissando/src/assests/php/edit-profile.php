<?php
    include 'connect.php';

    $userID=$_POST['userID'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $regname="/^[a-zA-Z ]*$/";
    $regusername="/^[a-zA-Z0-9_]*$/";

    //Execute the query
    if(!preg_match($regname,$first_name) || !preg_match($regname,$last_name)){
      $status = "Only letters and white space allowed";
      header("location:../html/edit-profile.php?status=".$status);
    }
    elseif(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',$email)){
      $status = "Enter valid Email ID";
      header("location:../html/edit-profile.php?status=".$status);
    }
    elseif(!preg_match($regusername,$username)){
      $status = "Only letters, numerals and underscores are allowed";
      header("location:../html/edit-profile.php?status=".$status);
    }
    else{
      $sql = "UPDATE users SET username='$username',first_name='$first_name',last_name='$last_name',password='$password',email='$email' WHERE u_id=$userID";
      mysqli_query($con,$sql);

      if(mysqli_affected_rows($con) > 0){
        
        $status = "Profile information was updated sucessfully";
          header("location:../html/profile.php?status=".$status);
      }
      else {
        $status = "No changes were made to the existing profile information";
          header("location:../html/profile.php?status=".$status);
      }
    }
    mysqli_close($con);
?>