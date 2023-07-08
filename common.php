<?php
	function check_name($name) {
	
		// Get all player data and store it in an array.
		$player_list = explode("\n", file_get_contents('./players.txt'));
		foreach ($player_list as $players) {
			$player = explode(",", $players);
			
			// If the name is found, then the name already exists.
			if ($player[0] == $name) {
				return true;
			}
		}
		return false;
	}
	
	
	function get_leaderboard_data() {
		
		// Get all player data and store it in an array.
		$player_list = explode("\n", file_get_contents('./players.txt'));
		$players = [];
		foreach ($player_list as $player) {
			array_push($players, explode(",", $player));
		}
		
		// Sort the player data by score in descending order.
		usort($players, function ($a, $b) {
			return $b[1] - $a[1];
		});
		
		// Output the top 10 players as separate lines of text.
		$top_10 = array_slice($players, 0, 10);
		for ($i = 0; $i < 10; $i++) {
			$name = $top_10[$i][0];
			$score = $top_10[$i][1];
			echo "{$name}, \${$score}<br>";
		}
	}
	
	
	function get_question_list($q_num, $category) {
		
		// Determine the difficulty based on the question number.
		if ($q_num <= 5) $diff = "easy";
		else if ($q_num <= 10) $diff = "medium";
		else if ($q_num <= 15) $diff = "hard";
		
		// Pull the appropriate list of questions.
		// This is based on difficulty and category
		$file = "questions/{$category}_{$diff}.csv";
		return array_map("str_getcsv", file($file));
	}
	
	
	function get_question($q_num, $category) {
		/*
		This function accepts the following arguments:
			$q_num (the question number): an integer in [1, 15]
			$category: "general", "comp_sci", or "video_games"
		
		This function returns an array with the following at each key:
			[0]: Question
			[1]: Answer A
			[2]: Answer B
			[3]: Answer C
			[4]: Answer D
			[5]: Question ID
			[6]: Question dollar amount
		
		The question ID is used to check whether the question has been played
		and also to check for the correct answer (in another function).
		
		The question is pulled randomly from a list of 50 questions.
		(Unless the category is comp_sci. Those lists have 34 questions.)
		The list depends on both the category and the difficulty.
		
		The difficulty depends on the question number:
			[1, 5]: easy
			[6, 10]: medium
			[11, 15]: hard
		*/
		
		// If new game, reset the array of played questions.
		session_start();
		if ($q_num == 1) $_SESSION["played"] = [];
		
		// Pull the appropriate list of questions.
		$q_list = get_question_list($q_num, $category);
		
		// Pull a random unplayed question from the list.
		if ($category == "comp_sci") $len = 33; else $len = 49;
		$played = true;
		while ($played) {
			$q = $q_list[rand(0, $len)];
			if (!in_array($q[5], $_SESSION["played"])) {
				array_push($_SESSION["played"], $q[5]);
				$played = false;
			}
		}
		
		// Get the appropriate dollar amount.
		$amt = get_score($q_num);
		
		// Randomize the order of the answers.
		$answers = [$q[1], $q[2], $q[3], $q[4]];
		shuffle($answers);
		return array_merge([$q[0]], $answers, [$q[5], $amt]);
	}
	
	
	function check_answer($answer) {
		
		// Pull the appropriate question list.
		session_start();
		$category = $_SESSION["category"];
		$q_num = $_SESSION["q_num"];
		$q_list = get_question_list($q_num, $category);
		
		// Locate the question by ID.
		$q_id = $_SESSION["q_id"];
		foreach ($q_list as $q) {
			if ($q[5] == $q_id) {
				
				// If the answer matches, return true.
				if ($q[1] == $answer) return true;
				else return false;
			}
		}
	}
	
	
	function get_score($q_num) {
		
		// Depending on the current question number,
		// return the appropriate dollar amount score.
		switch ($q_num) {
			case 0: $amt = 0; break;
			case 1: $amt = 100; break;
			case 2: $amt = 200; break;
			case 3: $amt = 300; break;
			case 4: $amt = 500; break;
			case 5: $amt = 1000; break;
			case 6: $amt = 2000; break;
			case 7: $amt = 4000; break;
			case 8: $amt = 8000; break;
			case 9: $amt = 16000; break;
			case 10: $amt = 32000; break;
			case 11: $amt = 64000; break;
			case 12: $amt = 125000; break;
			case 13: $amt = 250000; break;
			case 14: $amt = 500000; break;
			case 15: $amt = 1000000; break;
		}
		return $amt;
	}
	
	
	function get_scoreboard($q_num) {
		echo "<table class='scoreboard'>";
		for ($i = 15; $i > 0; $i--) {
			$score = get_score($i);
			if ($i != $q_num) echo "<tr>";
			else echo "<tr class='score_hl'>";
			echo "<td>{$i}</td><td>\${$score}</td></tr>";
		}
		echo "</table>";
	}
	
	
	function save_score($name, $score) {
		
		// Write the player's name and score to players.txt.
		$result = "\n{$name},{$score}";
		$file = fopen('players.txt', 'a');
		fwrite($file, $result);
		fclose($file);
	}

    function getuserdata($username)
{
    $user_info = explode("\n", file_get_contents('./players.txt'));
    foreach ($user_info as $sub_user_info) {
        $name_parts = explode(",", $sub_user_info);
        if ($name_parts[0] == $username) {
            return $name_parts;
        }
    }
}

    function generate_login(string $loc){
        ?>
        <!DOCTYPE html>
        <html>
        <div class="options">
        <form action="<?php echo $loc ?>" method="post">
            <fieldset>
                <legend><strong>Login:</strong></legend>
                <!--Name-->
                <strong>Name:</strong>
                <input type="text" name="name" size="16">
                <br />
                <br />
                <strong>Password:</strong>
                <input type ="text" name = "password">
                </br>
                </br>
                <!-- Category -->
					      <strong>Category:</strong>
					      <select name="category">
					    	<option value="general">General Knowledge</option>
					    	<option value="comp_sci">Computer Science</option>
					    	<option value="video_games">Video Games</option>
					</select>
					<br>

					<!-- Start game -->
					<div class="container">
						<input class="start-button" type="submit" value="Start Game" />
					</div>
            </fieldset>
            </br>
        
            <fieldset>
            <strong>No account?</strong></br>
            <a href = 'signup.php'>Create an Account</a>
            </fieldset>
    </form>
            </html>



    <?php
    }
    function get_header(){
        ?>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <meta charset="utf-8">
    <title>Who Wants to be a millionaire</title>
</head>

<body>
    <div>
        <img src="./millionaire.avif" alt="logo" class="banner"/>
        <br />
    </div>

    
    <?php

    }


?>
