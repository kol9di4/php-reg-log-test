<?php

use System\UserLogin;
use System\UserFieldsLoginHelper;


$userLogin = trim($_POST['login']);
$userPassword = trim($_POST['password']);

$newUserForLogin = (new UserLogin($userLogin, $userPassword, '',''))->
	setValidator((new UserFieldsLoginHelper($userLogin, $userPassword, '', ''))->
		setDb($dbConnecton));

$response = $newUserForLogin->login();

echo json_encode($response);
exit();