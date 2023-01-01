<?php
session_start();
$usr = $_SESSION['username'];
if ($usr == "") {
    header("Location: login.php");
}
?>
<html>
    <head>
        <header>
            <link rel="stylesheet" href="./style.css" type="text/css">
            <link rel="icon" href="./images/icon.png" type = "image/x-icon">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <?php include 'header.php' ?>
        </header>
        <script language="JavaScript">
            $(document).ready(function() {
                $('#alert3').hide();
                $('#alert1').hide();
                $('#alert2').hide();
                $('#answer1').change(function() {
                    var value = $(this).val();
                    if (value == 'Y') {
                        $('#correct-answer1').val('Y');
                        $('#answer2').prop('disabled', true);
                        $('#answer3').prop('disabled', true);
                    }
                    else {
                        $('#correct-answer1').val('N');
                        $('#answer2').prop('disabled', false);
                        $('#answer3').prop('disabled', false);
                    }
                });
                $('#answer2').change(function() {
                    var value = $(this).val();
                    if (value == 'Y') {
                        $('#correct-answer2').val('Y');
                        $('#answer1').prop('disabled', true);
                        $('#answer3').prop('disabled', true);
                    }
                    else {
                        $('#correct-answer2').val('N');
                        $('#answer1').prop('disabled', false);
                        $('#answer3').prop('disabled', false);
                    }
                });
                $('#answer3').change(function() {
                    var value = $(this).val();
                    if (value == 'Y') {
                        $('#correct-answer3').val('Y');
                        $('#answer2').prop('disabled', true);
                        $('#answer1').prop('disabled', true);
                    }
                    else {
                        $('#correct-answer3').val('N');
                        $('#answer2').prop('disabled', false);
                        $('#answer1').prop('disabled', false);
                    }
                });
            });

            function validate() {
                var answer1 = $("#answer1").val();
                var answer2 = $("#answer2").val();
                var answer3 = $("#answer3").val();
                if ($('#question').val() == "") {
                    $('#alert1').show();
                    return false;
                }
                else {
                    $('#alert1').hide();
                }

                $("textarea[name='answer-txt[]']").each(function() {
                    if ($(this).val() != "") {
                        $('#alert2').hide();
                    }
                    else {
                        $('#alert2').show();
                        return false;
                    }
                });

                if (answer1 == 'N' && answer2 == 'N' && answer3 == 'N') {
                    $('#alert3').show();
                    return false;
                }
                else {
                    $('#alert3').hide();
                }
                return true;
                
            };
            function sendDetails() {
                var valid = validate();
                 
                if (valid == true) {
                     document.create_quiz.action = 'savequizdata.php';
                     document.create_quiz.submit();
                }
            };
        </script>
        <title>Create Quiz</title>
        <br>
        <form action="savequizdata.php"  name="create_quiz" method="post">
            <input type="hidden" name="correct-answer[]" id="correct-answer1" value="N">
            <input type="hidden" name="correct-answer[]" id="correct-answer2" value="N">
            <input type="hidden" name="correct-answer[]" id="correct-answer3" value="N">
        <div class="create-quiz">
            <h1 class="instructions-title">&ensp;Category:</h1>
            &emsp;<select name="category" class="category" style="width: auto;">
                <option value="CAT1">HTML</option>
                <option value="CAT2">CSS</option>
                <option value="CAT3">JavaScript</option>
                <option value="CAT4">SQL</option>
                <option value="CAT5">PHP</option>
                  </select>
            <br><br>
        </div>
        <br><br>
        <div class="create-quiz">
            <h1 class="instructions-title">&ensp;Question:</h1>
            &emsp;<textarea name="question" class="question" id="question" 
            placeholder="Write your question..."></textarea>
            <br><br>
            <p class="alert" id="alert1">&emsp;&nbsp;Please write your question!</p>
        </div>
        <br><br>
        <div class="create-quiz">
            <h1 class="instructions-title">&ensp;Answers:</h1>
            <p style="font-size: 1.2vw;font-family: arial;">
            &emsp;Do remember to select 'Yes' for the correct answer</p>
            &emsp;<textarea name="answer-txt[]" class="answer" 
            placeholder="Write your answer here..." max="50"></textarea>
            <select id="answer1">
                <option value="N">No</option>
                <option value="Y">Yes</option>
            </select>
            <br><br>
            &emsp;<textarea name="answer-txt[]" class="answer" 
            placeholder="Write your answer here..." max="50"></textarea>
            <select id="answer2">
                <option value="N">No</option>
                <option value="Y">Yes</option>
            </select>
            <br><br>
            &emsp;<textarea name="answer-txt[]" class="answer" 
            placeholder="Write your answer here..." max="50"></textarea>
            <select id="answer3">
                <option value="N">No</option>
                <option value="Y">Yes</option>
            </select>
            <br>
            <br><br>
            <p class="alert" id="alert2">&emsp;&nbsp;Please write your answer!</p>
            <p class="alert" id="alert3">&emsp;&nbsp;There must be one correct answer!</p>
            <input type="button" value="Create" onclick="sendDetails()">
            <br><br>
        </div>
        </form>
    </head>
</html>