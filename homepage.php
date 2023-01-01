<?php
session_start();
$usr = $_SESSION['username'];
$servername = "localhost";
$username = "crysgzxw_quiztal";
$pwd = "!ODVeV_NRV2y";
$database = "crysgzxw_quiztal";

$conn = mysqli_connect($servername, $username, $pwd, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


$sql = "SELECT min(question_id) min FROM questions";
$result = $conn->query($sql);
$minrow = $result->fetch_array();
$min = $minrow['min'];

$sql2 = "SELECT max(question_id) max FROM questions";
$result = $conn->query($sql2);
$maxrow = $result->fetch_array();
$max = $maxrow['max'];

$val1 = rand($min,$max);
$val2 = rand($min,$max);
$val3 = rand($min,$max);

$arr = array($val1,$val2,$val3);

$sql3 = "SELECT question_id,question,username,date," .
        "(SELECT cat_name FROM category WHERE cat_id=a.cat_id) type  FROM questions a " .
        "WHERE question_id in(" . $arr[0] . "," . $arr[1] . "," . $arr[2] . ")";
$result2 = $conn->query($sql3);
$rows = $result2->fetch_all(MYSQLI_ASSOC);
 

$sql5 = "select count(*) records,question_id,(select sum(status) from completed_quizzes where question_id=a.question_id) status from completed_quizzes a where " .
" question_id in(" . $arr[0] . "," . $arr[1] . "," . $arr[2] . ") group by question_id";
$result6 = $conn->query($sql5);
$rows6 =  $result6->fetch_all(MYSQLI_ASSOC);
foreach($rows6 as $row6){
    $percentage[$row6['question_id']] = $row6['records'];
    $total_correct[$row6['question_id']] = $row6['status'];
}




?>
<html>
    <head>
        <title>Quiztal</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <link rel="icon" href="./images/icon.png" type = "image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <img src="./images/header1.png" alt="Header 1" class="header1">
        <img src="./images/header2.png" alt="Header 2" class="header2">
        <?php if($usr == "") { ?>
        <a href="signup.php"><input type="button" value="Sign up" class="sign-in"></a>
        <a href="login.php"><input type="button" value="Login" class="login"></a>
        <?php }else { ?>
        <a href="accountinfo.php"><p class="usr"><?=$usr?></p></a>
        <?php } ?>


        <form action="searchresult.php" method="post">
        <input type="search" class="search" placeholder="Search" name="query">
        <button type="submit" class="search-button">
          <i style="font-size: 1vw;" class="fa fa-search"></i></button></form>

          
        <br><br>
        <p class="title-1">Quizzes:</p>
        <center>
        <?php foreach($rows as $row){ ?>
        <a href="viewquestion.php?question_id=<?= $row['question_id']?>"
        style="text-decoration:none">
          <div class="quiz" style="height: auto;">
            <br>
            <h1 style="font-size: 2.5vw">&ensp;<?=$row['question']?></h1>
            <hr>
            <p style="font-size:1.2vw">&ensp;Type: <?=$row['type']?></p>
            <p style="font-size:1.2vw">&ensp;Created by: <?=$row['username']?></p>
            <p style="font-size:1.2vw">&ensp;<?=$row['date']?></p>
            <br>
          </div>
        </a>
        <br><br><br>
        <?php } ?>

        </center>
    </body>
</html>