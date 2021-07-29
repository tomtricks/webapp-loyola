<!-- it add a new row in table -->


<?php
include "config1.php";
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
            width:200;
            height:75%;
            padding: 10px ;
            position: absolute;
            top: 10%;
            left: 35%;

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
              position: absolute; 
              top:90%;
              left:29%;
             color:black;
             border: 0;
    background:lightblue;
    display:block;
    font-weight: 300;  
    margin: 20px  auto;
    text-align: center;
    border:2px;
    padding: 14px 40px;
    outline: none;
    color:blue;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
         }    
         .form-group input[type="submit"]
{
    top:90%;
    left:150%;
    border: 0;
    background:lightblue ;
    display:block;
    font-weight: 300;  
    margin: 20px  auto;
    text-align: center;
    border:2px;
    padding: 14px 40px;
    outline: none;
    color:blue;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
}


    

    </style>
</head>
<body>
<div class="row">
        <div class= "container">
            <h2>Add Education </h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type='text'  name="dept" placeholder="Degree"><br><br>
        <input type='text'  name="cname" placeholder="College Name"><br><br>
        <input type="text" name="duration" placeholder="Duration(eg: 2011-2012)"><br><br>
        <input type="text" name="place" placeholder="Location(eg: Chennai)"> <br><br>
       
        <legend>Select File to Upload:</legend>
            <div class="form-group">
                <input type="file" name="file1" >
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="">
                <a href="edupage.php" class="form-group" >Cancel</a>
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
    </body>
</html>