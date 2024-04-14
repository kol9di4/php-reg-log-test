<?php

use System\Core\AutoLogin;
use System\Core\Template;

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
    $header = Template::template('Views/Header/v_index');
else
    $header = Template::template('Views/Header/v_login',['userName'=>$userName]);