<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="question.css" rel="stylesheet">
		<title>Who Wants to Be a Millionaire?</title>
		
		<!-- Javascript for timer -->
		<script>
			// Go to login.php when the timer runs out
			function redirectPage() {
				window.location.href = "lose.php";
			}
			// Start the timer when the page is loaded
			window.onload = function() {
				var seconds = 60;
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
		<?php
			// If new game, set the question number to 1.
			session_start();
			if (!isset($_SESSION["q_num"])) $_SESSION["q_num"] = 1;
			
			// Get the question data.
			require_once "common.php";
			$q_num = $_SESSION["q_num"];
			$category = $_SESSION["category"];
			$q = get_question($q_num, $category);
			$_SESSION["q_id"] = $q[5];
		?>
		
		<!-- Scoreboard -->
		<?php get_scoreboard($q_num); ?>
		
		<!-- Title and banner -->
		<div class="gameName">
			<h1>Who Wants To Be A Millionaire</h1>
		</div>
		<img src="./millionaire.avif" class="logo" id="circle_mask">
		<br>
		
		<!-- Timer -->
		<div class="timerBox">
			<p>Time remaining: <span id="timer">60</span> seconds</p>
		</div>
		
		<!-- Answer form -->
		<div>
			<form action="check.php" method="POST">
				<table class="questionTable">
					
					<!-- Question -->
					<tr style="height:100px;">
						<td colspan=2 class="questionTable"><?= $q[0] ?></td>
					</tr>
					
					<!-- Answer buttons -->
					<tr>
						<td>
							<button name="answer" value="<?= $q[1] ?>"type="submit"
							class="questionTable button"><?= "A: {$q[1]}" ?></button>
						</td>
						<td>
							<button name="answer" value="<?= $q[2] ?>"type="submit"
							class="questionTable button"><?= "B: {$q[2]}" ?></button>
						</td>
					</tr>
					<tr>
						<td>
							<button name="answer" value="<?= $q[3] ?>"type="submit"
							class="questionTable button"><?= "C: {$q[3]}" ?></button>
						</td>
						<td>
							<button name="answer" value="<?= $q[4] ?>"type="submit"
							class="questionTable button"><?= "D: {$q[4]}" ?></button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
