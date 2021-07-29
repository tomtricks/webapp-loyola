<?php

include 'config1.php';

session_start();
error_reporting(0);

if(isset($_SESSION['username'])){
    header("Location:welcome1.php");
}

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=($_POST['password']);

   $sql= "select * from userprofile where email='$email' and password='$password'";
$result = mysqli_query($conn,$sql);

if($result -> num_rows > 0){
    $row = mysqli_fetch_assoc($result);
  
    $_SESSION['username']=$row['username'];
    header("Location:welcome1.php");
} 
else {
    echo "<script> alert('Email or Password is Wrong.')</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>LOGIN</title>
</head>
<body>
    <form action="" class="box" method="POST" >
    <h1>LOGIN</h1>
    <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required  > 
    <input type="password"name="password" placeholder="Password" value="<?php echo $_POST[$password]; ?>" required >
    <input type="submit" name="submit" value="Login">
    <h5>DON'T HAVE AN ACCOUNT THEN,<a href="Registration1.php">SIGN UP</a></h5>
    </form>
</form>
</body>
</html>
