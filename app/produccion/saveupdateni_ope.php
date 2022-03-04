<?php  
	include '../../coneccion/coneccion.php';
	//include '../../Errores/mostrar_errores2.php';
    
    $idorden = $_POST['ido'];

    $impulsor = $_POST['impulsor'];
    $salida = $_POST['salida'];
    $munones = $_POST['munones'];
    $ranura = $_POST['ranura'];
    $altura = $_POST['altura'];
    $entrada = $_POST['entrada'];
    $salidacom = $_POST['salidacom'];
    $alturacom = $_POST['alturacom'];
    $alineacion = $_POST['alineacion'];
    $balanceo = $_POST['balanceo'];
    $ceja = $_POST['ceja'];
    $rosca = $_POST['rosca'];
    $dia_sello = $_POST['dia_sello'];
    $dia_cama = $_POST['dia_cama'];
    $long = $_POST['long'];
    $barreno = $_POST['barreno'];
    $dia_int = $_POST['dia_int'];
    $diaext = $_POST['diaext'];
    $totalext = $_POST['totalext'];
    $totalint = $_POST['totalint'];
    $unoalt = $_POST['unoalt'];
    $dosalt = $_POST['dosalt'];
    $tresalt = $_POST['tresalt'];
    $diametros = $_POST['diametros'];
    $toleranciaca = $_POST['toleranciaca'];
    $obsfinal = $_POST['obsfinal'];
    $repfinal = 'si';


	
	$sql = pg_query ("UPDATE ordenesfni Set 

	impulsor = '$impulsor',
    salida = '$salida',
    munones = '$munones',
    ranura = '$ranura',
    altura = '$altura',
    entrada = '$entrada',
    salidacom = '$salidacom',
    alturacom = '$alturacom',
    alineacion = '$alineacion',
    balanceo = '$balanceo',
    ceja = '$ceja',
    rosca = '$rosca',
    dia_sello = '$dia_sello',
    dia_cama = '$dia_cama',
    long = '$long',
    barreno = '$barreno',
    dia_int = '$dia_int',
    diaext = '$diaext',
    totalext = '$totalext',
    totalint = '$totalint',
    unoalt = '$unoalt',
    dosalt = '$dosalt',
    tresalt = '$tresalt',
    diametros = '$diametros',
    toleranciaca = '$toleranciaca',
    obsfinal = '$obsfinal'

	Where num_orden = '$idorden'");

	$sql2 = pg_query("UPDATE ordenes_trabajo Set rep_final='$repfinal' Where n_orden='$idorden'");


    if ($sql) {
		header('Location: ../../dashboard.php?page=produccion_ope');//Se guardo
	}
?>    