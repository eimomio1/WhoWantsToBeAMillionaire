<?php
require __DIR__ . "/common.php" ;
get_header();
?>
    <p class="bannerText"><strong>Where you can win to be a millionaire!<strong></p>

    <!--main area-->
<?php
generate_login('login-submit.php');
?>
    <br />
    <br />
    <?php 
        $user_info = explode("\n", file_get_contents('./userdata/playerinfo.txt'));
        foreach ($user_info as $sub_user_info) {
            $name_parts = explode(",", $sub_user_info);
            if ($name_parts[0] == $username) {
                return true;
            }
        }
    ?>
    <!--To get to the leaderboard page-->
    <div id="scroll-container">
        <div id="scroll-text">
        <?= $name_parts[0], " " . $name_parts[1] ?><br /><br />
        <div>
    </div>
</body>
</html>