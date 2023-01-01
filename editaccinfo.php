<?php
session_start();
$usr = $_SESSION['username'];
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
$sql = "SELECT phone_number, email, birthday, about FROM users WHERE username = '" . $usr . "'";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title>Account Information</title>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <?php include 'header.php' ?>
    <body>
        <h1 class="title">Edit Your Account Information:</h1>
        <center>
        <div class="edit-info">
            <font>
                <a href="accountinfo.php"><p class="cross"
                 align="right">&nbsp;&times;&nbsp;</p></a>
                <br><br>
                <form action="updateuserinfo.php" method="post">
            &nbsp;Phone Number:<br>
            &nbsp;<input type="text" class="text" value="<?= $row['phone_number'] ?>" name="phone_number">
            <br><br>
            &nbsp;Birthday:<br>
            &nbsp;<input type="date" class="text" value="<?= $row['birthday'] ?>" name="birthday">
            <br><br>
            &nbsp;Email:<br>
            &nbsp;<input type="text" class="text" value="<?= $row['email'] ?>" name="email">
            <br><br>
            &nbsp;About:<br>
            &nbsp;<textarea style="width: 38vw;" name = "about"
            rows="10" placeholder="Write something about yourself!"><?=$row['about']?></textarea>
            <br><br>
            <center>
            <input type="submit" value="Make Changes" class="make-changes">
            </form>
            </center>
            <br>
        </font>
        </div>
        </center>
    </body>
</html>