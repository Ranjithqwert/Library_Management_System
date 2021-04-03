<?php 
session_start();
$name = $_SESSION['id'];


if ($name=="") 
{
	header("location:admin.php");
}

if(isset($_POST['logout']))
{
	session_destroy();
	header("location:index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="adminui.css">
</head>
<body>
<video src="1.mp4" autoplay="true" loop="true" class="videos" muted >Admin Panel</video>



<div class="nav">
<div class="links"><br><br>
<h1><?php echo $name; ?></h1><br><br>
	<a href="userac.php">User Accounts</a><br><br>
	<a href="book.php">Books</a><br><br>
	<a href="issue.php">Issue Book</a><br><br>
	<form action="" method="post">
	<div class="logout"><input type="Submit" name="logout" value="Logout"></form></div>

</div>

</div>
</body>
</html>