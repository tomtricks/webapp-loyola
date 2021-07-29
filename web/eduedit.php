<!-- it edits the form when clicked the edit -->

<?php

include "config1.php";

if((!isset($_GET['id']))){
    //redirect to show page
    die('id not provided');
}

$id = $_GET['id'];


$sql="SELECT * FROM tbl_edu WHERE id = $id ";
$result=$conn->query($sql);
if($result->num_rows !==1)
    {
        //redirect to show page
        die('id is not in db');

    }
    $data = $result->fetch_assoc();
   
?>




    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edu Form</title>

    <style>
        .row{
            padding:12px 12px 12px 0;
            display: inline-block;
         
        
        }

        
        .container{
            margin : auto;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
         

        }
        input[type=text]{
            width:auto;
            text-align: center;
           
            background-color:none;
            border-radius:4px;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing:border-box;
        }

         a{
             text-decoration:none;
         }   


    

    </style>
</head>
<body>
<div class="row" >
    <div class="">
        <div class= "container">
        <h1>EDIT FORM</h1>
        <form action="edumodify.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data" class="row">


        <input type='text'  name="dept" placeholder="Degree" value="<?= $data['dept'] ?>" ><br><br>
        <input type='text'  name="cname" placeholder="College Name" value="<?= $data['cname'] ?>"><br><br>
        <input type="text" name="duration" placeholder="Duration(eg: 2011-2012)" value="<?= $data['duration'] ?>"><br><br>
        <input type="text" name="place" placeholder="Location(eg: Chennai)" value="<?= $data['place'] ?>"> <br><br>
  
        <legend>Select File to Upload:</legend>
            <div class="form-group">
                <input type="file" name="file1" >
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="">
            </div>
            <?php if(isset($_GET['st'])) { ?>
                <div class="">
                <?php if ($_GET['st'] == 'success') {
                        echo "File Uploaded Successfully!";
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
    </div>
</div>
<a href="edupage.php">Cancel</a>
</body>
</html>