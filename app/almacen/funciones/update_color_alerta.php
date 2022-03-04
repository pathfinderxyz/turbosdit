<?php  
	include '../../../coneccion/coneccion.php';
   // include '../../Errores/mostrar_errores.php';

    $surtido = $_POST['surtido'];
    $color= $_POST['color'];
  
	
	$sql = pg_query("UPDATE valores_ni Set 
		color='$color'

		Where id='$surtido'");

    if ($sql) {
		header('Location: ../../../dashboard.php?page=alertas');//Se guardo
	}

 
?>    