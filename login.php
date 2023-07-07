<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet">
		<title>Who Wants to Be a Millionaire?</title>
	</head>
	<body>
		
		<!-- Header image and text -->
		<div>
			<img src="./millionaire.avif" alt="logo" class="banner"/>
			<br>
		</div>
		<p class="bannerText"><strong>Where you can win to be a millionaire!<strong></p>
		
		<!-- Main form -->
		<div class="options">
			<form action="login-submit.php" method="POST">
				<fieldset>
					<legend><strong>New Game:</strong></legend>
					
					<!-- Name -->
					<strong>Name:</strong>
					<input type="text" name="name" size="16">
					<br>
					
					<!-- Start game -->
					<div class="container">
						<input class="start-button" type="submit" value="Start Game" />
					</div>
				</fieldset>
			</form>
		</div>
		<br><br>
		
		<!-- Leaderboard -->
		<div id="scroll-container">
			<div id="scroll-text">
				<?php
					require_once "common.php";
					get_leaderboard_data();
				?>
			</div>
		</div>
		
		<!-- Error messages -->
		<?php
		
			// Print any error messages from login-submit.php.
			session_start();
			if (isset($_SESSION["error"])) {
				$error_message = $_SESSION["error"];
				echo "<script>alert('{$error_message}')</script>";
			}
			
			// Clear the session.
			session_destroy();
		?>
	</body>
</html>
