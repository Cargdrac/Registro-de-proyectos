<?php
include('conexion.php');
//------------------DESCONECTARSE MEDIANTE EL BOTÓN CERRAR SESIÓN---------------///

if (isset($_POST['salir']))
{
	try
	{
	@session_start();
	session_unset(); //LIMPIAR VARIABLES DE SESIÓN
	session_destroy();//DESTRUIR LA SESIÓN

	header("Location: index.php");// VOLVER AL CUADRO DE LOGIN/REGISTRO
	}

	catch (PDOException $error) 
	{
     print 'ERROR: '. $error->getMessage();
	}
}
?>