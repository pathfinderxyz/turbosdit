<?php  
	include '../../../coneccion/coneccion.php';
    include '../../../Errores/mostrar_errores.php';
    
    $partes= $_POST['partes'];
	$cantidad = $_POST['cantidad'];
	$pertenece_a = $_POST['pertenece_a'];
	$bodega = $_POST['bodega'];
	$fecha = $_POST['fecha_entrada'];
	$estado = $_POST['nuevo_usado'];
	

    $codigo= $_POST['codigo'];
    $observacion = $_POST['observacion'];
	$tipo_anillo = $_POST['tipo_anillo'];
	$condicion = $_POST['condicion'];
	


	
	
	$sql1 = pg_query($cnx,"INSERT INTO entradas (fecha,parte,tipo_parte,cantidad,bodega,usado_nuevo,codigo_parte) VALUES 
		('$fecha','$partes','$pertenece_a','$cantidad','$bodega','$estado','$codigo')");

    $suma = pg_query($cnx,"SELECT * FROM inventario Where codigo='$codigo'");
    $isuma = pg_fetch_assoc($suma);
    $nueva_cantidad = $isuma['existencia'] + $cantidad;

	$sql2 = pg_query($cnx,"UPDATE inventario Set 

		fecha_ent='$fecha',
		cantida_ent='$cantidad',
		existencia='$nueva_cantidad',
		observacion='$observacion',
		tipo_anillo='$tipo_anillo',
		condicion='$condicion',
		bodega='$bodega'

		Where codigo='$codigo'");

   if ($sql2) {
		header('Location: ../../../dashboard.php?page=stock&fam=Todos');//Se guardo
	}


 
?>  