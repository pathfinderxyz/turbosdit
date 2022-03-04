<?php  
	$user = 'lgfzczwaihrgid';
	$passwd = 'b0ef062096e9f2beb863f23e9c88ed2665c0c72249db3da2c5dee196a36ed253';
	$db = 'dem44go1h3n0vm';
	$port = 5432;
	$host = 'ec2-54-156-149-189.compute-1.amazonaws.com';
	$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());

?>