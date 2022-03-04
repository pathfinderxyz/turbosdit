<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';
    
    $codigo= $_POST['codigo'];
    $cod_pedido= $_POST['cod_pedido'];
    $cantidad= $_POST['cantidad'];
	$status = 'Aprobado';
	

    $resta = pg_query("SELECT * FROM inventario Where codigo='$codigo'");
    $iresta = pg_fetch_assoc($resta);
    $nueva_cantidad = $iresta['existencia'] - $cantidad;

	$sql = pg_query("UPDATE inventario Set existencia='$nueva_cantidad' Where codigo='$codigo'");

	$sql2 = pg_query("UPDATE pedidos Set status='$status' Where cod_pedido='$cod_pedido'");

   if ($sql2) {
		header('Location: ../../dashboard.php?page=pedidos');//Se guardo
	}else{
		echo 'Ups ha ocurrido un error';
	}



 
?>  