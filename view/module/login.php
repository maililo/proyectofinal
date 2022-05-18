<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/SweetAlert.css">
    <script src="view/js/SweetAlert.js"></script>
    
    
</head>
<body>
<div id="login-button">
  <img src="view/img/icono.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="view/img/cerrar.png"></img>
  </span>

  <form method="post">
    <input type="text" name="user" placeholder="User">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" value="Log in"> 
</form>
<?php

  if(isset($_POST["user"])){

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    try {
      
      $objctr = new UserController();
      $objctr -> getVerifyPass($user,$pass);
      
    } catch (Exception $e) {
      //throw $th;
    }
  }



?>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="view/img/cerrar.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>
    <script src="view/js/jquery.js"></script>
    <script src="view/js/login.js"></script>
    <script src="view/js/TweenMax.min.js"></script>
    
</body>
</html>