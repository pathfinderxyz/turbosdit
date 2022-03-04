<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';

    $cliente= $_POST['cliente'];
    $fecha_rec= $_POST['fechaemi'];
	$direccion = $_POST['direccion'];
	$ciudad= $_POST['ciudad'];
	$rfc = $_POST['rfc'];
	$telefono= $_POST['telefono'];
	$modelo_turbo = $_POST['key'];
	$bomba_iny = $_POST['bomba_iny'];
	$tipo_rep= $_POST['tipo_rep'];
	$importe = $_POST['importe'];
	$a_cuenta = $_POST['a_cuenta'];
	$restan= $_POST['restan'];
	$fecha_entrega = $_POST['fecha_entrega'];
	$observaciones = $_POST['observaciones'];
	$status = 'por aceptar';
	$folio = $_POST['folio'];
	
	
	$sql1 = pg_query($cnx,"INSERT INTO ordenes_trabajo (fecha_rec,cliente,direccion,ciudad,rfc,telefono,modelo_turbo,bomba_iny,tipo_rep,importe,a_cuenta,restan,fecha_entrega,observaciones,status,folio)
	 VALUES ('$fecha_rec','$cliente','$direccion','$ciudad','$rfc','$telefono','$modelo_turbo','$bomba_iny','$tipo_rep','$importe','$a_cuenta','$restan','$fecha_entrega','$observaciones','$status','$folio')");

	$sql2 = pg_query($cnx,"SELECT MAX(n_orden) AS n_orden FROM ordenes_trabajo");
    $info2 = pg_fetch_assoc($sql2);
    $ordenult= $info2['n_orden'];
    $area= 'no asignada';
    $fechaa = date ("Y-m-d");
    $obs= 'nueva orden';
    $status2= 'recepcionada';


	$sql3 = pg_query($cnx,"INSERT INTO historial_ordenes (norden,area_trabajo,fecha,observacion,status) VALUES ('$ordenult','$area','$fechaa','$obs','$status2')");



  if ($sql3) {
		header('Location: ../../dashboard.php?page=recepcion&registro=exitoso');//Se guardo
	}else {
		header('Location: ../../dashboard.php?page=recepcion&registro=fallido');//No se guardo el correo o el pasaporte ya existe !
	}


 
?>  