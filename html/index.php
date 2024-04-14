<?php

include_once('ini.php');

use System\FileStorage;

$dbConnecton = FileStorage::getInstance('DataBase/db.json');
$dbConnectionSession = FileStorage::getInstance('DataBase/sessions.json');
$title = "Base Title";
$header = '';


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

include_once("controllers/header.php");

$html = template('views/base/v_main', [
    'title'=>$title,
    'header'=>$header,
]);



echo $html;
