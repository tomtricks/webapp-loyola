<?php

include '../config1.php';

session_start();


if(!isset($_SESSION['username'])){
    header("Location:adlogin.php");
}




// $show = mysqli_query($mysqli,)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Welcome Admin</h1> -->
    <?php echo "<h1> Welcome ".$_SESSION['username'] ."</h1>" ; 

?>

<a href="profile.php">Profile</a><br><br>

<a href="adedupage.php">Academics</a><br><br>

<a href="adLogout.php">Log out</a>

</body>
</html>
</body>
</html>