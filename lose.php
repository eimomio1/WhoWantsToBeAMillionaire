<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="endGame.css" rel="stylesheet">
		<title>Who Wants to Be a Millionaire?</title>
	</head>
	<body>
		<?php
			
			// Save the player's score.
			session_start();
			$name = $_SESSION["name"];
			$q_num = $_SESSION["q_num"];
			require_once "common.php";
			$score = get_score($q_num - 1);
			save_score($name, $score);
			
			// Clear the session.
			session_destroy();
		?>
		<div>
			<img src="./millionaire.avif" alt="logo" class="banner">
			<br>
			<p class="ending"><strong>You Lost.<strong></p>
			
			<!-- Player name and score -->
			<p class="bannerText"><?= "{$name}<br>\${$score}" ?></p>
			
			<!-- Link to login -->
			<p class="homeLink"><a href="login.php">Back to login</a></p>
		</div>
	</body>
</html>
