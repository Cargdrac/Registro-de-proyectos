<?php
include('conexion.php');
$mensaje='';
if(isset($_POST['loguearse']))
{
	$usuario_log=$_POST['usuario_log'];// CONTENER EN UNA VARIABLE LO ESCRITO EN EL INPUT USUARIO_LOG
	$contraseña_log=$_POST['contraseña_log'];//CONTENER EN UNA VARIABLE LO ESCRITO EN EL INPUT CONTRASEÑA_LOG	

	$loginUsuario=$conexion->prepare("SELECT * FROM Usuario WHERE matricula='$usuario_log' AND contrasena='$contraseña_log'");// BUSCAR EL USUARIO
	$loginUsuario->bindParam(':usuario_log', $usuario_log, PDO::PARAM_STR);
	$loginUsuario->bindParam(':contrasena_log', $contrasena_log, PDO::PARAM_STR);
	$loginUsuario->execute();
	if($loginUsuario->rowCount()>0)// SI LA QUERY ARROJA UN REGISTRO EXISTENTE...
	{	
		$mostrarDetalles = $loginUsuario->fetch(PDO::FETCH_ASSOC);
		if($mostrarDetalles['tipo']==0){
			header("Location: principal.php?");// ACCEDER AL INICIO
			session_start();
			$_SESSION['usuario']=$mostrarDetalles['Matricula'];
		}
		else{
			if($mostrarDetalles['tipo']==1){
				header("Location: alumno.php");// ACCEDER AL INICIO
				session_start();
				$_SESSION['usuario']=$mostrarDetalles['Matricula'];
			}
			else{
				header("Location: administrador.php");// ACCEDER AL INICIO
				session_start();
				$_SESSION['usuario']=$mostrarDetalles['Matricula'];
			}
		}
	}

	else
	{
		$mensaje='<p>No se encontro usuario</p>';//ALERTA DE QUE EL USUARIO NO ESTA REGISTRADO
	}
}
?>