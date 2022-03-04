<?php  
	include '../../../coneccion/coneccion.php';
    //include '../../../Errores/mostrar_errores.php';

    $pieza= $_POST['pieza'];
	$familia = $_POST['familia'];
	$serie = $_POST['serie'];
	$existencia = '0';
	$url_imagen= 'assets/img/example.jpg';

	$observacion = $_POST['observacion'];
	$tipo_anillo = $_POST['tipo_anillo'];
	$condicion = $_POST['condicion'];

    

	$cantidad = $_POST['cantidad'];
	$bodega = $_POST['bodega'];
	$fecha = $_POST['fecha_entrada'];
	$estado = $_POST['nuevo_usado'];
	

   
	
	
	
	
	$sql = pg_query("INSERT INTO inventario (nombre,fecha_ent,observacion,cantida_ent,existencia,familia,serie,tipo_anillo,condicion,url_imagen,bodega) VALUES 
		('$pieza','$fecha','$observacion','$cantidad','$cantidad','$familia','$serie','$tipo_anillo','$condicion','$url_imagen','$bodega')");

	$sql2 = pg_query("SELECT MAX(codigo) AS codigo FROM inventario");
    $info2 = pg_fetch_assoc($sql2);
    $cod_inv= $info2['codigo'];

	$sql3 = pg_query("INSERT INTO entradas (fecha,parte,tipo_parte,cantidad,bodega,usado_nuevo,codigo_parte) VALUES 
		('$fecha','$pieza','$familia','$cantidad','$bodega','$estado','$cod_inv')");


   if ($sql3) {
		header('Location: ../../../dashboard.php?page=stock&fam=Todos');//Se guardo
	}


 
?>  