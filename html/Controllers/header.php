<?php

use System\Core\Auth;
use System\Core\Template;

$userName = null;
if ($token != null){
    $autoLogin = new Auth($dbConnection, $dbConnectionSession);
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