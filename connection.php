<?php

function getConnection(){
    $servername = "localhost";
    $username = "crysgzxw_quiztal";
    $pwd = "!ODVeV_NRV2y";
    $database = "crysgzxw_quiztal";
    
    $conn = mysqli_connect($servername, $username, $pwd, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

    return $conn;

}
?>
