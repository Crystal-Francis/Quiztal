<?php
session_start();
$usr = $_SESSION['username'];
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <link rel="icon" href="./images/icon.png" type = "image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <img src="./images/header1.png" alt="Header 1" class="header1">
        <img src="./images/header2.png" alt="Header 2" class="header2">
        <?php if($usr == "") { ?>
        <a href="signup.php"><input type="button" value="Sign up" class="sign-in"></a>
        <a href="login.php"><input type="button" value="Login" class="login"></a>
        <?php }else { ?>
        <a href="accountinfo.php"><p class="usr"><?=$usr?></p></a>
        <?php } ?>
        <form action="searchresult.php" method="post">
        <input type="search" class="search" placeholder="Search" name="query">
        <button type="submit" class="search-button"><i style="font-size: 1vw;"
         class="fa fa-search"></i></button>
        </form>
        <a href="homepage.php"><p class="home-title">Home</p></a>
    </body>
</html>