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
table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;   width: 480px; text-align: center;    border-collapse: collapse; }

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
    <div style="color: #FFFFFF;  width: 1000px;" class="w3-col s3">
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
<div class="w3-container" id="where" >
  <div class="w3-content">
    <?php 
      $band=0;
      $idUs=$mostrarDetalles['idUsuario'];
      $part = $conexion->prepare("SELECT * FROM participantes");
      $part->execute();
      while($result1 =$part->fetch(PDO::FETCH_ASSOC)){
        $valor=$result1['Usuario_idUsuario'];
        if($valor==$idUs){
          echo "<center><h1>Tú estás en los siguientes proyectos</h1></center>";
          $band=1;
          $idproy=$result1['Proyecto_idProyecto'];
          $proyecto = $conexion->prepare("SELECT * FROM proyecto WHERE idProyecto='$idproy'");
          $proyecto-> bindParam('$idproy', $idproy, PDO::PARAM_STR);
          $proyecto->execute();
          $proyDet=$proyecto->fetch(PDO::FETCH_ASSOC);
          echo '<table>';
          echo '<tr>';
          echo '<th>Nombre</th>';
          echo '<th>Fecha inicio</th>';
          echo '<th>Fecha termino</th>';
          echo '<th>Descripción</th>';
          echo '<th>Objetivo general</th>';
          echo '<th>Objetivo específico</th>';
          echo '<th>Presupuesto</th>';
          echo '<th>Infraestructura</th>';
          echo '<th>Proyecto colaborador</th>';
          echo '<th>Finaciamiento tipo</th>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>'.$proyDet['nombre'].'</td>';
          echo '<td>'.$proyDet['fechai'].'</td>';
          echo '<td>'.$proyDet['fechat'].'</td>';
          echo '<td>'.$proyDet['descripcion'].'</td>';
          echo '<td>'.$proyDet['objgen'].'</td>';
          echo '<td>'.$proyDet['objesp'].'</td>';
          echo '<td>'.$proyDet['presupuesto'].'</td>';
          echo '<td>'.$proyDet['infrac'].'</td>';
          echo '<td>'.$proyDet['Proyectocol'].'</td>';
          echo '<td>'.$proyDet['financiamiento_idfinanciamiento'].'</td>';
          echo '</table>';
          echo "</center>";
        }
      }
      if($band==0){
        echo "<h1>No estás en algún proyecto</h2>";
      }
    ?>
  </div>
</div>
</center>
</body>
</html>
