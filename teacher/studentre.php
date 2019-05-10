<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance - Student Details Reset</title>
</head>
<body>
    <a href="studentde.php">Show Unique Id's</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
    <br><br>
    <?php
        if (isset($_SESSION['email'])) {
            
            if (isset($_POST['submit'])) {
                $result = $conn->query("select id from student");
                $row = mysqli_fetch_array($result);
                $ids_array = [];
                do
                {
                array_push($ids_array, $row['id']);
                }
                while($row = mysqli_fetch_array($result));
                for($i=0;$i<$result->num_rows;$i++){
                    $current_row = $ids_array[$i];
                    $ran = mt_rand(100,1000);
                    $query1 = "update student set uniq='$ran',verified=0 where id='$current_row'";
                    if ($conn->query($query1) === TRUE) {
                        header("Location:index.php");
                    }
                }
                
            }
        }
        else{
            header("Location:index.php");
        }
    ?>
    <form action="#" method="post">
        <button type="submit" name="submit">Create New Unique Id's for the students</button>
    </form>
</body>
</html>