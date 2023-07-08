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
                <input type ="text" name = "password">
                (Password must include numbers and letters)

                </br>
                <!--To sign up-->
                <input type="submit" value="signup"/>
                <br>
                <a href = 'login.php'>Back</a>
            </fieldset>
         </form>
            </br>
</html>