<?php

include_once("DataBase.php");

$dbConnecton = FileStorage::getInstance('DataBase/db.json');

$dbConnecton->create([
    'login' => 'admin',
    'pasword' => 'admin',
    'email' => 'admin@admin',
    'name' => 'Vasya'
]);


echo '<pre>';
var_dump($dbConnecton->get(1));
echo '</pre>';
