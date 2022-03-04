<?php  
	include '../../../coneccion/coneccion.php';
   // include '../../Errores/mostrar_errores.php';

    $codinv = $_POST['codinv'];
    $existencia = $_POST['existencia'];
  
	
	$sql = pg_query("UPDATE inventario Set 
		existencia='$existencia'

		Where codigo='$codinv'");

    if ($sql) {
		header('Location: ../../../dashboard.php?page=ajustes');//Se guardo
	}

 
?>    