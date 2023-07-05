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
