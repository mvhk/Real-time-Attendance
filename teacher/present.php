<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance - Present</title>
</head>
<body style="text-align:center;">
    <h2>Present Students in the class</h2>
    <a href="studentde.php">Show Unique Id's</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
    <table>
    <tr>
    <th>Roll Number</th>
    <th>Time of entry </th>
    </tr>
    
  
    <?php
    include "connect.php";
    session_start();
    if($_SESSION['email']){
        $result = $conn->query("SELECT * FROM student where verified=1");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                echo '<tr><td>'.$row['id'].'</td><td>'.$row['ctime'].'</td></tr><br>';
            }
        }
    }
    else{
        header("Location:index.php");
    }
    ?>  </table>

</body>
</html>