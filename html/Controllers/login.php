<?php

use Models\UserLogin;

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $userLogin = trim($_POST['login']);
    $userPassword = trim($_POST['password']);

    $newUserForLogin = (new UserLogin($userLogin, $userPassword, $dbConnection, $dbConnectionSession));

    $response = $newUserForLogin->login();

    echo json_encode($response);
    exit();

}