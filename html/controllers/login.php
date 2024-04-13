<?php

use System\UserLogin;
use System\UserFieldsLoginHelper;
use system\FileStorage;



$userLogin = trim($_POST['login']);
$userPassword = trim($_POST['password']);

$newUserForLogin = (new UserLogin($userLogin, $userPassword, '',''))->
	setValidator((new UserFieldsLoginHelper($userLogin, $userPassword, '', ''))->
		setDb($dbConnecton));
$newUserForLogin->setDb($dbConnectionSession);
$response = $newUserForLogin->login();

// header('Location'. 'index.php');
echo json_encode($response);
exit();