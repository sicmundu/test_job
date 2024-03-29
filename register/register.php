<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Ajax Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body style="background-color: #262626;">

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Вы уже зарегистрированы!</h1>

      <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Выйти</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php" style=    background: #575a5a;">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Введите свои данные для регистрации</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Имя" autofocus>
        <input name="password1" type="password" class="input-block-level" placeholder="Пароль">
        <input name="password2" type="password" class="input-block-level" placeholder="Подтвердите пароль">
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Регистрация</button>
		
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Уже есть аккаунт? <a href="/ru/register/index.php">Войти.</a>
        </div>
      </form>

      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>
