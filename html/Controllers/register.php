<?php

use Models\UserReg;

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
&& !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
 && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

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
}