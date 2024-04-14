<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
&& !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
 && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $token = $_SESSION['token'] ?? $_COOKIE['token'];
    unset($_SESSION['token']);
    setcookie('token','',-2,'index.php');

    exit();
    
}