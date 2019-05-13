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
    <title>Attendance - Teacher</title>
</head>
<body style="text-align:center;">
    <h2>Professor Login</h2>
    <a href="../feedback/">Give Feedback</a><br><br><br>
    <?php
    if(isset($_SESSION['email'])){
        header("Location:studentde.php");  
    }
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $sql_check = "SELECT * FROM teacher WHERE email = '$email' and pwd = '$pwd'";
            $result = $conn->query($sql_check);
            if ($result->num_rows > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['pwd'] = $pwd;
                header("Location:studentre.php");
            }
            else{
                echo "invalid credentials";
            }
        }
    ?>
    <form action="#" method="post">
        <input type="text" name="email" placeholder="email"><br><br>
        <input type="password" name="pwd" placeholder="password"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>