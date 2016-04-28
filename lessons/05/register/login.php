<?php
session_start();
require_once "classes/User.php";

$user = new User();

if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $loginResult = $user->login($_POST['login'], $_POST['password']);
    if ($loginResult) {
        header("Location: index.php");
        echo "Correct";
    }
    else {
        echo 'Incorrect login or password';
    }
    
}
var_dump($_POST);
?>

<h2>Login form:</h2>
<form method="post">
    <input type="hidden" name="action" value="login">

    <label for="login">Login:</label>
    <input type="text" name="login" id="login">
    <div style="clear:both;"></div>

    <label for="password">Login:</label>
    <input type="password" name="password" id="password">
    <div style="clear:both;"></div>

    <input type="submit" value="SEND">
</form>