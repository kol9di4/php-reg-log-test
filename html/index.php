<?php

include_once('ini.php');

use System\FileStorage;
use System\AutoLogin;

$dbConnecton = FileStorage::getInstance('DataBase/db.json');
$dbConnectionSession = FileStorage::getInstance('DataBase/sessions.json');
$title = "Base Title";

$userName = null;
$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
if ($token != null){
    $autoLogin = new AutoLogin($dbConnecton, $dbConnectionSession, $token);
    $userName = $autoLogin->getUserName();
}

if($userName === null){
    unset($_SESSION['token']);
    setcookie('token','',-2,'index.php');
}

function checkControllerName(string $name) : bool{
    return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
}

function template(string $path, array $vars = []) : string{
    $systemTemplateRenererIntoFullPath = "$path.php"; 
    extract($vars);
    ob_start();
    include($systemTemplateRenererIntoFullPath);
    return ob_get_clean();
}

$cname = $_GET['c'] ?? 'index';
$path = "controllers/$cname.php";
if(checkControllerName($cname) && file_exists($path)){
	include_once($path);
}

if ($userName === null)
    $header = template('views/header/v_index');
else
$header = template('views/header/v_login',['userName'=>$userName]);

$html = template('views/base/v_main', [
    'title'=>$title,
    'header'=>$header,
]);



echo $html;
