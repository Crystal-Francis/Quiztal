<?php
        session_start();
        $_SESSION['user_exists']= "";
        $user = $_POST['username'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone_number'];
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
          //echo "Connected successfully<br>";
          $sql2 = "SELECT username FROM users WHERE username = '". $user . "'"; 
          $sql = "INSERT INTO users (username, password, birthday, email, phone_number, join_date, about) " . 
                  "VALUES ('" . $user . "','" . $password . "','" . $birthdate . "','" . $email . "','" . 
                  $phone . "', now(), 'Nothing yet!')";
          #echo $sql . "<br>";
          $result = $conn->query($sql2);
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;

          if ($num_rows > 0) {
            $_SESSION ['user_exists'] = "Selected username " . $user . " already exists";
            header('Location: signup.php');
          }
          if ($conn->query($sql) == 1) {
            header('Location: sign_up_success.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            $conn->close(); 
        ?>