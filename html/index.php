<?php

include_once("FileStorage.php");

$dbConnecton = FileStorage::getInstance('DataBase/db.json');


$password = password_hash('admin',PASSWORD_DEFAULT);

// $dbConnecton->create([
//     'login' => 'admin',
//     'password' => $password,
//     'email' => 'admin@admin',
//     'name' => 'Vasya'
// ]);
$pass1 = $dbConnecton->get(3)['password'];
$pass2 = $dbConnecton->get(2)['password'];
echo '<pre>';
var_dump($pass1);
var_dump($pass2);
echo '</pre>';
if (password_verify('admin', $pass1)) {
    echo '2 ok';
} 
if (password_verify('admin', $pass2)) {
    echo '3 ok';
} 


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css" media="all">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Modal Login -->
<div class="modal fade" id="logInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="form-signin modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: auto;"></button>
            <form class="log">
                <h1 class="h3 mb-5 fw-normal">Пожалуйста войдите в аккаунт</h1>
                <div class="form-floating">
                    <input type="text" name="login" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Войти</button>
            </form>
        </div>
    </div>
  </div>
  <!-- Modal Register -->
  <div class="modal fade" id="regInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="form-signin modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: auto;"></button>
            <form class="reg">
                <h1 class="h3 mb-5 fw-normal">Пожалуйста зарегистрируйтесь</h1>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email адрес</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="login" class="form-control" id="floatingInput" placeholder="admin">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password-confirm" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Подтвердите пароль</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Введите имя</label>
                </div>
                <div class="h6 text-danger"></div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Регистрация</button>
            </form>
        </div>
    </div>
  </div>
<!-- Modal End -->
    <nav class="navbar navbar-expand-lg navbar-light py-4" style="background-color: rgb(246, 245, 255);">
        <div class="container" style="justify-content: flex-end;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav_lc" aria-controls="nav_lc" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-auto" id="nav_lc">
                <div><a class="btn btn-outline-secondary me-2" href="#"  data-bs-toggle="modal" data-bs-target="#logInModal">Sign In</a>
                <a class="btn btn-primary" href="#"  data-bs-toggle="modal" data-bs-target="#regInModal">Sign Up</a></div>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>