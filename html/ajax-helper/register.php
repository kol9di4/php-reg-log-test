<?php

use System\RegUser;

$userLogin=$_POST['login'];
$userPassword=$_POST['password'];
$userEmail=$_POST['email'];
$userName=$_POST['name'];

$newUser = new RegUser($userLogin, $userPassword, $userEmail, $userName);

if($newUser->userLoginCheck()){
    $newUser->userRegister();
    echo true;
}
else
    echo false;