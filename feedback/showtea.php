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
<h2>Feedback by the Professor</h2>
<a href="feedbacks.php">Give Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a><br><br>
    <table>
        <tr>
            <th>Teacher Id</th>
            <th>Feedback</th>
        </tr>
        <?php
        if(isset($_SESSION['id'])){
            $curr = $_SESSION['id'];
            $result = $conn->query("SELECT * FROM feedbacktea where sid = '$curr'");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<tr><td>'.$row['id'].'</td><td>'.$row['feed'].'</td></tr>';
                }
            }
            else{
                echo "NO Teacher updated feedback";
            }
        }
        ?>
    </table>
</body>
</html>