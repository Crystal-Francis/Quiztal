<?php
session_start();
$user = $_SESSION['username'];
if ($user == "") {
    header("Location: login.php");
}
   
        $servername = "localhost";
        $username = "crysgzxw_quiztal";
        $pwd = "!ODVeV_NRV2y"; /*!ODVeV_NRV2y*/
        $database = "crysgzxw_quiztal"; 

        $conn = mysqli_connect($servername, $username, $pwd, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $question_id = $_GET['question_id'];
        $sql = "SELECT question_id,question,username FROM questions WHERE question_id=" . $question_id; 
        $result = $conn->query($sql);
        $rows = $result->fetch_array(MYSQLI_ASSOC);


        $question = $rows['question'];


        $sql2 = "SELECT answer,correct_answer,answer_id FROM answers WHERE question_id=" . $question_id;
        $result2 = $conn->query($sql2);
        $rows2 = $result2->fetch_all(MYSQLI_ASSOC);

?>




<html>
    <head>
        <title><?=$question?></title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
    
        <script language="JavaScript">
            function selectAnswer(answerId){
                //alert(answerId);
                document.answerform.answer_id.value=answerId;
                //alert(document.answerform.answer_id.value);
            }
        </script>    

    </head>
    <body style="background-color: #0C1D36;">
    <br>
        <div class="viewing-box">
            <br>
            <font class="view-box-question">&nbsp;
                <?= $question?></font>
            <br><br>
        <form name="answerform" action="verifyanswer.php" method="post">
        <input type="hidden" name="answer_id">
        <input type="hidden" name="question_id" value="<?=$question_id?>">
            
    <?php 
    $top = 16;
    $top2 = 15.83;
    foreach($rows2 as $row2){ 
        
    ?>
        
            <hr class="completed-hr"><br><br>
            <input type="radio" class="select" name="answer"
            onclick="selectAnswer('<?=$row2["answer_id"]?>')"
            style="top: <?=$top2?>vw;">
            <div class="view-box-choice" style="top: <?=$top?>vw;">
            <?=$row2['answer']  ?> 
            </div>
   <?php $top = $top + 7;$top2 = $top2 + 7; } ?> 
            <br><br>
            <?php if ($user != $rows['username']) { ?>
                <input type="submit" value="Submit" class="submit-user-answer">
            </form>
                <?php } else {?>
                    <p class="user-own-question-reminder">You can't do your own question!</p>
                &emsp;&emsp;
                <a href="homepage.php">
                <button type="button" class="user-own-question-button">Ok</button>
                </a>
            <?php }?>
          
        </div>
    </body>
</html>