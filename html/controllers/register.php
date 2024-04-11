<?php


use System\UserReg;
use System\UserFieldsValidator;

$userLogin = $_POST['login'];
$userPassword = $_POST['password'];
$userEmail = $_POST['email'];
$userName = $_POST['name'];

$newUser = (new UserReg($userLogin, $userPassword, $userEmail, $userName))->
	setValidator((new UserFieldsValidator($userLogin, $userPassword, $userEmail, $userName))->
		setDb($dbConnecton));

$response = $newUser->userRegister();

if(empty($response))
{
	$dbConnecton->create($newUser->collectInfo());
}

echo json_encode($response);
exit();