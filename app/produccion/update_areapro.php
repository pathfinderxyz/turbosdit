<?php  
	include '../../coneccion/coneccion.php';
	session_start();


    $cubiculo = $_POST['cubiculo'];
    $cub_anterior = $_POST['cub_anterior'];
    $num_orden = $_POST['num_orden'];
    $estado = 'No disponible';
    $estado2 = 'Disponible';

    $fecha = date ("Y-m-d");
    $status = 'Recibido';
    $observacion = 'Cambio de area de trabajo';

   


	
	$sql = pg_query($cnx,"UPDATE ordenes_trabajo Set cubiculo='$cubiculo' Where n_orden='$num_orden'");

    $sql2 = pg_query($cnx,"SELECT * from cubiculos where numero='$cubiculo'");
    $row2 = pg_fetch_assoc($sql2);
    $operador = $row2['operario'];

    $sql3 = pg_query($cnx,"UPDATE ordenes_trabajo Set operador='$operador' Where n_orden='$num_orden'");

    $sql4 = pg_query($cnx,"UPDATE cubiculos SET estado='$estado2' Where numero='$cub_anterior'");

	$sql5 = pg_query($cnx,"UPDATE cubiculos SET estado='$estado' Where numero='$cubiculo'");


	$sql6 = pg_query($cnx,"SELECT * FROM usuarios where id='".$_SESSION['id']."'");
    $info = pg_fetch_assoc($sql6);
    $rol=$info['rol'];

    $sql7 = pg_query($cnx,"INSERT INTO historial_ordenes (norden,area_trabajo,fecha,observacion,status) VALUES ('$num_orden','$cubiculo','$fecha','$observacion','$status')");

	if ($sql and $rol=='admin') {
		header('Location: ../../dashboard.php?page=produccion');//Se guardo
	}else{
		header('Location: ../../dashboard.php?page=produccion_ope');
	}


 
?>    