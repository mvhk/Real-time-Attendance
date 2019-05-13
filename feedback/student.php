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
<a href="index.html">Home</a><br><br>
    <form action="#" method="post">
        <input type="text" name="id" placeholder="ID:"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <!-- <input type="text" name="tid" placeholder="Teacher Id">
        <textarea name="feed" cols="30" rows="10"></textarea> -->
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php   
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $pwd = $_POST['pwd'];
            $sql = "SELECT * FROM student where id = '$id' and pwd = $pwd";
            $result = $conn->query($sql);
            if ($result->num_rows>0) {
                $_SESSION['id'] = $id;
                header("Location:feedbacks.php");
            }
            else{
                echo "Invalid details";
            }
        }
    ?>
</body>
</html>