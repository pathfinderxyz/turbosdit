<?php  
	$user = 'amaszjpzoroxuv';
	$passwd = '0d97022743dce2876808c13b377f0b27ce49ff07edb7256cb5741fc8222325bb';
	$db = 'da6ojti9kjs5p8';
	$port = 5432;
	$host = 'ec2-34-206-148-196.compute-1.amazonaws.com';
	$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());

?>
