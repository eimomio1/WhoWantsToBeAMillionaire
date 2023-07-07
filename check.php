<?php
	require_once "common.php";
	session_start();
	
	// Check whether the provided answer is correct.
	$answer = $_POST["answer"];
	$is_correct = check_answer($answer);
	if ($is_correct) $_SESSION["q_num"] += 1;
	else {
		header("Location: lose.php");
		exit();
	}
	
	// Check whether the player has correctly answered all questions.
	if ($_SESSION["q_num"] <= 15) header("Location: question.php");
	else {
		header("Location: winner.php");
		exit();
	}
	
	exit();
?>
