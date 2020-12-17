<?php
	include 'connect.php';

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	mysqli_query($con,"INSERT INTO users (first_name,last_name,username,password,email,admin)
					   VALUES ('$first_name','$last_name','$username','$password','$email',false)");
		
	if(mysqli_affected_rows($con) > 0){
		$status = "New User added Sucessfully";
		header("location: ../html/form.php?status=".$status);
	}
	else
	{
		$status = "Username already registered";
		header("location: ../html/form.php?status=".$status);
	}
	
?>