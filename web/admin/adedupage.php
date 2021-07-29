<?php
include '../config1.php';

error_reporting(0);
// session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics</title>
</head>
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
  }      /* table,th,td{
           border:1px solid black;
           border-collapse: collapse; */
       }
    </style>
<body>
    <form action="adedupage.php?username=<?= $username ?>" method="post">
        <h3>Enter the user name here</h3>
        <input type="text" name="username" id=""  value <?php echo $row['username']; ?>placeholder="Search..Eg:john">
        <input type="submit" name="submit" value="submit">
    </form>
        <!-- table to display content -->
        <table class="content-table" width="90%" height= "50%" >
                <thead class="thead">
                    <tr class="tr">
                        <th>#</th>
                        <th>File Name</th>
                        <th>Department</th>
                        <th>College</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <!-- <th>id</th> -->
                        <th>View</th>
                        <th>Download</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['submit'])){
                        $username=$_POST['username'];
                        
                        $sql = "SELECT `username` FROM `tbl_edu` WHERE `username`='$username' ";
                        $result = mysqli_query($conn, $sql);
                          if($result->num_rows == 0){
                      //redirect to show page
                          die("Invalid Username, " .ucwords($username));}
                          else{

                        echo "<br>"; 
                        echo  ucwords($username)." Academic Information";


                $sql = "SELECT `filename`,`dept`,`cname`,`duration`,`place` FROM `tbl_edu` WHERE `username`='$username' ";
                $result = mysqli_query($conn, $sql);
        //         if($result->num_rows ==1){
        // //redirect to show page
        // die(' is not in db');}
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['dept']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <!-- <td><?php //echo $row['id']; ?></td> -->
                    <td><a href="../upload/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="../upload/<?php echo $row['filename']; ?>" download>Download</td>
                    </tr>
                    <?php } }}
                    // else{
                    //   die(' is not in db');
                    // }
                   
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<a href="adwelcome.php">Dashboard</a>
<br><br>
</body>
</html>  