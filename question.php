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
			$_SESSION["category"] = "general"; // Fixed category for now.
			
			// Get the question data.
			require_once "common.php";
			$q_num = $_SESSION["q_num"];
			$category = $_SESSION["category"];
			$q = get_question($q_num, $category);
			$_SESSION["q_id"] = $q[5];
		?>
		
		<!-- Title and banner -->
		<div class="gameName">
			<h1>Who Wants To Be A Millionaire</h1>
		</div>
		<img src="./millionaire.avif" class="logo">
		<br>
		<h2 class="money"><?= "\${$q[6]}" ?></h2>

        <!-- Timer -->
		<div class="timerBox">
			<p>Time remaining: <span id="timer">60</span> seconds</p>
		</div>
		
		<div>
			<table class="questionTable">
				
				<!-- Question -->
				<tr style="height:100px;" class="questionTable">
					<td colspan=2 class="questionTable"><?= $q[0] ?></td>
				</tr>
				
				<!-- Answers -->
				<tr class="questionTable">
					<td class="questionTable"><?= "A: {$q[1]}" ?></td>
					<td class="questionTable"><?= "B: {$q[2]}" ?></td>
				</tr>
				<tr class="questionTable">
					<td class="questionTable"><?= "C: {$q[3]}" ?></td>
					<td class="questionTable"><?= "D: {$q[4]}" ?></td>
				</tr>
			</table>
		</div>
		
		<!-- Answer form -->
		<div class="submitAnswer">
			<form action="check.php" method="post">
				<p>Select an answer:
					<select name="answer" size="1">
						<option value="<?= $q[1] ?>">A</option>
						<option value="<?= $q[2] ?>">B</option>
						<option value="<?= $q[3] ?>">C</option>
						<option value="<?= $q[4] ?>">D</option>
					</select>
					<input type="submit" value="SUBMIT" class="submit">
				</p>
			</form>
		</div>
	</body>
</html>
