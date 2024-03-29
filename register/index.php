<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}

session_start();
require_once 'classes/Auth.class.php';

?>



    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Your are welcome!</h1>

      <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Logout</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Пожалуйста, войдите</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Username" autofocus>
        <input name="password" type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input name="remember-me" type="checkbox" value="remember-me" checked> Запомнить меня
        </label>
        <input type="hidden" name="act" value="login">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
    
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Нет аккаунта? <a href="register.php">Зарегистрируйте.</a>
        </div>
      </form>

      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>
