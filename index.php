<?php
  include('login.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/L6.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background-image: url('imagenes/F7.jpg');">
    <div class="container">
      <div   class="login-box" class="col-md-12 ">
        <div class="col-md-12 col-md-offset-1" id="tab">
            <img src=" imagenes/l2.png" class="logo" >
            <h1 style="color: #ffffff">Inicio de sesión</h1>

            <form method="POST">
              <!-- USERNAME INPUT -->
              <label for="username">Matricula</label>
              <input type="text" placeholder="Enter Matricula" name="usuario_log" autocomplete="off">
              <!-- PASSWORD INPUT -->
              <label for="password">Contraseña</label>
              <input type="password" placeholder="Enter Contraseña" name="contraseña_log">
              <input class="button" type="submit" name="loguearse" value="Iniciar sesión">
            
            </form>
              <input class="button" type="button" onclick="location='registro.php'" value="Registrarse" id="registro">
        </div>
      </div>
    </div>
  </body>
</html>