<?php

include 'config1.php';

session_start();


if(!isset($_SESSION['username'])){
    header("Location:loginas.php");
}

// to fetch files
$u_name=$_SESSION['username'];

//Getting id from eduedit page
if(isset($_POST['submit']) && (isset($_GET['id']))){
    $id=$_GET['id'];
    // echo var_dump($id);
    $filename = $_FILES['file1']['name'];
    $dept=$_POST['dept'];
    $cname=$_POST['cname'];
    $duration=$_POST['duration'];
    $place=$_POST['place'];
    

// random numbers
$randomno=rand(0,100000);
// Upload with current date with random number in upload folder
$rename='Upload'.date('Ymd').$randomno;

$newname = $rename.'.'. $filename;

    $filename = '' . '' . $filename;

            // set target directory
            $path = 'upload/' ;
                
            $created = @date('Y-m-d H:i:s');
            
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $newname));
    
    $sql="UPDATE `tbl_edu` SET `id`='$id',`filename`='$filename',`created`='$created',`username`='$u_name',`dept`='$dept',`cname`='$cname',`duration`='$duration',`place`='$place',`newname`='$newname' WHERE `id`='$id' ";

    
    if($conn->query($sql) === TRUE){
        echo "Information Modified";
        header("Refresh:3; url=edupage.php");
    }else{
        echo "not submitted";
    }

   
} else{
    echo "invalid";
}

?>