<?php


use System\UserReg;
use System\FileStorageHelper as FileHelp;

$userLogin=$_POST['login'];
$userPassword=$_POST['password'];
$userEmail=$_POST['email'];
$userName=$_POST['name'];

$newUser = new UserReg($userLogin, $userPassword, $userEmail, $userName);
$newUser->setDb($dbConnecton);

// $dbConnecton->create($newUser->collectInfo());

$response = $newUser->userRegister();

echo json_encode($response);
exit();