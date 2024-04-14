<?php

$token = $_SESSION['token'] ?? $_COOKIE['token'];

unset($_SESSION['token']);
setcookie('token','',-2,'index.php');

exit();