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
    <title>Feedback</title>
</head>
<body style="text-align:center;">
    <h2>Feed Back for the Student</h2>
    <a href="showstu.php">FeedBack by the Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a><br><br><br>
    <form action="#" method="post">
        <input type="text" name="id" placeholder="Student ID"><br><br>
        <textarea name="feed" cols="30" rows="10" placeholder="Feedback"></textarea><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $sid = $_POST['id'];
            $feed = $_POST['feed'];
            $id = $_SESSION['email'];
            $sql = "INSERT INTO feedbacktea(id,sid,feed) VALUES('$id','$sid','$feed')";
            if($conn->query($sql)){
                echo "Updated";

            }
            else{
                echo "Something wrong happend!";
            }
        }
    ?>
</body>
</html>