<!--https://stackoverflow.com/questions/43673421/track-and-display-how-many-times-users-have-clicked-a-button-on-my-website-->
<?php
session_start();
$question_id = $_POST['question_id'];
$username = $_SESSION['username'];
$answer_id = $_POST['answer_id'];
 
//echo $question_id;
//echo $answer_id;

// Database Connection

$servername = "localhost";
$username1 = "crysgzxw_quiztal";
$pwd1 = "!ODVeV_NRV2y";
$database = "crysgzxw_quiztal";
// Create connection
$conn = mysqli_connect($servername, $username1, $pwd1, $database);
$sql = "SELECT correct_answer FROM answers WHERE answer_id=" . $answer_id;
$conn = mysqli_connect($servername, $username1, $pwd1, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $result = $conn->query($sql);
  $row = $result->fetch_array(MYSQLI_ASSOC);

  $sql3 = "SELECT username FROM questions WHERE question_id=" . $question_id;
  $result3 = $conn->query($sql3);
  $row3 = $result3->fetch_array(MYSQLI_ASSOC);
  $made_by = $row3['username'];

  $sql4 = "SELECT date FROM questions WHERE question_id=" . $question_id;
  $result4 = $conn->query($sql4);
  $row4 = $result4->fetch_array(MYSQLI_ASSOC);
  $made_date = $row4['date'];

  $answer = $row['correct_answer'];
  if ($answer == 'Y') {
    $status = 1;
  }
  else {
    $status = 0;
  }
  $sql2 = "INSERT INTO completed_quizzes(question_id, answer_id, username, 
  made_by, status, date, made_date) " .
  "VALUES (". $question_id . "," . $answer_id . ",'" . $username . "','"
   . $made_by . "'," . $status .  ", now(),'". $made_date . "')";
    $conn->query($sql2);
    echo $sql2;
    if ($status == 1) {
        header ("Location: correct_answer.php?question_id=" . $question_id ."");
    }
    else {
        header ("Location: wrong_answer.php?question_id=" . $question_id . "");
    }
?>
