
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance - Student Details</title>
</head>
<body style="text-align:center;">
<h2>Generated Unique Id's</h2>
<a href="studentre.php">Reassign unique id's </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="studentde.php">Show Unique Id's</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="present.php">Present Students</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="attendance.php">Full Attendance</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="allpresent.php">Student Current Status</a></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addstu.php">Add Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../feedback/">Give Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
   <br><br>
  <table>
    <tr>
    <th>Roll Number</th>
    <th>Unique Id</th>
    </tr>
    
  
    <?php
    include "connect.php";
    session_start();
    if($_SESSION['email']){
        $result = $conn->query("SELECT * FROM student");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<tr><td>'.$row['id'].'</td><td>'.$row['uniq'].'</td></tr>';
            }
        }
    }
    else{
        header("Location:index.php");
    }
    ?>  </table>
</body>
</html>