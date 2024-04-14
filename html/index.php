<?php

include_once('ini.php');

use System\Core\FileStorage;
use System\Core\Template;

$dbConnection = FileStorage::getInstance('DataBase/db.json');
$dbConnectionSession = FileStorage::getInstance('DataBase/sessions.json');
$title = "Base Title";
$header = '';


function checkControllerName(string $name) : bool{
    return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
}

$cname = $_GET['c'] ?? 'index';
$path = "Controllers/$cname.php";
if(checkControllerName($cname) && file_exists($path)){
	include_once($path);
}

include_once("Controllers/header.php");

$html = Template::template('Views/Base/v_main', [
    'title'=>$title,
    'header'=>$header,
]);



echo $html;
