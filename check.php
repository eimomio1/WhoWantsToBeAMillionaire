<?php
	require_once "common.php";
	session_start();
	
	// If the provided answer is correct,
	// increment the current question number.
	$answer = $_POST["answer"];
	$is_correct = check_answer($answer);
	if ($is_correct) $_SESSION["q_num"] += 1;
	
	// Otherwise, go the lose page.
	else {
		header("Location: lose.php");
		exit();
	}
	
	// If the player has not correctly answered 15 questions,
	// go to the next question.
	if ($_SESSION["q_num"] <= 15) header("Location: question.php");
	
	// Otherwise, go to the winner page.
	else {
		header("Location: winner.php");
		exit();
	}
	
	exit();
?>
