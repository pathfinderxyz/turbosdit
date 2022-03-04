<?php  
	include '../../../coneccion/coneccion.php';
    include '../../../Errores/mostrar_errores.php';
    
    $codigo= $_POST['codigo'];
    $destino= $_POST['ruta'];
	$fecha_salida = $_POST['fecha_salida'];
	$cantidad = $_POST['cantidad'];
	$modelo = $_POST['modelo'];
	$serie = $_POST['serie'];
	$observacion = $_POST['observacion'];
	$folio = $_POST['folio'];
	$gastos = $_POST['gastos'];
	$notas_foliadas = $_POST['notas_foliadas'];
	$familia = $_POST['familia'];
	$movimiento = $_POST['movimiento'];



	
	$sql1 = pg_query("INSERT INTO salidas (codigo_art,nombre_modelo,fecha_salida,cantidad,serie,observacion,folio,gastos,notas_foliadas,familia,concep_movim) VALUES 
		('$codigo','$modelo','$fecha_salida','$cantidad','$serie','$observacion','$folio','$gastos','$notas_foliadas','$familia','$movimiento')");

    $resta = pg_query("SELECT * FROM inventario Where codigo='$codigo'");
    $iresta = pg_fetch_assoc($resta);
    $nueva_cantidad = $iresta['existencia'] - $cantidad;

	$sql2 = pg_query("UPDATE inventario Set 

		fecha_salida='$fecha_salida',
		cantidad_salida='$cantidad',
		destino='$destino',
		folio='$folio',
		existencia='$nueva_cantidad'

		Where codigo='$codigo'");

   if ($sql2) {
		header('Location: ../../../dashboard.php?page=stock&fam=Todos');//Se guardo
	}


 
?>  