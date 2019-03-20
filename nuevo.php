<?php
  include('BDnuevo.php');
  include('login.php');
  include('logout.php');
  @session_start();
  if(!isset($_SESSION["usuario"])){
      header('Location: index.php');
  }
  $nombreUsuario= $_SESSION['usuario'];//VARIABLE DE SESIÓN NOMBRE DE USUARIO
  $detallesU = $conexion->prepare("SELECT * FROM usuario WHERE matricula=:matriculaUsuario");// OBTENER INFORMACIÓN DE USUARIO
  $detallesU -> bindParam(':matriculaUsuario', $matriculaUsuario, PDO::PARAM_STR);
  $detallesU->execute();
?>
<!DOCTYPE html>
<html>
<title>Nuevo Proyecto</title>
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

.menu {
  display: none;
}

label{
  color: #fff;
}

.button {
  border: none;
  outline: none;
  height: 40px;
  background: #0B0B61;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

.button:hover {
  cursor: pointer;
  background: #2E2EFE;
  color: #FFFFFF;
}
.et1{
  color:#2E2EFE;
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


<!-- nuevo proyecto-->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide" style="background: #0B0B61;">Nuevo proyecto</span></h5>
    <p>Para registrar tu proyecto es necesario ingresar todos los campos.</p>
    <div id="div"><center><?php echo $mensaje1; ?></center></div>
    <form method="post">
      <p class="et1">Nombre del Proyecto</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre del proyecto" required name="Nombre"></p>
      <p class="et1">Fecha de Inicio</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="date" placeholder="Fecha de Inicio"  required name="fechai"></p>
      <p class="et1">Fecha Final</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="date" placeholder="Fecha Final" required name="fechat" ></p>
      <p class="et1">Objetivo General</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Objetivo General" required name="objgen"></p>
      <p class="et1">Objetivo Especifico</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Objetivo Especifico" required name="objesp"></p>
      <p class="et1">Descripción del proyecto</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Descripción del proyecto" required name="desc"></p>
      <p class="et1">Presupuesto estimado</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Presupuesto estimado" required name="presupuesto"></p>
      <p class="et1">Infraestructura a utilizar</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Infraestructura a utilizar" required name="infrac"></p>
      <center>
        <table>
           <tr>
             <td><center><label class="et1" for="FA">  &nbsp;Financiamiento A</label> <input type="radio" name="financiamiento" value="1" checked></center></td>
             <td><center><label class="et1" for="FB">  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Financiamiento B</label> <input type="radio"  name="financiamiento" value="2" ></center></td>
             <td><center><label class="et1" for="FC">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Financiamiento C</label> <input type="radio"  name="financiamiento" value="3" ></center></td>
            </tr>
       </table>

      </center>
      <br>
      <br>

      <center>
        <p class="et1">Colaborador</p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Colaborador" required name="colaborador"></p>
      </center>
      <br>
      <p><input type="submit" value="Registrar" name="registrar" required id="registrar"/></p>
    </form>


  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p></p>
</footer>

</body>
</html>
