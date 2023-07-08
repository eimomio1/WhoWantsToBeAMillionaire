<?php
require __DIR__ . "/common.php" ;
session_start();
get_header();

$data = file("./userdata/playerinfo.txt", FILE_SKIP_EMPTY_LINES);
$_SESSION["category"] = $_POST["category"];
$_SESSION["name"] = $_POST["name"];
// Checking if there is a name submitted
if (count($_POST) === 3) {
    ?><br><br><?php

    foreach($data as $value){
        echo "iterated \n";
        
        // Splitting each line of data into an array
        $value = explode(",",$value);
        print_r($value);

        // Comparing submitted username with current value
        echo $_POST["name"];
        if(in_array($_POST["name"], $value)){
            // Checking if the password matches
            if($value[1] == $_POST["password"]){
                // If username and password are correct, redirect to question.php
                ?>
                <div style='text-align:center'>
                    <h2>Username and password found!</h2><br>
                <?php

                header("Location: question.php");
                exit();
            }
            else{
                // Invalid password
                ?>
                <div style='text-align:center'>
                    <h2>Invalid Password!</h2><br>
                    <a href="login.php">Try again!</a>
                <?php
                exit();
            }
        }
        // If username is not found, continue to the next iteration
        else{
            continue;
        }
    }
    
    // If the loop completes without finding a matching username
    ?>
    <div style='text-align:center'>
        <h2>Name not found!</h2><br>
        <a href="login.php">Try again!</a>
    <?php
    exit();
}
else{
    // Handling case where user input is incomplete
    echo "Please fill out all inputs!";
    ?>
    <a href="login.php">Try Again</a>
    <?php
}
?>
