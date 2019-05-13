<?php
include "connect.php";
session_start();
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
</head>
<body style="text-align:center;">

<h2>Create New Student</h2>
<a href="studentre.php">Reassign unique id's </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="studentde.php">Show Unique Id's</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="present.php">Present Students</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="attendance.php">Full Attendance</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="allpresent.php">Student Current Status</a></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addstu.php">Add Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../feedback/">Give Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="logout.php">Logout</a>
<br><br>
    <form action="#" method="post">
        <input type="text" name="name" placeholder="Student Name" required autofocus><br><br>
        <input type="text" name="uniq" placeholder="Unique Code" required><br><br>
        <button type="submit" name="submit">Create new student</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $uniq = $_POST['uniq'];
    $sql="insert into student(id,uniq) values('$name','$uniq')" ;   
    if($conn->query($sql)===true){
        echo "Created";
        header("Location:addstu.php");
    }
}
?>
<?php
}else{
header("Location:index.php");
}?>