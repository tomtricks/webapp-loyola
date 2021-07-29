<?php

include 'config1.php';

if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="DELETE FROM tbl_edu WHERE id=$id ";

    
    if($conn->query($sql) === TRUE){
        echo "Information Deleted";
        header("Location:edupage.php");
    }else{
        echo "not submitted";
    }

}else{
    //redirect to show page
    die('id is not provided');
}

?>