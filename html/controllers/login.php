<?php

use System\UserLogin;

$userLogin = trim($_POST['login']);
$userPassword = trim($_POST['password']);

$newUserForLogin = (new UserLogin($userLogin, $userPassword, $dbConnection, $dbConnectionSession));

$response = $newUserForLogin->login();

echo json_encode($response);
exit();