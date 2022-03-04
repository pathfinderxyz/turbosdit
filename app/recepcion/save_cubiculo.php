<?php  
	include '../../coneccion/coneccion.php';
 include '../../Errores/mostrar_errores.php';

    $nombre_cubi= $_POST['nombre_cubi'];
	$asignacion = '';
	$estado = 'Disponible';
	
	
	$sql = pg_query($cnx,"INSERT INTO cubiculos (nombre,operario,estado) VALUES ('$nombre_cubi','$asignacion','$estado')");

   if ($sql) {
		header('Location: ../../dashboard.php?page=cubiculos');//Se guardo
	}else{
		echo 'Ups ha ocurrido un error';
	}


 
?>  