<?php
include "../student/connect.php";
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
<body>
    <?php
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
        <input type="email" name="email" placeholder="email"><br><br>
        <input type="password" name="pwd" placeholder="password"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>