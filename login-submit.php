<?php
//checking to see if there is a name submited
if (empty($_POST["name"])) {
    //if no name is submited then we return this
    echo "Please enter the name";
    return $failed;
}
//checking to see if there is a unique player name
if (check_name($_POST["name"])) {
    //if there is no unique player name we return this
    echo "User name already exists, please enter another name";
    return $failed;
}
//checking if the user input did not fail
if(true){
    //posting the players name into the players.txt
    $userData = $_POST['name']
    file_put_contents("players.txt", "\n" . $userData, FILE_APPEND);
}
?>