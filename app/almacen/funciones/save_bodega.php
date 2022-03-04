<?php  
	include '../../../coneccion/coneccion.php';
    include '../../../Errores/mostrar_errores.php';

    $bodega= $_POST['bodega'];
	$descripcion = $_POST['descripcion_bodega'];
	$encargado = $_POST['encargado'];
	
	
	
	$sql = pg_query("INSERT INTO bodegas (nombre,descripcion,encargado) VALUES ('$bodega','$descripcion','$encargado')");

   if ($sql) {
		header('Location: ../../../dashboard.php?page=bodegas');//Se guardo
	}


 
?>  