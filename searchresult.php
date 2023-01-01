<?php
        require "connection.php";
        include 'header.php';
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $query = $_POST['query'];
        session_start();
        $usr = $_SESSION['username'];
        /*$servername = "localhost";
        $username = "crystal";
        $pwd = "Crystal@123";
        $database = "quiztal";
        
        $conn = mysqli_connect($servername, $username, $pwd, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
        */

        $conn = getConnection();  

        $sql = "SELECT * FROM questions WHERE question LIKE '%". $query . "%' OR cat_name2 LIKE '%". $query . "%'";
        //select * from questions where question like '%html%' or cat_name2 like '%html%';
        /*echo $sql;*/
        $result = $conn->query($sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $sql5 = "select count(*) records,a.question_id,(select sum(status) from completed_quizzes where question_id=a.question_id) status from completed_quizzes a, " .
        "questions b WHERE a.question_id=b.question_id and b.question LIKE '%". $query . "%' OR b.cat_name2 LIKE '%". $query . "%' group by a.question_id";
        $result6 = $conn->query($sql5);
        $rows6 =  $result6->fetch_all(MYSQLI_ASSOC);
        foreach($rows6 as $row6){
            $percentage[$row6['question_id']] = $row6['records'];
            $total_correct[$row6['question_id']] = $row6['status'];
        }
     
?>
<html>
    <head>
<title><?=$query?></title>
    </head>
    <body>
    <p class="title-1">Search reults for '<?=$query?>' :</p>
        <h1 class="no-results">No results for <?=$query?></h1>
    <center>
    <?php foreach($rows as $row) {  ?>
        <a href="viewquestion.php?question_id=<?= $row['question_id']?>"
        style="text-decoration:none">
        <div class="quiz" style="height: auto;">
            <br>
            <h1 style="font-size: 2.5vw">&ensp;<?=$row['question']?></h1>
            <hr>
            <p style="font-size:1.2vw">&ensp;Type: <?=$row['cat_name2']?></p>
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