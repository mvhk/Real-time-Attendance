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
    <h1>Feedback by the student</h1>
    <a href="feedbackt.php">Give Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a><br><br><br>

    <table>
        <tr>
            <th>Student Id</th>
            <th>Feedback</th>
        </tr>
        <?php
        if(isset($_SESSION['email'])){
            $curr = $_SESSION['email'];
            $result = $conn->query("SELECT * FROM feedbackstu where tid = '$curr'");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<tr><td>'.$row['id'].'</td><td>'.$row['feed'].'</td></tr>';
                }
            }
            else{
                echo "NO student updated feedback";
            }
        }
        ?>
    </table>
</body>
</html>