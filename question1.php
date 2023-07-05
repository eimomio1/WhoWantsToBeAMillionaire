<!DOCTYPE html>
<?php
    session_start();
    $score = 0;
    $_SESSION["score"] = $score;
    $_SESSION["amount"] = 0;
?>
<html>
<head>
    <title>Question 1</title>
    <link href="question.css"  rel="stylesheet">
    <script>
      // Function to redirect the page
      function redirectPage() {
        window.location.href = "login.php"; // Replace "login.php" with the desired redirection URL
      }

      // Start the timer when the page is loaded
      window.onload = function() {
        var seconds = 25;
        var timerElement = document.getElementById("timer");

         // Function to update the timer
  function updateTimer() {
    seconds--;
    timerElement.textContent = seconds;

 
    if (seconds <= 0) {
      clearInterval(timerInterval);
      redirectPage();
    }
  }

  // Update the timer every second
  var timerInterval = setInterval(updateTimer, 1000);
};
    </script>
</head>
<body>
    <!--Title and banner-->
    <div class="gameName">
        <h1>Who Wants To Be A Millionaire</h1>  
    </div>
    <img src="./millionaire.avif" class="logo"/>
    <br /> 

    <h2 class="money">$100 Point!</h2>
    <div>
        <table class="questionTable">
            <!--The question-->
            <tr style="height:100px;" class="questionTable">
                <td colspan=2 class="questionTable">What is the Celsius equivalent of 77 degrees Fahrenheit?</td>
            </tr>
            <!--The Answer Choices-->
            <tr class="questionTable">
                <td class="questionTable">A: 15</td>
                <td class="questionTable">B: 20</td>
            </tr>
            <tr class="questionTable">
                <td class="questionTable">C: 25</td><!--Correct answer-->
                <td class="questionTable">D: 30</td>
            </tr>
        </table>
    </div>
    <div class="submitAnswer">
        <form action="question2.php" method="post">
            <p>Select the answer:
                <select name="answer" size="1">
                    <option value="false">A<option>
                    <option value="false">B<option>
                    <option value="true">C<option>
                    <option value="false">D<option>
                </select>
                <input type="submit" value="Submit Answer" class="submit">
            </p>
        </form>
    </div>
    <div class="timerBox">
        <p>Time remaining: <span id="timer">25</span> seconds</p>
    </div>
</body>
</html>





