<?php
  include('login.php');
  include('logout.php');
  @session_start();
  if(!isset($_SESSION["usuario"])){
      header('Location: index.php');
  }
  $matriculaUsuario= $_SESSION['usuario'];//VARIABLE DE SESIÓN NOMBRE DE USUARIO
  $detallesU = $conexion->prepare("SELECT * FROM usuario WHERE matricula=:matriculaUsuario");// OBTENER INFORMACIÓN DE USUARIO
  $detallesU -> bindParam(':matriculaUsuario', $matriculaUsuario, PDO::PARAM_STR);
  $detallesU->execute();
?>
<!DOCTYPE html>
<html>
<title>Registro</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("imagenes/p1.jpg");
  min-height: 80%;
}
label{
  color: #fff;
}
.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding " style="background: #0B0B61;">
    <div class="w3-col s3">
      <a href="nuevo.php" class="w3-button w3-block"  style="background: #0B0B61;"><label>Nuevo proyecto</label></a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block " style="background: #0B0B61;"><label>Asignar colaboradores</label></a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block " style="background: #0B0B61;"></a>
    </div>
    <div class="w3-col s3">
      <form method="post">
        <input class="w3-button w3-block " style="background: #0B0B61; color: #FFFFFF" type="submit" name="salir" id="salir" value="Salir">
      </form>
    </div>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag"></span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px">Financiación<br>De<br>Proyectos</span>
  </div>
</header>
<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p></p>
</footer>

</body>
</html>
