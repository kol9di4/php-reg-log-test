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
    $userName = $autoLogin->gethUserName();
}

if($userName === null){
    unset($_SESSION['token']);
    setcookie('token','',-2,'index.php');
}

// var_dump($userName);


// $password = password_hash('admin',PASSWORD_DEFAULT);

// $dbConnecton->create([
//     'login' => 'admin',
//     'password' => $password,
//     'email' => 'admin@admin',
//     'name' => 'Vasya'
// ]);
// /////////////////////////////////////////
// $pass1 = $dbConnecton->get(3)['password'];
// $pass2 = $dbConnecton->get(2)['password'];
// echo '<pre>';
// var_dump($pass1);
// var_dump($pass2);
// echo '</pre>';
// if (password_verify('admin', $pass1)) {
//     echo '2 ok';
// } 
// if (password_verify('admin', $pass2)) {
//     echo '3 ok';
// } 
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
    $header = template('views/header/v_index',);
else
    $header = '';

$html = template('views/base/v_main', [
    'title'=>$title,
    'header'=>$header,
]);



echo $html;
