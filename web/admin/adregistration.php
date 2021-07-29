<?php

include '../config1.php';

error_reporting(0);


session_start();

if(isset($_SESSION['username'])){
    header("Location:adlogin.php");
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=($_POST['password']);
    $cpassword=($_POST['cpassword']);
/*username,id,dob,gender,department,shift,email,password,cpassword*/ 
/*username,id,dob,gender,department,shift,email,password,cpassword*/ 


if($password == $cpassword)
{
// time yt :20:55
    $sql="SELECT * FROM tb_admin WHERE email='$email' ";
    $result=mysqli_query($conn,$sql);
    if(!$result -> num_rows >0){
       
    $sql =  "Insert into tb_admin(username,email,password) 
            VALUES('$username','$email','$password')";
    $result= mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('Registration Completed')</script>";
            $username="";
             $email="";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";

            header("Refresh:0; url=adlogin.php");
            

       }
    
    
    else{
        echo "<script> alert('Something Went Wrong.')</script>";
    }
    
 } else{
        echo "<script> alert('Email Already Exists.')</script>";
    } 
} else{
        echo "<script> alert('Password Not Matched')</script>";
}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration </title>
    <link rel="stylesheet" href="../Registration.css">
</head>
<body>
    <form action="" method="POST" class="box"  >
    <h1>NEW ACCOUNT</h1>
    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
    <input type="text"  name="email" value="<?php echo $email; ?>" placeholder="Email" required>
    <input type="password"  name="password" value="<?php echo $_POST['$password']; ?>" placeholder="Password" required>
    <input type="password"  name="cpassword" value="<?php echo $_POST['$cpassword']; ?>" placeholder="Confirm Password" required>
    <input type="submit" name="submit" value="Submit" >
    
    <h5>Already have an account then, <a href="adlogin.php">LOGIN</a></h5>
</form>
</body>
</html>