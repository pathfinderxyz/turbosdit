<?php  
	include '../../coneccion/coneccion.php';
	session_start();


    $estado = $_POST['status'];
    $observaciones = $_POST['observaciones'];
    $num_orden = $_POST['num_orden'];
    $area = $_POST['area'];
    $fecha = date ("Y-m-d");

    $sql2 = pg_query($cnx,"SELECT * FROM usuarios where id='".$_SESSION['id']."'");
    $info = pg_fetch_assoc($sql2);
    $rol=$info['rol'];
    

    $sql = pg_query($cnx,"INSERT INTO historial_ordenes (norden,area_trabajo,fecha,observacion,status) VALUES ('$num_orden','$area','$fecha','$observaciones','$estado')");
	
	$sql2 = pg_query($cnx,"UPDATE ordenes_trabajo Set status='$estado',observaciones='$observaciones' Where n_orden='$num_orden'");

		

    if ($sql2 and $rol=='admin') {
		header('Location: ../../dashboard.php?page=produccion');//Se guardo
	}else{
		header('Location: ../../dashboard.php?page=produccion_ope');
	}

 
?>    