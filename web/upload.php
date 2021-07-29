<?php

include 'config1.php';

session_start();


if(!isset($_SESSION['username'])){
    header("Location:loginas.php");
}

if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];
    $dept=$_POST['dept'];
    $cname=$_POST['cname'];
    $duration=$_POST['duration'];
    $place=$_POST['place'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = "select max(id) as id from tbl_edu where username='{$_SESSION['username']}'";
            $result = mysqli_query($conn, $sql);
            if (is_countable ($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
            $randomno=rand(0,100000);
            // Upload with current date with random number in upload folder
            $rename='Upload'.date('Ymd').$randomno;
            
            $newname = $rename.'.'. $filename;

            $filename = '' . '' . $filename;

            //set target directory
            $path = 'upload/' ;  
            
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $newname));
            
            // insert file details into database
            $sql = "INSERT INTO tbl_edu(filename, created,username,dept,cname,duration,place,newname) 
            VALUES('$filename', '$created','{$_SESSION['username']}','$dept','$cname','$duration','$place','$newname')";
            mysqli_query($conn, $sql);
            header("Location: edupage.php?st=success");
        }
        else
        {
            header("Location: edupage.php?st=error");
        }
    }
    else
        header("Location: edupage.php");
}

?>
<?php echo "<h1> Welcome ".$_SESSION['username'] ."</h1>" ; 

?>
<h1>hello this is upload page</h1>
