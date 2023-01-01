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

        $conn = mysqli_connect($servername, $username, $pwd, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $question_id = $_GET['question_id'];
        $sql = "SELECT question_id,question FROM questions WHERE question_id=" . $question_id; 
        $result = $conn->query($sql);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        $question = $rows['question'];
        $sql2 = "SELECT answer,correct_answer FROM answers WHERE question_id=" . $question_id . " AND correct_answer='Y'";
        $result2 = $conn->query($sql2);
        $rows2 = $result2->fetch_array(MYSQLI_ASSOC);
        $correct_answer = $rows2['answer'];
        ?>
<html>
    <head>
        <title>Oops...</title>
        <link rel="stylesheet" href="./style.css">
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
    </head>
    <body style="background-color:#0C1D36">
        <br>
        <center>
        <h1 class="answer-verification-title">
            Oops your answer is wrong...</h1>
            <hr class="answer-verification-hr"> 
            <p class="correct-answer-display-title">
                Correct Answer:
            </p>
            <div class="correct-answer-display">
                <p class="correct-answer-display-question">
                <?=$question;?>
                </p>
                <hr class="answer-verification-hr">
                <p class="correct-answer-display-correct-answer">
                <?=$correct_answer;?>
                </p>
            </div><br><br><br>
            <a href="homepage.php">
            <button class="answer-verification-button">Continue</button>
            </a>
            </center>
    </body>
</html>