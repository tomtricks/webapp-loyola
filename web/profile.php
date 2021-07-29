<?php

//this include the configuration file
include 'config1.php';

error_reporting(0);

session_start();


 $u_name=$_SESSION['username'];
 
$qry=mysqli_query($conn,"SELECT * FROM userprofile WHERE username='$u_name'");
while($row = mysqli_fetch_row($qry)){
    ?>

    <h1>THIS IS YOUR PROFILE</h1>
    <tr class ="even pointer" >
    <td><?php echo "Username :" ?><?=(ucwords($row[1]))?></td><br>
    <td><?php echo "Department ID : " ?><?=$row[2]?></td><br>
    <td><?php echo "DOB :" ?><?=$row[3]?></td><br>
    <td><?php echo "Gender :" ?><?=(ucwords($row[4]))?></td><br>
    <td><?php echo "Department :" ?><?=(ucwords($row[5]))?></td><br>
    <td><?php echo "Shift :" ?><?=$row[6]?></td><br>
    <td><?php echo "Email ID :" ?><?=$row[7]?></td><br>
    </tr>
<?php
}
?>

<br> <br>
<a href="welcome1.php">Dashboard</a>
<style>
    a{
        text-decoration:none;
    }
</style>