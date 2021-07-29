<?php

include 'config1.php';

session_start();


if(!isset($_SESSION['username'])){
    header("Location:loginas.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <title>Welcome</title>
</head>
<body>

  <?php echo "<h1> Welcome ".$_SESSION['username'] ."</h1>" ; 

?>
<div class="container">
<div class="box">

<a href="profile.php" id="box1">Profile</a><br><br>

<a href="edupage.php" id="box2">Academics</a><br><br>

<a href="Logout1.php" id="box3">Log out</a>
</div>
</div>
</body>
</html>