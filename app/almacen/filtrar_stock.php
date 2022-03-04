<?php  
	include '../../../coneccion/coneccion.php';
   // include '../../Errores/mostrar_errores.php';

    $fam = $_POST['familia_stock'];
  

    if ($fam != '') {
		header('Location: ../../dashboard.php?page=stock&fam='.$fam.'');//Se guardo
	}

 
?>    