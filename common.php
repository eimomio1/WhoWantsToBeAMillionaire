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
?>
