<?php
session_start();
$user = $_SESSION['username'];
if ($user == "") {
    header("Location: login.php");
}

$servername = "localhost";
$username = "crysgzxw_quiztal";
$pwd = "!ODVeV_NRV2y";
$database = "crysgzxw_quiztal";
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
$sql = "SELECT a.made_by, a.made_date, b.question, b.cat_name2 FROM completed_quizzes a, questions b
 WHERE a.question_id = b.question_id AND a.username ='" . $user . "'";
//select * from completed_quizzes where username = 'Crystal Francis'
$result = $conn->query($sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<html>
    <head>
        <?php include 'header.php' ?>
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <title>Quizzes completed by <?=$user?></title>
    </head>
    <body style="background-color: #0C1D36;">
    <br><br>
        <u class="complete-title">Quizzes completed by <?=$user?>:</u>
        <br><br><br>
        <center><br><br>
            <h1 style="font-family: arial;color: #F9CC0B;z-index: -100;position: absolute;
            left: 33vw;font-size: 2vw;
            ">You have not done any Quizzes!</h1>
            <?php foreach($row as $rows){ ?>
        <div class="quiz" style="font-family: arial;">
        <br>
            <h1 style="font-size: 2.5vw">&ensp;<?=$rows['question']?></h1>
            <hr>
            <p style="font-size:1.2vw">&ensp;Type: <?=$rows['cat_name2']?></p>
            <p style="font-size:1.2vw">&ensp;Created by: <?=$rows['made_by']?></p>
            <p style="font-size:1.2vw">&ensp;<?=$rows['made_date']?></p>
        </div>
        <br><br>
        <?php } ?>
        </center>
    </body>
</html>