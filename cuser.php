<?php 
session_start();
$name=$_SESSION['id'];

$con = mysqli_connect("localhost","root","","lm");
if(isset($_POST['create']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $num = $_POST['num'];

    $sql = "SELECT * FROM `user` where id='".$id."'";
    $res = mysqli_query($con,$sql);


    if($res->num_rows>0)
    {
        echo "User Id Which you Entered already Exist in database. Please try again with other Userid";
    }
    else
    {
        $sql1 = "INSERT INTO `user` (`id`, `name`, `mobile`, `pass`) VALUES ('".$id."', '".$name."', '".$num."', 'abc123')";
        if(mysqli_query($con,$sql1))
        {
            header("location:userac.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cuser.css">
    <title>Create User Account</title>
</head>
<body>
    <a href="userac.php">Back</a>
    <form action="" method="post" class="box">
        <h1 class="head">User Account Creation</h1><br><br>
        <input type="number" placeholder="Enter Id Number" name="id"><br><br>
        <input type="text" placeholder="Enter User Name" name="name"><br><br>
        <input type="number" placeholder="Enter User Mobile" name="num"><br><br>
        <input type="submit" value="Create" name="create">
    </form>
</body>
</html>