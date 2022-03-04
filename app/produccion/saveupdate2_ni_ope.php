<?php  
    include '../../coneccion/coneccion.php';
    //include '../../Errores/mostrar_errores2.php';
    
    $idorden = $_POST['ido'];
    $desmontajeo = $_POST['desmontajeo'];
    $inspecciono = $_POST['inspecciono'];
    $platoe= $_POST['platoe'];
    $separadore = $_POST['separadore'];
    $desarmadoo = $_POST['desarmadoo'];
    $armadoo = $_POST['armadoo'];
    $cuerpoe = $_POST['cuerpoe'];
    $separadorradiale = $_POST['separadorradiale'];
    $lavadoo = $_POST['lavadoo'];
    $montajeo = $_POST['montajeo'];
    $turbinae = $_POST['turbinae'];
    $segurose = $_POST['segurose'];
    $clasificadoo = $_POST['clasificadoo'];
    $maquinadoo = $_POST['maquinadoo'];
    $compresore = $_POST['compresore'];
    $anilloe= $_POST['anilloe'];
    $pinturao = $_POST['pinturao'];
    $soldaro = $_POST['soldaro'];
    $cajaescapee = $_POST['cajaescapee'];
    $anillosadmisione = $_POST['anillosadmisione'];
    $cajaadmisione = $_POST['cajaadmisione'];
    $segurosexte = $_POST['segurosexte'];
    $protectore = $_POST['protectore'];
    $tornillose = $_POST['tornillose'];
    $abrazaderase = $_POST['abrazaderase'];
    $deflectoraceiteax = $_POST['deflectoraceiteax'];

    $platoac = $_POST['selloplato'];
    $platoobs = $_POST['platoobs'];

    $cojineteradiale = $_POST['cojineteradiale'];
    $deflectoraceitee = $_POST['deflectoraceitee'];

    $cuerpoac = $_POST['sellocuerpo'];
    $cuerpoobs = $_POST['cuerpoobs'];

    $cojineteaxiale = $_POST['cojineteaxiale'];
    $oringse = $_POST['oringse'];

    $turbinaac = $_POST['alabestu'];
    $turbinaobs = $_POST['turbinaobs'];

    $portanilloe = $_POST['portanilloe'];
    $valvulareguladorae = $_POST['valvulareguladorae'];

    $compresorac = $_POST['ajustarcom'];
    $compresorobs = $_POST['compresorobs'];

    $collaraxiale = $_POST['collaraxiale'];
    $geometriae = $_POST['geometriae'];

    $cajaescapeac = $_POST['barrenarcc'];
    $cajaescapeobs = $_POST['cajaescapeobs'];

    $retenese = $_POST['retenese'];
    $cajaadmisionac = $_POST['barrenarca'];
    $cajaadmisionobs = $_POST['cajaadmisionobs'];

    $protectorcalorac = $_POST['barrenarpc'];
    $protectorcalorobs = $_POST['protectorcalorobs'];

    $abrazaderasac = $_POST['tornilloabra'];
    $abrazaderasobs = $_POST['abrazaderasobs'];

    $retenesac = $_POST['otroret'];
    $retenesobs = $_POST['retenesobs'];

    $geometriaac = $_POST['otrogeo'];
    $geometriaobs = $_POST['geometriaobs'];
    
    $cojinetecond = $_POST['cojinetecond'];
    $segurosextecond = $_POST['segurosextecond'];
    $cojineteaxialcond = $_POST['cojineteaxialcond'];
    $tornilloscond = $_POST['tornilloscond'];
    $portaanillocond = $_POST['portaanillocond'];
    $defleceitecond = $_POST['defleceitecond'];
    $collaraxialcond = $_POST['collaraxialcond'];
    $defleceitecojicond = $_POST['defleceitecojicond'];
    $separadoraxialcond = $_POST['separadoraxialcond'];
    $oringscond = $_POST['oringscond'];
    $separadorradialcond = $_POST['separadorradialcond'];
    $valvularegcond = $_POST['valvularegcond'];
    $segurosinternoscond = $_POST['segurosinternoscond'];
    $otroscond = $_POST['otroscond'];
    $anillosescapecond = $_POST['anillosescapecond'];
    $anillosadmincond = $_POST['anillosadmincond'];
    $balerochicomode = $_POST['balerochicomode'];
    $engranesmode = $_POST['engranesmode'];
    $baleromedianomode = $_POST['baleromedianomode'];
    $basebalerosmode = $_POST['basebalerosmode'];
    $balerograndemode = $_POST['balerograndemode'];
    $arnes = $_POST['arnesmode'];

    $baquetaplato = $_POST['baquetaplato'];
    $otroplato = $_POST['otroplato'];

    $rcuerpo = $_POST['rectificarcuerpo'];
    $renuraracuerpo = $_POST['renuraracuerpo'];
    $soldarcuerpo = $_POST['soldarcuerpo'];

    $ranuratu = $_POST['ranuratu'];
    $rectificartu = $_POST['rectificartu'];
    $alibaltu = $_POST['alibaltu'];

    $soldarcom = $_POST['soldarcom'];
    $acientoscom = $_POST['acientoscom'];
    $otrocom = $_POST['otrocom'];

    $refrescc = $_POST['refrescc'];
    $ajustarcc = $_POST['ajustarcc'];
    $otrocc = $_POST['otrocc'];

    $soldarca = $_POST['soldarca'];
    $refresca = $_POST['refresca'];
    $ajustarca = $_POST['ajustarca'];

    $soldarpc = $_POST['soldarpc'];
    $ajustarpc = $_POST['ajustarpc'];

    $soldarabra = $_POST['soldarabra'];
    $cambioabra = $_POST['cambioabra'];

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

    desmontajeo = '$desmontajeo',
    inspecciono = '$inspecciono',
    platoe= '$platoe',
    separadore = '$separadore',
    desarmadoo = '$desarmadoo',
    armadoo = '$armadoo',
    cuerpoe = '$cuerpoe',
    separadorradiale = '$separadorradiale',
    lavadoo = '$lavadoo',
    montajeo = '$montajeo',
    turbinae = '$turbinae',
    segurose = '$segurose',
    clasificadoo = '$clasificadoo',
    maquinadoo = '$maquinadoo',
    compresore = '$compresore',
    anilloe= '$anilloe',
    pinturao = '$pinturao',
    soldaro = '$soldaro',
    cajaescapee = '$cajaescapee',
    anillosadmisione = '$anillosadmisione',
    cajaadmisione = '$cajaadmisione',
    segurosexte = '$segurosexte',
    protectore = '$protectore',
    tornillose = '$tornillose',
    abrazaderase = '$abrazaderase',
    deflectoraceiteax = '$deflectoraceiteax',
    platoac = '$platoac',
    platoobs = '$platoobs',
    cojineteradiale = '$cojineteradiale',
    deflectoraceitee = '$deflectoraceitee',
    cuerpoac = '$cuerpoac',
    cuerpoobs = '$cuerpoobs',
    cojineteaxiale = '$cojineteaxiale',
    oringse = '$oringse',
    turbinaac = '$turbinaac',
    turbinaobs = '$turbinaobs',
    portanilloe = '$portanilloe',
    valvulareguladorae = '$valvulareguladorae',
    compresorac = '$compresorac',
    compresorobs = '$compresorobs',
    collaraxiale = '$collaraxiale',
    geometriae = '$geometriae',
    cajaescapeac = '$cajaescapeac',
    cajaescapeobs = '$cajaescapeobs',
    retenese = '$retenese',
    cajaadmisionac = '$cajaadmisionac',
    cajaadmisionobs = '$cajaadmisionobs',
    protectorcalorac = '$protectorcalorac',
    protectorcalorobs = '$protectorcalorobs',
    abrazaderasac = '$abrazaderasac',
    abrazaderasobs = '$abrazaderasobs',
    retenesac = '$retenesac',
    retenesobs = '$retenesobs',
    geometriaac = '$geometriaac',
    geometriaobs = '$geometriaobs',
    cojinetecond = '$cojinetecond',
    segurosextecond = '$segurosextecond',
    cojineteaxialcond = '$cojineteaxialcond',
    tornilloscond = '$tornilloscond',
    portaanillocond = '$portaanillocond',
    defleceitecond = '$defleceitecond',
    collaraxialcond = '$collaraxialcond',
    defleceitecojicond = '$defleceitecojicond',
    separadoraxialcond = '$separadoraxialcond',
    oringscond = '$oringscond',
    separadorradialcond = '$separadorradialcond',
    valvularegcond = '$valvularegcond',
    segurosinternoscond = '$segurosinternoscond',
    otroscond = '$otroscond',
    anillosescapecond = '$anillosescapecond',
    anillosadmincond = '$anillosadmincond',
    balerochicomode = '$balerochicomode',
    engranesmode = '$engranesmode',
    baleromedianomode = '$baleromedianomode',
    basebalerosmode = '$basebalerosmode',
    balerograndemode = '$balerograndemode',
    arnes = '$arnes',
    baquetaplato = '$baquetaplato',
    otroplato = '$otroplato',
    rcuerpo = '$rcuerpo',
    renuraracuerpo = '$renuraracuerpo',
    soldarcuerpo = '$soldarcuerpo',
    ranuratu = '$ranuratu',
    rectificartu = '$rectificartu',
    alibaltu = '$alibaltu',
    soldarcom = '$soldarcom',
    acientoscom = '$acientoscom',
    otrocom = '$otrocom',
    refrescc = '$refrescc',
    ajustarcc = '$ajustarcc',
    otrocc = '$otrocc',
    soldarca = '$soldarca',
    refresca = '$refresca',
    ajustarca = '$ajustarca',
    soldarpc = '$soldarpc',
    ajustarpc = '$ajustarpc',
    soldarabra = '$soldarabra',
    cambioabra = '$cambioabra',
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
    }else{
        echo 'Ups ha ocurrido un error!';
    }

?>    