<?php
require __DIR__ . "/common.php" ;
get_header();
?>
    <p class="bannerText"><strong>Where you can win to be a millionaire!<strong></p>

    <!--main area-->
    <div class="options">
        <form action="login-submit.php" method="GET">
            <fieldset>
                <legend><strong>Login:</strong></legend>
                <!--Name-->
                <strong>Name:</strong>
                <input type="text" name="name" size="16" title = 'Name must be letters only'>
                <br />
                <br />
                <strong>Password:</strong>
                <input type ="text" pword = "password">
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
    </div>
    <br />
    <br />
    <?php 
        $user_info = explode("\n", file_get_contents('./players.txt'));
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