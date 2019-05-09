<?php
include "connect.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="profid" placeholder="Prof ID"><br><br>
        <input type="text" name="roll" placeholder="Roll Number"><br><br>
        <input type="text" name="uniq" placeholder="Unique ID"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $profid = $_POST['profid'];
        $roll = $_POST['roll'];
        $uniq = $_POST['uniq'];
        $sql = "INSERT INTO student(id,uniq,ctime,profid) values('$roll','$uniq',now(),'$profid')";
        if($conn->query($sql) === TRUE){
            echo "done";
            header("Location:index.php");
        }
        else{
            echo "sorry!";
        }
    }
    ?>
</body>
</html>