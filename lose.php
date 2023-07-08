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
		
		<img src="./millionaire.avif" alt="logo" class="banner" id="circle_mask">
		<p>Your winnings:</p>
		
		<!-- Player name and score -->
		<p class="ending"><?= "\${$score}" ?></p>
		<p>Thanks for playing, <?= $name ?>!</p>
		
		<!-- Link to login -->
		<p><a href="login.php">Back to login</a></p>
	</body>
</html>
