<?php


use System\UserReg;
use System\UserFieldsValidator;

$userLogin = $_POST['login'];
$userPassword = $_POST['password'];
$userEmail = $_POST['email'];
$userName = $_POST['name'];

$newUser = (new UserReg($userLogin, $userPassword, $userEmail, $userName, $dbConnection));

$response = $newUser->userRegister();

if(empty($response))
{
	$dbConnection->create($newUser->collectInfo());
}

echo json_encode($response);
exit();