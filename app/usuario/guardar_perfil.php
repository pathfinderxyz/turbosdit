<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';

    $nombre= $_POST['nombre'];
	$recepcion = $_POST['recepcion'];
	$almacen = $_POST['almacen'];
	$produccion = $_POST['produccion'];
	$seguimiento = $_POST['seguimiento'];
	$reportes = $_POST['reportes'];

	
	$sql = pg_query($cnx,"INSERT INTO perfiles (nombre,recepcion,almacen,produccion,seguimiento,reportes) VALUES ('$nombre','$recepcion','$almacen','$produccion','$seguimiento','$reportes')");

   if ($sql) {
		header('Location: ../../dashboard.php?page=listperfil');//Se guardo
	}else {
		echo "Ups ha ocurrido un error, comuniquese con el soporte!";//No se guardo el correo o el pasaporte ya existe !
	}


 
?>  