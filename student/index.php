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
        <input type="text" name="cuniq" placeholder="Unique ID"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $profid = $_POST['profid'];
        $roll = $_POST['roll'];
        $cuniq = $_POST['cuniq'];
        // student(id,cuniq,ctime,profid) values('$roll','$cuniq',now(),'$profid')
        $sql = "UPDATE student SET ctime = now(),  profid = '$profid',verified=1 where id = '$roll' and uniq='$cuniq'";
        if($conn->query($sql) === TRUE){
            echo "done";
            header("Location:index.php");
        }
        else{
            echo "sorry! something wrong happend";
        }
    }
    ?>
</body>
</html>