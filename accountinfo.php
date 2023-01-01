<html>
    <head>
        <?php include 'header.php' ?>
        <title>Account Information</title>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <link rel="icon" href="./images/icon.png" type = "image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        // Create connection
        $conn = mysqli_connect($servername, $username, $pwd, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $sql = "SELECT username, birthday, phone_number, email, join_date, about
          FROM users
          WHERE username = '" . $user . "'";
          //echo "Connected successfully<br>";
          
          $result = $conn->query($sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
           
        ?>
    </head>
    <body>
        <p class="title-1">Account Information:</p>
        <div class="accinfobox">
            <p style="font-size:3.5vw;position:absolute">&ensp;<?=$row['username']?></p>
            <br><br><br><br><br><br><br>
            &ensp;&ensp;&ensp;
            <hr>
            <p style="font-size:1.1vw">&ensp;&ensp;&ensp;Phone Number: <?=$row['phone_number']?></p>
            <p style="font-size:1.1vw">&ensp;&ensp;&ensp;Birthday: <?=$row['birthday']?></p>
            <p style="font-size:1.1vw">&ensp;&ensp;&ensp;Email: <?=$row['email']?></p>
            <p style="font-size:1.1vw">&ensp;&ensp;&ensp;About:<br>
               &ensp;&ensp;&ensp;<?=$row['about']?></p>
               <p style="font-size:1.1vw">&ensp;&ensp;&ensp;Join date: <?=$row['join_date']?></p>
            <hr>
            &ensp;&ensp;&ensp;
            <a href="createquiz.php">
                <input type="button" value="Create Quiz" class="log-out-btn"  style="width: auto"></a>
                &ensp;&ensp;&ensp;
                <a href="editaccinfo.php"><button style="width: auto" class="log-out-btn">
                Edit Account Information
                </button></a>
                    &ensp;&ensp;&ensp;
                <a href="login.php"><input type="button" value="Log out" style="width: auto" class="log-out-btn"></a>
        <br>
        <hr>
        <br><br>
    </body>
</html>