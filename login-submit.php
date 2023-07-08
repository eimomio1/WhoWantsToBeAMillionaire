<?php
require __DIR__ . "/common.php" ;
get_header();
$data = file("./userdata/playerinfo.txt", FILE_SKIP_EMPTY_LINES);

//checking to see if there is a name submited
if (count($_POST) === 2) {
?><br><br><?php
    foreach($data as $value){
    $value = explode(",",$value);
//checks to see if the name value is the same
        if(in_array($_POST['username'],$value)){
            //checks if password matches
            if($value[2] == $_POST["password"]){
                //if username and password are correct
                ?>
                <div style = 'text-align:center'>
                <h2>Username and password found!</h2><br>
                <a href = 'question.php'>Click here to start the game!</a>
                
                <?php
                exit();
            }
            else{
                echo 'invalid password';
                break;
            }
        }
        //if username is not found
    else{
        echo "h";
        continue;
    }
    }
    echo "Username not found";
    exit();
}
//checking if the user input did not fail
else{
    echo "Please fill out all inputs!";
    ?><a href = 'login.php'>Try Again</a>

    <?php
}
?>