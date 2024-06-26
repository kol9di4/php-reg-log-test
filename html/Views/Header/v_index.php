<!-- Modal Login -->
<div class="modal fade" id="logInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center vh-100">
      <div class="form-signin modal-content w-100 p-4">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button class="w-100 btn btn-lg btn-primary my-4 " type="submit" disabled>Войти</button>
            </form>
        </div>
    </div>
  </div>
  <!-- Modal Register -->
  <div class="modal fade" id="regInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center vh-100">
      <div class="form-signin modal-content w-100 p-4">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button class="w-100 btn btn-lg btn-primary my-4" type="submit" disabled>Регистрация</button>
            </form>
        </div>
    </div>
  </div>
<!-- Modal End -->
    <nav class="navbar navbar-light py-4" style="background-color: rgb(246, 245, 255);">
        <div class="container d-flex justify-content-end">
            <div class="ms-auto justify-content-end">
                <div><a class="btn btn-outline-secondary me-2" href="#"  data-bs-toggle="modal" data-bs-target="#logInModal">Sign In</a>
                <a class="btn btn-primary" href="#"  data-bs-toggle="modal" data-bs-target="#regInModal">Sign Up</a></div>
            </div>
        </div>
    </nav>