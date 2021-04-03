<?php 
session_start();

if (isset($_POST['login'])) 
{
	$name = $POST['name'];
	$pass = $_POST['pass'];

	$con = mysqli_connect("localhost","root","","lm");

	$sql = "SELECT * FROM `ADMIN` WHERE user='".$name."' AND pass = '".$pass."'";

	

	if (mysqli_query($con,$sql)) 
	{
	
		$_SESSION['id']=$_POST['name'];
		header("location:adminui.php");
	}
	else
		echo "Enter correct username or password";
}

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Admin Login</title>
</head>
<body>
    <form method="post" action="" class="box">
    	<h1>Admin Login</h1><br><br>
    	<input type="text" name="name" placeholder="Enter Your Username"><br><br>
    	<input type="password" name="pass" placeholder="Enter Your password"><br><br>
    	<input type="submit" name="login" value="Login">
    </form>
</body>
</html>