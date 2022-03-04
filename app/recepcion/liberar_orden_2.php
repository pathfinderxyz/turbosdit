<?php  
	include '../../coneccion/coneccion.php';


    
    $num_orden = $_POST['num_orden'];
    $num_cubi = $_POST['cubiculo'];
    $estado = 'Disponible';
    $cubiculo='';
    $operador = '';
   


	$sql3 = pg_query("UPDATE cubiculos SET estado='$estado' Where numero='$num_cubi'");

	$sql = pg_query("UPDATE ordenes_trabajo Set cubiculo='$cubiculo' Where n_orden='$num_orden'");

	$sql2 = pg_query("UPDATE ordenes_trabajo Set operador='$operador' Where n_orden='$num_orden'");

	

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=ordenes_ent');//Se guardo
	}

 
?>    