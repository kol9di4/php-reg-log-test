<?php

use System\UserLogin;
use System\UserFieldsValidator;


$userLogin = $_POST['login'];
$userPassword = $_POST['password'];

$newUserForLogin = new UserLogin($userLogin, $userPassword, '','');