<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./images/icon.png" type = "image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
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
        <img src="./images/cover.png" alt="header2" class="cover">
        <p class="short-text" style="top:23vw">
        Use Quiztal's practice tests<br>
        and expert solutions made<br>
        by users to improve grades<br>
        and reach goals</p>
        <h1 class="login-title">Login</h1>
        <form action="verifylogin.php" method="post">
        <input type="text" class="input" placeholder="&nbsp;Username" maxlength="15"
        name="username">
        <input type="password" class="input" placeholder="&nbsp;Password" maxlength="8"
        style="top: 26vw;" name="password" id="myInput">
        <input type="submit" value="Login" class="login-btn">
        </form>
        <p class="option">Don't have an account? <a href="signup.php">Sign up!</a> it's free</p>
        <input type="checkbox" onclick="myFunction()" class="show">
        <font class="show2">
        Show Password<font>
    </body>
</html>