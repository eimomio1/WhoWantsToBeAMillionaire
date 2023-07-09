<?php
require __DIR__ . "/common.php" ;
get_header();
$data = file("./userdata/playerinfo.txt", FILE_SKIP_EMPTY_LINES);
$errors = [];
//if(count($_POST)===2){
    if (empty($_POST['name'])|| empty($_POST['password'])){
?>
        <div style = "text-align:center">
        <strong>Please input all necessary information!</strong>
        <br>
        <a href = 'signup.php'>Try again</a>
    </div>
        
<?php
exit();
    }

    if (!preg_match('/^[A-Z][a-z]+\s[A-Z][a-z]+$/', $_POST["name"])) {
        array_push($errors,"First and last names must be capitalized and separated by a space");
    }
    if(!preg_match('/[A-Za-z]/', $_POST["password"]) || !preg_match('/[0-9]/', $_POST["password"])){
        array_push($errors,"Password must include a letter and a number!");
    }

    foreach ($data as $value) {
        $value = explode(",",$value);
        if ($value[0] == $_POST["name"]){
        array_push($errors,"Name already taken");
        break;
        }
    }


    if(count($errors) != 0){
        ?>
        <div style = "text-align:center">
        <strong>ERROR(s) found!</strong>
        <br>
        <?php
        for ($i = 0; $i < count($errors); $i++) {
        echo $errors[$i] . '<br>';
  
        }
        ?>
        <br>
        <a href="./signup.php">Try again.</a>
    </div>

        <?php
        exit();
    }
    else{
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
