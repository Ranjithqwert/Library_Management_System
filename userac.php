<?php
session_start();
$name = $_SESSION['id'];
if($name=="")
{
    header("location:adminui.php");
}

if(isset($_POST['delete']))
{
    $con = mysqli_connect("localhost","root","","lm");
    $id = $_POST['uid'];
    $sql = mysqli_query($con,"DELETE from `user` where `id`='".$id."'");

    if($sql)
    {
        echo "User Account Deleted SuccessFully ";
        header("Refresh:0");
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
    <link rel="stylesheet" href="userac.css">
    <title>User Accounts</title>
</head>
<body>

<div class="nav">
<div class="links"><br><br>
<br><br><br>
<h1><?php echo $name; ?></h1><br><br>
	<a href="adminui.php">Home</a><br><br>
	<a href="book.php">Books</a><br><br>
    <a href="issue.php">Issue Book</a><br><br>
	<form action="" method="post">
    <input type="submit" value="Logout" name="logout">
    </form>

</div>
</div>
    <div class="table">
    <table>
    <h1 class="thead">User account details</h1>
    
    <tr>
    <th>User Id</th>
    <th>User Name</th>
    <th>Mobile Number</th>
    </tr>
     
    <?php 

    $con = mysqli_connect("localhost","root","","lm");
    
    $sql = "SELECT * from user";
    $rs = $con->query($sql);

    if ($rs-> num_rows>0) 
    {
        while ($row=$rs->fetch_assoc()) 
        {
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['mobile']."</td></tr>";
        }					
    }
    ?>
    </table>
    </div>
        <div class="create">
            <br>
            <p class="head">Create New UserAccount</p><br>
            <a href="cuser.php">Proceed</a>
        </div>

        <div class="del">
            <form action="" method="post">
                <br>
                <p class="head2">Delete User Account</p><br><br>
                <input type="number" name="uid" placeholder="Enter User Id to delete"><br><br>
                <input type="submit" value="delete" name="delete">
            </form>
        </div>
    
</body>
</html>