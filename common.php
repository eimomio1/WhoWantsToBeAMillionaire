<?php

    function check_name($username) {
        $user_info = explode("\n", file_get_contents('./players.txt'));
        foreach ($user_info as $sub_user_info) {
            $name_parts = explode(",", $sub_user_info);
            if ($name_parts[0] == $username) {
                return true;
            }
        }
        return false;
    }

    function getuserdata($username) {
        $user_info = explode("\n", file_get_contents('./players.txt'));
        foreach ($user_info as $sub_user_info) {
            $name_parts = explode(",", $sub_user_info);
            if ($name_parts[0] == $username) {
                return $name_parts;
            }
        }
    }

	function get_question($q_num, $category) {
		/*
		This function accepts the following arguments:
			$q_num (the question number): an integer in [1, 15]
			$category: "general", "comp_sci", or "video_games"
		
		This function returns an array with the following strings at each key:
			[0]: Question
			[1]: Answer A
			[2]: Answer B
			[3]: Answer C
			[4]: Answer D
			[5]: Correct answer (either "A", "B", "C", or "D")
		
		The question is pulled randomly from a list of 50 questions.
		(Unless the category is comp_sci. Those lists have 34 questions.)
		The list depends on both the category and the difficulty.
		
		The difficulty depends on the question number:
			[1, 5]: easy
			[6, 10]: medium
			[11, 15]: hard
		*/
		
		// Pull a random question from the appropriate list.
		if ($q_num <= 5) $diff = "easy";
		else if ($q_num <= 10) $diff = "medium";
		else if ($q_num <= 15) $diff = "hard";
		$file = "questions/{$category}_{$diff}.csv";
		$q_list = array_map("str_getcsv", file($file));
		if ($category == "comp_sci") $n = 33; else $n = 49;
		$q = $q_list[rand(0, $n)];
		
		// Randomize the placement of the correct answer.
		switch (rand(1, 4)) {
			case 1: return [$q[0], $q[1], $q[2], $q[3], $q[4], "A"];
			case 2: return [$q[0], $q[2], $q[1], $q[3], $q[4], "B"];
			case 3: return [$q[0], $q[2], $q[3], $q[1], $q[4], "C"];
			case 4: return [$q[0], $q[2], $q[3], $q[4], $q[1], "D"];
		}
	}
?>
