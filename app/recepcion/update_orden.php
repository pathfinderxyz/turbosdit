<?php  
	include '../../coneccion/coneccion.php';
    //include '../../Errores/mostrar_errores.php';

    $cliente= $_POST['cliente'];
	$direccion = $_POST['direccion'];
	$ciudad= $_POST['ciudad'];
	$rfc = $_POST['rfc'];
	$telefono= $_POST['telefono'];
	$modelo_turbo = $_POST['modelo_turbo'];
	$bomba_iny = $_POST['bomba_iny'];
	$tipo_rep= $_POST['tipo_rep'];
	$importe = $_POST['importe'];
	$a_cuenta = $_POST['a_cuenta'];
	$restan= $_POST['restan'];
	$fecha_entrega = $_POST['fecha_entrega'];
	$observaciones = $_POST['observaciones'];

	$n_orden = $_POST['n_orden'];
	
	
	$sql1 = pg_query("UPDATE ordenes_trabajo SET

	cliente='$cliente',
	direccion='$direccion',
	ciudad='$ciudad',
	rfc='$rfc',
	telefono='$telefono',
	modelo_turbo='$modelo_turbo',
	bomba_iny='$bomba_iny',
	tipo_rep='$tipo_rep',
	importe='$importe',
	a_cuenta='$a_cuenta',
	restan='$restan',
	fecha_entrega='$fecha_entrega',
	observaciones='$observaciones'

	Where n_orden='$n_orden'");


  if ($sql1) {
		header('Location: ../../dashboard.php?page=ordenes_ent');//Se guardo
	}

?>  