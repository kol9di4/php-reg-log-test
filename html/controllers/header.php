<?php

use System\Core\AutoLogin;

$userName = null;
$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
if ($token != null){
    $autoLogin = new AutoLogin($dbConnection, $dbConnectionSession, $token);
    $userName = $autoLogin->getUserName();
}

if($userName === null){
    unset($_SESSION['token']);
    setcookie('token','',-2,'index.php');
}

if ($userName === null)
    $header = template('views/header/v_index');
else
    $header = template('views/header/v_login',['userName'=>$userName]);