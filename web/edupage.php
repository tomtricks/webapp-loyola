<?php
include 'config1.php';

session_start();


if(!isset($_SESSION['username'])){
    header("Location:loginas.php");
}

// fetch files
$u_name=$_SESSION['username'];
$sql = "SELECT `id`,`filename`,`dept`,`cname`,`duration`,`place` FROM `tbl_edu`WHERE `username`='$u_name' ";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download file in PHP and MySQL </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="tabletry.css">
     </head>
<body>
<?php echo "<h1> Welcome ".$_SESSION['username'] ."</h1>" ; 

?>
<br/>
<div class="container">
    
    
    <div class="">
        <div class="">
    <style> 
      .body,html{
  margin: 0;
  padding:0;
}
.content-table {
  
    border-collapse: collapse;
      margin: 5% auto;
        font-size: 1.0em;
          min-width: 400px;
            border-radius: 5px 5px 0 0;
              overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
              table-layout: auto;
             
              }
  .content-table thead tr {
    background-color: #0b54a7;
      color: #ffffff;
        text-align: left;
          font-weight: bold;
         
          }
  .content-table th,
  .content-table td {
    padding: 12px 15px;
    }
  .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
    font: size 150%;
  }
  .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    }
  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #0b54a7;
    }
  .content-table tbody tr.active-row {
    font-weight: bold;
  
  }

  a{
    text-decoration: none !important;
  }      
       }
    </style>
            <table class="content-table" width="90%" height= "50%" >
                <thead class="thead">
                    <tr class="tr">
                        <th>#</th>
                        <th>File Name</th>
                        <th>Department</th>
                        <th>College</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['dept']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <td><a href="upload/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="upload/<?php echo $row['filename']; ?>" download>Download</td>
                    <td>
        <?php
        echo "<a href='eduedit.php?id=".$row['id'] ."'>Edit &nbsp </a>";
        echo "<a href='./edudelete.php?id=".$row['id'] ."'>  Delete</a>";
        ?>
        </td>
                
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
<a href="eduform.php"  >To Add Click here</a><br><br>
<a href="welcome1.php">Dashboard</a>
</body>
</html>