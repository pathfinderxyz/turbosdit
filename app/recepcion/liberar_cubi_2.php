<?php  
	include '../../coneccion/coneccion.php';


    $operador = '';
    $num_cubi = $_POST['num_cubi'];
    $estado = 'Disponible';
    $cubiculo='';
   


	
	$sql = pg_query("UPDATE cubiculos Set operario='$operador' Where numero='$num_cubi'");

	$sql2 = pg_query("UPDATE usuarios SET estado='$estado' Where cubiculo='$num_cubi'");

	$sql3 = pg_query("UPDATE usuarios SET cubiculo='$cubiculo' Where cubiculo='$num_cubi'");

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=cubiculos');//Se guardo
	}

 
?>    