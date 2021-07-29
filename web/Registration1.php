<?php

include 'config1.php';

error_reporting(0);


session_start();

if(isset($_SESSION['username'])){
    header("Location:loginas.php");
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $id=$_POST['id'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $shift=$_POST['shift']; 
    $email=$_POST['email'];
    $password=($_POST['password']);
    $cpassword=($_POST['cpassword']);


if($password == $cpassword)
{
    $sql="SELECT * FROM userprofile WHERE email='$email' ";
    $result=mysqli_query($conn,$sql);
    if(!$result -> num_rows >0){
       
    $sql =  "Insert into userprofile(username,id,dob,gender,department,shift,email,password) 
            VALUES('$username','$id','$dob','$gender','$department','$shift','$email','$password')";
    $result= mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('Registration Completed')</script>";
            $username="";
            $id="";
            $dob="";
            $gender="";
            $department="";
            $shift="";
            $email="";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
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
    <title>Registration Form</title>
    <link rel="stylesheet" href="Registration.css">
</head>
<body>
    <form action="" method="POST" class="box"  >
    <h1>NEW ACCOUNT</h1>
    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
    <input type="text"  name="id" value="<?php echo $id; ?>" placeholder="Teacher's ID">
    <input type="text"  name="dob" value="<?php echo $dob; ?>" placeholder="DOB">
    <input type="text"  name="gender" value="<?php echo $gender; ?>" placeholder="Gender">
    <input type="text"  name="department" value="<?php echo $department; ?>" placeholder="Department">
    <input type="text"  name="shift" value="<?php echo $shift; ?>" placeholder="Shift">
    <input type="text"  name="email" value="<?php echo $email; ?>" placeholder="Email">
    <input type="password"  name="password" value="<?php echo $_POST['$password']; ?>" placeholder="Password">
    <input type="password"  name="cpassword" value="<?php echo $_POST['$cpassword']; ?>" placeholder="Confirm Password">
    <input type="submit" name="submit" value="Submit" >
    
    <h5>Already have an account then, <a href="loginas.php">LOGIN</a></h5>
</form>
</body>
</html>