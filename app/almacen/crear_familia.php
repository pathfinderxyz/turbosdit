<?php  
	include '../../coneccion/coneccion.php';
    //include '../../Errores/mostrar_errores.php';

    $nombre_familia= $_POST['nombre_familia'];
    $descripcion= $_POST['descripcion'];
    
	
	
	
	$sql = pg_query($cnx,"INSERT INTO categoria_articulos (nombre_familia,descripcion) 
		VALUES ('$nombre_familia','$descripcion')");

    if ($sql) {
		header('Location: ../../dashboard.php?page=new_stock');//Se guardo
	}


 
?>  