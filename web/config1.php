<?php

$_SERVER= "localhost";
$usernam= "root";
$pass= "";
$database="profile";

$conn=mysqli_connect($_SERVER,$usernam,$pass,$database);
if(!$conn){
    die("<script> alert('Connection Failed.')</script>");
}
?>