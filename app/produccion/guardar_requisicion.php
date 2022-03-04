<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';
    
    $n_orden = $_POST['n_orden'];
    $operador= $_POST['operador'];
    $fecha_requisicion= $_POST['fecha_requisicion'];
	$folio = $_POST['folio'];
	$cantidad = $_POST['cantidad'];
	$material = $_POST['material'];
	$area = $_POST['area'];
	$ni = $_POST['ni'];
	$observacion = $_POST['observacion'];
	$status = "sin aprobar";
	


	
	$sql = pg_query($cnx,"INSERT INTO pedidos (operador,peticion,status,fecha,cantidad,ni,folio,observacion,area) VALUES 
		('$operador','$material','$status','$fecha_requisicion','$cantidad','$ni','$folio','$observacion','$area')");

   if ($sql) {
		header('Location: ../../dashboard.php?page=requisicion_list&idorden='.$n_orden.'');//Se guardo
	}


 
?>  