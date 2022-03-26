<?php
require 'Database.php';

if (isset($_POST['submit'])) {
    // запрос на регистрацию
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    
    if ($pass != $conf_pass) {
      $err = 'Введенные пароли не совпадают!';
      header("Location: RegistrationError.html"); exit;
    }

    $sql = new Database();
    $data = $sql->getUserByEmail($email);
    if ($data !== false && $data !== NULL) {
      $err = 'Такой пользователь уже существует!';
      header("Location: RegistrationError.html"); exit;
    }
    //     $hash = $data['hash'];
    //     if (password_verify($pass, $hash)) {
    //         // успешно
    //         header("Location: success.html"); exit;
    //     } else {
    //         // неудача
    //         $err = 'Пароли не совпали!';
    //     }
    
    $sql->insertUser($email, $pass);
    header("Location: success.html"); exit;  
}
?>
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/5.1/examples/sign-in/? -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post">
    <img class="mb-4" src="bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" name="conf_pass" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password Again</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Send">
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>


    
  

</body></html>