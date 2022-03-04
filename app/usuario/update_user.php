<?php  
	include '../../coneccion/coneccion.php';


    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    $caracteristicas = $_POST['caracteristicas'];
    $iduser = $_POST['iduser'];

   


	
	$sql = pg_query($cnx,"UPDATE usuarios Set 
		usuario='$usuario',
		rol='$rol',
		caracteristicas='$caracteristicas'  

		Where id='$iduser'");

	

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=listusuario');//Se guardo
	}

 
?>    