<?php  
include '../../coneccion/coneccion.php';
 //include '../../Errores/mostrar_errores.php';

    $concepto= $_POST['concepto'];
	
	
	
	$sql = pg_query($cnx,"INSERT INTO conceptos_mov (movimiento) VALUES ('$concepto')");

   if ($sql) {
		header('Location: ../../dashboard.php?page=concepto');//Se guardo
	}else{
		echo 'Ups ha ocurrido un error';
	}


 
?>  