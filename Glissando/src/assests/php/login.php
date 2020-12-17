<?php 
	session_start();
	include 'connect.php';

	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql ="select * from users where username = '$username' AND password = '$password'";
	
	// run the SQL query and store the result
	$res = mysqli_query($con,$sql);

	// there should be only one entry in the result
	if(mysqli_num_rows($res) == 1){

		while($row = mysqli_fetch_array($res))
		{
			$_SESSION['id'] = $row['u_id'];
			$_SESSION['alogin'] = $row['admin'];

			header("location: ../html/home.php");
		}
	}
	else
	{
		$status = "Wrong UserName or Password";
		header("location: ../html/form.php?status=".$status);
	}
	
	mysqli_close($con);
?>