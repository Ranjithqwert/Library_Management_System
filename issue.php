<?php
session_start();
$name = $_SESSION['id'];
$con = mysqli_connect("localhost","root","","lm");




if(isset($_POST['create']))
{
    $date = date('y-m-d');
    $dates=strtotime('+15 days');
    $rdate = date('y-m-d',$dates);
   $id = $_POST['id'];
   $bid=$_POST['name'];
   $bn = $_POST['bname'];
    $check = "SELECT * FROM `user` where `id`='".$id."'";
    $resultcheck=mysqli_query($con,$check);

    $check2 = "SELECT * FROM `book` where `id`='".$bid."' AND `Name`='".$bn."'";
    $resultcheck2 = mysqli_query($con,$check2);

    if($resultcheck2->num_rows>0)
    {
        if($resultcheck->num_rows>0)
    {
        
    if($resultcheck->num_rows==0)
    {
        echo "User Which You enterted Doesn't Exist";
    }

    $sql = "INSERT INTO `borrow` (`user_id`, `book_name`, `book_id`, `pick_date`, `return_date`, `status`) VALUES ('".$id."', '".$bn."', '".$bid."', '".$date."','".$rdate."', 'pending')";
    if(mysqli_query($con,$sql))
    {
        header("location:book.php");
    }
    else
    {
        echo "Couldn't Issue the Book";
    }
    }
    else
    {
        echo "User Id Which You Entered Doesn't Exist";
    }
    }

    else
    {
        echo "Enter Correct Book Details";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="issue.css">
    <title>Issue the Book</title>
</head>
<body>
    <h1><?php  ?></h1>
    <a href="adminui.php">Back</a>
    <form action="" method="post" class="box">
        <h1 class="head">Issue Book</h1><br><br>
        <input type="number" placeholder="Enter UserId" name="id"><br><br>
        <input type="text" placeholder="Enter Book Id" name="name"><br><br>
        <input type="text" name="bname" placeholder="Enter Book Name"><br><br>

        <input type="submit" value="Issue" name="create">
    </form>
</body>
</html>