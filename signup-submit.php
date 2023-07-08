<?php
require __DIR__ . "/common.php" ;
get_header();

$errors = [];
$u_attrs = array(
    'name',
    'username',
    'password',
    'score',
);
if(count($_POST)===2){
$playerdata = implode(",",$_POST);
$playerdata .= ",0";
$playerdata .= "\n";
file_put_contents("./userdata/playerinfo.txt",$playerdata,FILE_APPEND);
?>

        <fieldset style = "text-align:center">
            <strong>Thank you, <?php echo $_POST['name']; ?>! <br></strong>
            You may login here:
            <br><br>
            <?php generate_login('login-submit.php') ?>
        </fieldset>
<?php
}
else{
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Document</title>
    </head>
    <body>
        <fieldset>
            Please fill out all sections!
        </fieldset>
    </body>
    </html>
<?php
}
?>