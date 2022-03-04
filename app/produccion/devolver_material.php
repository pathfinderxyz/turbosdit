<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';
    
    $codigo= $_POST['codigo'];
    $cod_pedido= $_POST['cod_pedido'];
    $cantidad= $_POST['cantidad'];
    $num_orden= $_POST['idorden'];
	$status = 'Devuelto';
	

    $suma = pg_query($cnx,"SELECT * FROM inventario Where codigo='$codigo'");
    $isuma = pg_fetch_assoc($suma);
    $nueva_cantidad = $isuma['existencia'] + $cantidad;

	$sql = pg_query($cnx,"UPDATE inventario Set existencia='$nueva_cantidad' Where codigo='$codigo'");

	$sql2 = pg_query($cnx,"UPDATE pedidos Set status='$status' Where cod_pedido='$cod_pedido'");

   if ($sql2) {
		header('Location: ../../dashboard.php?page=requisicion_list&idorden='.$num_orden.'');//Se guardo
	}else{
		echo 'Ups ha ocurrido un error';
	}



 
?>  