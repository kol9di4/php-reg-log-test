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
    $header = template('Views/Header/v_index');
else
    $header = template('Views/Header/v_login',['userName'=>$userName]);