<?php
    $answer = $_POST['answer'];
    $check = strcmp($answer, "true");
    // $username = $_SESSION["username"];
    // $password = $_SESSION["password"];
    $score = $_SESSION["score"];
    $amount = $_SESSION["amount"];

    if($check != 0){
        //checks the post
        $lines = file("player.txt");
        $result = ' ';

        foreach($lines as $line){
            //updating the scores
            $data = explode(',', $line);
            if($data[0] == $username){
                $result .= $username . "," . $password . "," . $score . "," . $amount . "\n";
            }
            else{
                $result .= $line;
            }
        }
        //puting the score into the player text
        file_put_contents('player.txt', $result);
        //going to the lost page when u lose
        header("Location: lose.php");
        exit;

    }
?>