<?php
    function check_name($username)
    {

        $user_info = explode("\n", file_get_contents('./players.txt'));
        foreach ($user_info as $sub_user_info) {
            $name_parts = explode(",", $sub_user_info);
            if ($name_parts[0] == $username) {
                return true;
            }
        }
        return false;

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

                <!--To start the Game-->
                <input type="submit" value="Start Game"/>
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
    <meta charset="utf-8">
    <title>Who Wants to be a millionaire</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div>
        <img src="./millionaire.avif" alt="logo" class="banner"/>
        <br />
    </div>

    
    <?php

    }


?>
