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
		
    <!--main area-->
<?php
require __DIR__ . "/common.php" ;
?>
<div>
<?php
generate_login('login-submit.php');
?>
</div>
<br>
    	<!-- Leaderboard -->
		<div id="scroll-container" style = "position:static">
			<div id="scroll-text">
				<?php
					get_leaderboard_data();
				?>
			</div>
		</div>


</body>
</html>
