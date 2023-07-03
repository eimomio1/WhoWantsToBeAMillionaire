<!doctype html>
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
    <p class="bannerText"><strong>Where you can win to be a millionaire!<strong></p>

    <!--main area-->
    <div class="options">
        <form action="login-submit.php" method="GET">
            <fieldset>
                <legend><strong>New Game:</strong></legend>
                <!--Name-->
                <strong>Name:</strong>
                <input type="text" name="name" size="16" />
                <br />
                <br />

                <!--To start the Game-->
                <input type="submit" value="Start Game"/>
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