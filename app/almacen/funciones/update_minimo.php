<?php  
	include '../../../coneccion/coneccion.php';
   // include '../../Errores/mostrar_errores.php';

    $codinv = $_POST['codinv'];
    $minimo = $_POST['minimo'];
  
	
	$sql = pg_query("UPDATE inventario Set 
		minimos='$minimo'

		Where codigo='$codinv'");

    if ($sql) {
		header('Location: ../../../dashboard.php?page=conf_minimos');//Se guardo
	}

 
?>    