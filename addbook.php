<?php
session_start();
$name = $_SESSION['id'];
$con = mysqli_connect("localhost","root","","lm");
if(isset($_POST['create']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $sql  = "INSERT INTO `book` (`id`, `Name`, `category`) VALUES ('".$id."', '".$name."','".$cat."')";
    $res = mysqli_query($con,$sql);
    if($res)
    {
        header("location:book.php");
    }
    else
    {
        echo "Couldn't add the book";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addbook.css">
    <title>New Book Arrival</title>
</head>
<body>
<a href="book.php">Back</a>
    <form action="" method="post" class="box">
        <h1 class="head">Add New Book Arrivals</h1><br><br>
        <input type="number" required placeholder="Enter Book id" name="id"><br><br>
        <input type="text" required placeholder="Enter Book Name" name="name"><br><br>
        <!--<input type="number" placeholder="Enter category" name="num">-->
        <select name="cat" required>
            <option value="">Select the Category</option>
            <option value="entertainment">Comics</option>
            <option value="coding">Coding</option>
            <option value="education">Educatoin</option>
            <option value="history">History</option>
        </select>
        <br><br>
        
        <input type="submit" value="Create" name="create">
    </form>
</body>
</html>