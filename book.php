<?php
session_start();
$name = $_SESSION['id'];
$con = mysqli_connect("localhost","root","","lm");

if($name=="")
{
    header("location:adminui.php");
}

if(isset($_POST['delete']))
{
    $bid = $_POST['bid'];
    $sql2 = "DELETE from `book` where id='".$bid."'";

    if(mysqli_query($con,$sql2))
    {
        echo "<script>alert(Book Has been Deleted SuccessFully)</script>";
    }
}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    <title>Books Section</title>
</head>
<body>
<div class="nav">
<div class="links"><br><br>
<h1><?php echo $name; ?></h1><br><br>
	<a href="adminui.php">Home</a><br><br>
	<a href="userac.php">User Accounts</a><br><br>
    <a href="issue.php">Issue Book</a><br><br>
	<form action="" method="post">
    <input type="submit" value="logout" name="logout">
    </form>

</div>

</div>
<div class="table">
<table>
<p class="thead">Book Details</p>
<tr><th>Book Id</th>
<th>Book Name</th>
<th>category</th></tr>

<?php 
    
    
    $sql = "SELECT * from book";
    $rs = $con->query($sql);

    if ($rs-> num_rows>0) 
    {
        while ($row=$rs->fetch_assoc()) 
        {
            
            echo "<tr><td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['category']."</td></tr>";
        }					
    }

?>
</table>
</div>  
<div class="create">
    <p class="heading">Add New Book Arrivals</p>
    <a href="addbook.php">Proceed</a>
</div> 

<div class="del">
    <form action="" method="post">
        <p class="head2">Delete Unvailable Book</p><br><br>
        <input type="number" placeholder="Enter Book Id to delete" name="bid"><br><br>
        <input type="submit" value="delete" name="delete">
    </form>
</div>
</body>
</html>