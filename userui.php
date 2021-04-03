<?php
session_start();
$name = $_SESSION['user'];

if($name == "")
{
    header("location:user.php");
}


$con = mysqli_connect("localhost","root","","lm");

$sql = mysqli_query($con,"SELECT * FROM `user` where id = '".$name."'");

$res = mysqli_fetch_assoc($sql);


if(isset($_POST['update']))
{
    $pass = $_POST['pass'];
    $sql2 = mysqli_query($con,"UPDATE `user` SET `pass` = '".$pass."' WHERE `id` = $name");

    if($sql2)
    {
        header("Refresh:0");
        echo "Password Updated Successfully" ;
    }
    else
    {
        echo "Couldn't Update Password";
    }
}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location:index.php");
}


if(isset($_POST['return']))
{
    $query = "DELETE from `borrow` where `user_id`='".$name."'";
    if(mysqli_query($con,$query))
    {
        header("Refresh:0");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="userui.css">
    <title>User Panel</title>
</head>
<body>
    <div class="nav">
    <br><br><br><br><br><br><br><br><br>
    <h1><?php echo $res['name']; ?></h1><br><br>
    <form action="" method="post"><input type="submit" value="logout" name="logout"></form>
    </div>

    <div class="table">
        <div class="thead">User Information</div>
        <table>
            <tr>
                <th>Id Number</th>
                <td><?php echo $name ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $res['name'] ?></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><?php echo $res['mobile']; ?></td>
            </tr>
            <form action="" method="POST">
            <tr>
                <th>Password</th>
                <td><input type="text" name="pass" required value=<?php echo $res['pass']; ?>></disabled></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update" name="update" ></td>
            </tr>
            </form>
        </table>
    </div>
    <div class="table2">
        <div class="thead2">Your Borrowed Books</div>
        <table>
           <tr>
               <th>Book Id</th>
               <th>Book Name</th>
               <th>Borrow Date</th>
               <th>Return Date</th>
               
           </tr>

           <?php 

        $con = mysqli_connect("localhost","root","","lm");
    
        $sql = "SELECT * from borrow where user_id='".$name."'";
        $rs = $con->query($sql);

        if ($rs-> num_rows>0) 
        {
            while ($row=$rs->fetch_assoc()) 
            {
                
                echo "<tr><td>".$row['book_id']."</td><td>".$row['book_name']."</td><td>".$row['pick_date']."</td><td>".$row['return_date']."</td></tr>";
            }					
        }
    ?>

    <tr>
    <td colspan="4"><form action="" method="post"><input type="submit" value="Return all Books" name="return" style="width: 50%; position:relative"></form></td></tr>
        </table>
</div>
</body>
</html>