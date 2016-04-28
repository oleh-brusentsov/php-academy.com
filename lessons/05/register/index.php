<?php
session_start();
require_once "classes/User.php";

$user = new User();
if (!$user->isLogged()) {
    header("Location: login.php");
}

echo $user->getName();


var_dump($user->login('admin', '12345'));
var_dump($user->isLogged());

?>
<h2> Hello, <?= $user->getName()?></h2>