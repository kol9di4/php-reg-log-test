<?php


use System\UserReg;
use System\UserFieldsValidator;

$userLogin = $_POST['login'];
$userPassword = $_POST['password'];
$userEmail = $_POST['email'];
$userName = $_POST['name'];

$newUser = new UserReg($userLogin, $userPassword, $userEmail, $userName);
$newValidator = new UserFieldsValidator($userLogin, $userPassword, $userEmail, $userName);
$newValidator->setDb($dbConnecton);
$newUser->setValidator($newValidator);
$response = $newUser->userRegister();

if(empty($response))
{
	$dbConnecton->create($newUser->collectInfo());
}

echo json_encode($response);
exit();