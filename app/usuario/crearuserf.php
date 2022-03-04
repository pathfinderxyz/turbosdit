<?php  
	include '../../coneccion/coneccion.php';
 include '../../Errores/mostrar_errores.php';

    $nombre= $_POST['nombre'];
	$pass = $_POST['pass'];
	$perfil = $_POST['perfil'];
	$caracteristicas = $_POST['caracteristicas'];
	$activo='si';
	$estado='Disponible';
	
	
  
	
	$sql = pg_query($cnx,"INSERT INTO usuarios (usuario,password,rol,caracteristicas,activo,estado) VALUES ('$nombre','$pass','$perfil','$caracteristicas','$activo','$estado')");

   if ($sql) {
		header('Location: ../../dashboard.php?page=listusuario');//Se guardo
	}


 
?>  