    <?php
session_start();
$question = $_POST["question"];
//$correct_answer = $_POST["correct-answer"];
$category = $_POST["category"];
$usr = $_SESSION["username"];
$category2 = '';
if ($category == 'CAT1') {
  $category2 = 'HTML';
} elseif ($category == 'CAT2') {
  $category2 = 'CSS';
} elseif ($category == 'CAT3') {
  $category2 = 'JavaScript';
} elseif ($category == 'CAT4') {
  $category2 = 'SQL';
} elseif ($category == 'CAT5') {
  $category2 = 'PHP';
}

// Database Connection
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
  //echo "Connected successfully<br>";""
  $sql = "INSERT INTO questions(question, cat_id, username, date, cat_name2) 
  VALUES('" . $question . "','" .  $category . "','" . $usr . "', now(), '" . $category2 ."')";
  $conn->query($sql);
  $sql2 = "SELECT max(question_id) question_id FROM questions";
  $result = $conn->query($sql2);
  $row = $result -> fetch_array(MYSQLI_ASSOC);
  $question_id = $row['question_id'];
  $correct_answers = array();
  foreach($_POST["correct-answer"] as $correct_answer){
        array_push($correct_answers, $correct_answer);
  }
  $index=0;
  $sql3 = "";
  //$answer = "";
  foreach ($_POST["answer-txt"] as $answer) {
    $sql3 .= "INSERT INTO answers(question_id,answer,correct_answer) 
    VALUES(" . $question_id . ",'" . $answer . "','" . $correct_answers[$index] . "');";
    $index++;
  }
  $conn->multi_query($sql3);
  $conn->close();
?>
  <html>
  <head>
      <title>Saved!</title>
      <link rel="stylesheet" href="style.css">
      <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
      <?php include 'header.php' ?>
      <img style="position: absolute; right: 33vw;top: 10vw;height:27vw;"
   src="images/checkmark.gif" 
  alt="check">
  <p style="position: absolute;right: 36vw;top: 45vw;font-family: 'Open Sans';font-size: 1.5vw;
  ">Your question has been created!</p>
  </head>
</html>