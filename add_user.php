<?php

include "config.php";

if($_POST)
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
	$address=$_POST['address'];
	

	$Hash = password_hash($password, PASSWORD_DEFAULT);
	$Hashphone = password_hash($number, PASSWORD_DEFAULT); 
	$sql="INSERT INTO `register`(`name`, `email`, `password`, `number`, `address`) VALUES ('".$name."','".$email."','".$Hash."','".$Hashphone."','".$address."')";

	$vere = "SELECT * FROM register WHERE email = '$email'";
	$verify_email = mysqli_query($conn, $vere);
	if(mysqli_num_rows($verify_email) > 0){
		echo '
		<script> 
			alert("Email already registered"); 
			window.location = "/chat_project/register.php";
		</script>';
		exit();
	}

	$veru = "SELECT * FROM register WHERE name = '$name'";
	$verify_user = mysqli_query($conn, $veru);
	if(mysqli_num_rows($verify_user) > 0){
		echo '
		<script> 
			alert("Username already registered"); 
			window.location = "/chat_project/register.php";
		</script>';
		exit();
	}

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		session_start();
		$_SESSION['name'] = $name;
		header('Location: home.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
}
else
{
	header('location:index.php');
}
?>