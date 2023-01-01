<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="icon" href="./images/icon.png" type = "image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
              function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              };
        </script>
    </head>
    <body style="background-color: rgb(244, 244, 244);">
    <img src="./images/header1.png" alt="Header 1" class="header1">
        <img src="./images/header2.png" alt="Header 2" class="header2">
        <a href="login.php"><input type="button" value="Login" class="login"></a>
        <form action="searchresult.php" method="post">
        <input type="search" class="search" placeholder="Search" name="query">
        <button type="submit" class="search-button">
          <i style="font-size: 1vw;" class="fa fa-search"></i></button>
            </form>
        <a href="homepage.php"><p class="home-title">Home</p></a>
        <img src="./images/cover.png" alt="header2" class="cover">
        <p class="short-text">
        Use Quiztal's practice tests<br>
        and expert solutions made<br>
        by users to improve grades<br>
        and reach goals</p>
        <p class="sign-in-title">Sign up</p>
        <form action="saveuserinfo.php" method="post">
        <input type="text" class="input-2" placeholder="&nbsp;Username" maxlength="15"
        name="username">
        <input type="password" class="input" placeholder="&nbsp;Password" maxlength="8"
        style="top: 22vw;" name="password" id="myInput">
        <input type="text" class="input-2" placeholder="&nbsp;Phone Number" maxlength="15"
        name="phone_number" style="top: 29vw;">
        <p style="font-family: lexend deca;position: absolute;top: 32.5vw;right: 37.5vw;font-size: 1.1vw;">
            Birthday:</p>
        <input type="date" name="birthday" id="birthday" class="input" style="top: 35vw;">
        <input type="email" class="input" placeholder="&nbsp;Email"
        style="top: 41vw;" name="email">
        <input type="submit" value="Sign up" class="login-btn" style="top:48vw;">
        </form>
        <input type="checkbox" onclick="myFunction()" class="show" style="top:26vw">
        <font class="show2" style="top:26.3vw"> 
        Show Password<font>
    </body>
</html>