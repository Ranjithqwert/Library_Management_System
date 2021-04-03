<?php 

if (isset($_POST['login'])) 
{
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $con = mysqli_connect("localhost","root","","lm");
    $sql = "SELECT * FROM `user` WHERE `id`='".$name."' AND `pass`='".$pass."'";

    $res =mysqli_query($con,$sql);

    if ($res->num_rows>0) 
    {
       session_start();
       $_SESSION['user']=$name;
       header("location:userui.php");
    }
    else
    {
        echo "Enter Correct UserId or Password";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="user.css">
    <title>User Login</title>
</head>
<body>
    <form action="" method="post" class="box">
        <h1>User Login</h1>
        <input type="number" name="name" placeholder="Enter your Id"><br><br>
        <input type="password" name="pass" placeholder="Enter your password"><br><br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>