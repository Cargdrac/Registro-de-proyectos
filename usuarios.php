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
  $mostrarDetalles = $detallesU->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<title>Administrador</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
  text-align: center;
}
#usr,#proy{
    margin: 8%;
    width: 200px;
    height: 200px;
    font-size: 14px;
    font-weight: bold;
    color: #FAFAFA;
    border-radius: 30px;
    border: 2px solid #0B0B61;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
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
table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 480px; text-align: center;    border-collapse: collapse;}

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }

</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding " style="background: #0B0B61;">
    <div style="color: #FFFFFF;  text-align: left; width: 75%;" class="w3-col s3">
      <?php
          echo '<strong>Hola </strong>'.$mostrarDetalles['Nombre'];
      ?>
    </div>
    <div class="w3-col s3">
      <form method="post">
        <input class="w3-button w3-block" style="background: #0B0B61; color: #FFFFFF;"  type="submit" name="salir" id="salir" value="Salir">
      </form>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<!-- nuevo proyecto-->
<center>
<div class="w3-container" id="where">
  <div class="w3-content" >
    <?php 
      $part = $conexion->prepare("SELECT * FROM usuario");
      $part->execute();
      echo "<h1>Usuarios registrados</h1>";
      echo '<table>';
      echo '<tr>';
      echo '<th>Nombre</th>';
      echo '<th>Matricula</th>';
      echo '<th>Contraseña</th>';
      echo '<th>Tipo</th>';
      echo '</tr>';
      while($result1 =$part->fetch(PDO::FETCH_ASSOC)){
        if($result1['tipo']!=2){
          echo '<tr>';
          echo '<td>'.$result1['Nombre'].'</td>';
          echo '<td>'.$result1['Matricula'].'</td>';
          echo '<td>'.$result1['contrasena'].'</td>';
          if($result1['tipo']==0){
            echo '<td>Docente</td>';
          }else{
            echo '<td>Docente</td>';
          }
        }
      }
        echo '</table>';
    ?>
  </div>
</div>
</center>
<a href="administrador.php" class="w3-button w3-block"  style="background: #0B0B61; color: #FFFFFF">Atrás</a>
</body>
</html>