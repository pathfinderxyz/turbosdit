<?php  
	include '../../coneccion/coneccion.php';


    $operador = $_POST['operador'];
    $num_cubi = $_POST['num_cubi'];
    $estado = 'Disponible';

   


	
	$sql = pg_query($cnx,"UPDATE cubiculos Set operario='$operador' Where numero='$num_cubi'");

	$sql2 = pg_query($cnx,"UPDATE usuarios SET cubiculo='$num_cubi' Where usuario='$operador'" );

	$sql3 = pg_query($cnx,"UPDATE usuarios SET estado='$estado' Where usuario='$operador'");

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=cubiculos');//Se guardo
	}

 
?>    