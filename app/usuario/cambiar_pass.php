
<?php  
	include '../../coneccion/coneccion.php';
    include '../../Errores/mostrar_errores.php';

    $id_user= $_POST['id_user'];
	$pass = $_POST['pass'];
	
    $sql = pg_query("UPDATE usuarios Set password='$pass' Where id='$id_user'");

   if ($sql) {
		header('Location: ../../dashboard.php?page=listusuario');//Se guardo
	}else{
		echo 'Ups ha ocurrido un error';
	}


 
?>  