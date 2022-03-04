<?php  
	include '../../coneccion/coneccion.php';


    $cubiculo = $_POST['cubiculo'];
    $num_orden = $_POST['num_orden'];
    $estado = 'No disponible';

    $fecha = date ("Y-m-d");
    $status = 'Recibido';
    $observacion = 'cubiculo asignado';

   


	
	$sql = pg_query($cnx,"UPDATE ordenes_trabajo Set cubiculo='$cubiculo' Where n_orden='$num_orden'");

    $sql2 = pg_query($cnx,"SELECT * from cubiculos where numero='$cubiculo'");
    $row2 = pg_fetch_assoc($sql2);
    $operador = $row2['operario'];

    $sql3 = pg_query($cnx,"UPDATE ordenes_trabajo Set operador='$operador' Where n_orden='$num_orden'");


	$sql4 = pg_query($cnx,"UPDATE cubiculos SET estado='$estado' Where numero='$cubiculo'");

	$sql5 = pg_query($cnx,"INSERT INTO historial_ordenes (norden,area_trabajo,fecha,observacion,status) VALUES ('$num_orden','$cubiculo ','$fecha','$observaciones','$status')");

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=ordenes_ent');//Se guardo
	}

 
?>    