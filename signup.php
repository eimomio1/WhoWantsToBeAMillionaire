<?php
require __DIR__ . "/common.php" ;
get_header();
?>
<div class="options">
        <form action="signup-submit.php" method="post">
            <fieldset style>
                <legend><strong>Sign-Up:</strong></legend>
                <!--Name-->
                <strong>Name:</strong>
                <input type="text" name="name" size="16" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" title = 'Name must be letters only'>
                <br/>
                <br/>
                <strong>Password:</strong>
                (Password must include numbers and letters)
                <input type ="text" name = "password">
                </br>
                </br>

                <!--To start the Game-->
                <input type="submit" value="signup"/>
            </fieldset>
         </form>
            </br>
</html>