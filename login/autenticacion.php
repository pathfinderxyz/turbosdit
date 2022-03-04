<?php
session_start();
include ("../errores/mostrar_errores.php");
include ("../coneccion/coneccion.php");

     $usuario= $_POST['username'];
     $password= $_POST['password'];

$result=pg_query($cnx,"select * from usuarios where usuario='$usuario' AND password='$password'"); 

//si la consulta dio existosa guardo en result y con pg_num_rows saco la cantidad y la siguiente condicional
// en este if pregunto si el resultado de la consulta es mayor q 0 hago lo siguiente
if (pg_num_rows($result) > '0'){

	$info = pg_fetch_assoc($result);
       
    $_SESSION["autenticado"]= "SI";
    header ("Location: ../dashboard.php?page=home&id=".$info['id']."");

}else {

//si no existe se va a login.php
header("Location: ../index.php?errorusuario=si");
}

?>
