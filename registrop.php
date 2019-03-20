<?php
//////// CONEXION A LA BASE DE DATOS /////////
include('conexion.php');
$mensaje='';
//////////REGISTRO NUEVO USUARIO ////////////
if (isset($_POST['registrarse'])){ //// SI SE PRESIONA EL BOTÓN "REGISTRARSE" OCURRE LO SIGUIENTE 
  $nombre_reg=$_POST['nombre_reg'];
  $contraseña_reg=$_POST['contraseña_reg'];
  $matricula_reg=$_POST['matricula_reg'];
  $tipo_reg=$_POST['tipo_reg'];

  $existente = $conexion->prepare("SELECT * FROM usuario where Matricula='$matricula_reg'"); /// COMPROBAR SI EL YA ESTA REGISTRADO
  $existente->execute();
  if ($existente->rowCount()>0) /// SI EXISTE ENTONCES EL MENSAJE SERÁ:
  {
    echo "Ya existe";
    $mensaje='<p>Ya existe usuario</p>';
  }
  else{
      try {
        echo $tipo_reg;
        $sql="INSERT INTO usuario(Nombre, Matricula, contrasena, tipo) VALUES ('$nombre_reg','$matricula_reg','$contraseña_reg', '$tipo_reg')";
            $conexion->exec($sql);
            header("Location: index.php");

      } catch (PDOException $error) {
          print 'ERROR: '. $error->getMessage();
          echo "Error";
          $mensaje='<p>Error al registrar usuario</p>';
        }   
    }
}
?>