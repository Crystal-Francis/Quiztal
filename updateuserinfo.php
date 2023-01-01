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
$birthdate = $_POST['birthday'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$about = $_POST['about'];

$sql = "UPDATE users SET birthday = '" . $birthdate . "', email = '" . $email . "', 
phone_number = '" . $phone . "', about = '" . $about . "' WHERE username = '" . $usr . "'";
$result = $conn->query($sql);
if ($result == 1) {
    header('Location: updatesuccess.php');
} else {
    header('Location: updatefail.php');
}
?>