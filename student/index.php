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
<body style="text-align:center;">
    <h2>Attendance System</h2>
    <a href="../feedback/">Give Feedback</a><br><br><br>
    <form action="#" method="post">
        <input type="text" name="profid" placeholder="Prof ID" required autofocus><br><br>
        <input type="text" name="profname" placeholder="Prof name" required autofocus><br><br>
        <input type="text" name="roll" placeholder="Roll Number" required><br><br>
        <input type="text" name="cuniq" placeholder="Unique ID" required><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $profid = $_POST['profid'];
        $roll = $_POST['roll'];
        $cuniq = $_POST['cuniq'];
        $profname = $_POST['profname'];
        $sql = "select * from student where id='$roll' and uniq='$cuniq'";
        $result = $conn->query($sql);
        // $row = mysqli_fetch_array($result);
        if($result->num_rows>0){
        $sql = "UPDATE student SET ctime = now(),  profid = '$profid',profname = '$profname',verified=1 where (id = '$roll' and uniq='$cuniq')";
        if($conn->query($sql) === TRUE){
            $sql="insert into studentre(id,uniq,ctime,profid,profname) values('$roll','$cuniq',now(),'$profid','$profname')" ;   
            $conn->query($sql);
            $ran = mt_rand(100,1000);
            $sql = "update student set uniq='$ran' where id='$roll'";
            $conn->query($sql);

            echo "done";
            // header("Location:index.php");
        }
        else{
            echo "sorry! something wrong happend";
        }}
        else{
            echo "invalid details";
        }
    }
    ?>
</body>
</html>