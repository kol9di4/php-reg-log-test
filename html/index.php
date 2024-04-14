<?php

include_once('ini.php');

use System\Core\FileStorage;
use Controllers\Header;
use Controllers\Index;
use System\Core\Auth;

$dbConnection = FileStorage::getInstance('DataBase/db.json');
$dbConnectionSession = FileStorage::getInstance('DataBase/sessions.json');

$cname = $_GET['c'] ?? 'index';
$path = "Controllers/$cname.php";
$controlName = !!preg_match('/^[aA-zZ0-9_-]+$/', $cname);
if($controlName && file_exists($path)){
	include_once($path);
}

$header = new Header(new Auth($dbConnection, $dbConnectionSession));
$headerHtml = $header->render();
$html = (new Index($headerHtml))->render();

echo $html;