<?php
	require_once "common.php";
	session_start();
	
	// If the name is left blank, go back a display an error message.
	if (empty($_POST["name"])) {
		$_SESSION["error"] = "Please enter a name.";
		header("Location: login.php");
		exit();
	}
	
	// If the name is already taken, go back a display an error message.
	if (check_name($_POST["name"])) {
		$_SESSION["error"] = "That name already exists. Please enter another name.";
		header("Location: login.php");
		exit();
	}
	
	// Store the player's name in a session variable.
	$_SESSION["name"] = $_POST["name"];
	
	// Go to the first question.
	header("Location: question.php");
	exit();
?>
