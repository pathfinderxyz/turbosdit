<?php  
	include '../../coneccion/coneccion.php';
   // include '../../Errores/mostrar_errores.php';

    $codinv = $_POST['codinv'];
    $condicion = $_POST['condicion'];
    $obs_condicion = $_POST['obs_condicion'];
	
	$sql = pg_query("UPDATE inventario Set 
		condicion='$condicion',
		obs_condicion='$obs_condicion'

		Where codigo='$codinv'");

	

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=stock&fam=Todos');//Se guardo
	}

 
?>    