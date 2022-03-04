<?php  
	include '../../coneccion/coneccion.php';


    $idnum = $_POST['idnum'];
    $cubiculo = $_POST['cubiculo'];

	
	$sql = pg_query($cnx,"UPDATE cubiculos Set 
		nombre='$cubiculo'

		Where numero='$idnum'");

	

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=cubiculos');//Se guardo
	}

 
?>    