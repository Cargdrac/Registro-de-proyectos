<?php 
	include('conexion.php');
	$mensaje1='';
	////////////////////////
	if (isset($_POST['registrar'])){ //// SI SE PRESIONA EL BOTÓN "REGISTRAR" OCURRE LO SIGUIENTE
		$nombre=$_POST['Nombre'];
		$fechaInicio=$_POST['fechai'];
		$fechaTermino=$_POST['fechat'];
		$objetivoGeneral=$_POST['objgen'];
		$objetivoEspecifico=$_POST['objesp'];
		$descripcion=$_POST['desc'];
		$presupuesto=$_POST['presupuesto'];
		$infraestructura=$_POST['infrac'];
		$financiamiento=$_POST['financiamiento'];
		$colaborador=$_POST['colaborador'];
		$fechain = date('Y-m-d', strtotime($fechaInicio)); 
		$fechate= date('Y-m-d', strtotime($fechaTermino)); 
		$existente = $conexion->prepare("SELECT * FROM proyecto where nombre='$nombre'"); /// COMPROBAR SI EL YA ESTA REGISTRADO
  		$existente->execute();
  		if ($existente->rowCount()>0) /// SI EXISTE ENTONCES EL MENSAJE SERÁ:
		{
			echo "Ya existe";
		    $mensaje1='<p>Ya existe el proyecto</p>';
		}else{
			try {
		        $sql="INSERT INTO proyecto(nombre, fechai, fechat, descripcion, objgen, objesp, presupuesto, infrac, Proyectocol, financiamiento_idfinanciamiento) VALUES ('$nombre','$fechain','$fechate', '$descripcion','$objetivoGeneral', '$objetivoEspecifico', '$presupuesto', '$infraestructura', '$colaborador', '$financiamiento')";
		        $conexion->exec($sql);
		        $mensaje1='<p>Proyecto registrado</p>';

		      } catch (PDOException $error) {
		          print 'ERROR: '. $error->getMessage();
		          echo "Error";
		          $mensaje1='<p>Error al registrar proyecto</p>';
		        }   
		}
	}
?>