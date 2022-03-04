<?php  
	include '../../coneccion/coneccion.php';
	//include "../../Errores/mostrar_errores.php";


    $id_orden = $_POST['ido'];
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
	
	$fecha = date('Y-m-d');

	$formatoni = 'si';
  
	
	$sql = pg_query($cnx,"INSERT INTO ordenesfni
		(num_orden,		
desmontajeo,
  inspecciono,
  platoe,
  separadore,
  desarmadoo,
  armadoo,
  cuerpoe,
  separadorradiale,
  lavadoo,
  montajeo,
  turbinae,
  segurose,
  clasificadoo,
  maquinadoo,
  compresore,
  anilloe,
  pinturao,
  soldaro,
  cajaescapee,
  anillosadmisione,
  cajaadmisione,
  segurosexte,
  protectore,
  tornillose,
  abrazaderase,
  deflectoraceiteax,
  platoac,
  platoobs,
  cojineteradiale,
  deflectoraceitee,
  cuerpoac,
  cuerpoobs,
  cojineteaxiale,
  oringse,
  turbinaac,
  turbinaobs,
  portanilloe,
  valvulareguladorae,
  compresorac,
  compresorobs,
  collaraxiale,
  geometriae,
  cajaescapeac,
  cajaescapeobs,
  retenese,
  cajaadmisionac,
  cajaadmisionobs,
  protectorcalorac,
  protectorcalorobs,
  abrazaderasac,
  abrazaderasobs,
  retenesac,
  retenesobs,
  geometriaac,
  geometriaobs,
  cojinetecond,
  segurosextecond,
  cojineteaxialcond,
  tornilloscond,
  portaanillocond,
  defleceitecond,
  collaraxialcond,
  defleceitecojicond,
  separadoraxialcond,
  oringscond,
  separadorradialcond,
  valvularegcond,
  segurosinternoscond,
  otroscond,
  anillosescapecond,
  anillosadmincond,
  balerochicomode,
  engranesmode,
  baleromedianomode,
  basebalerosmode,
  balerograndemode,
  fecha,
  arnes,
  baquetaplato,
  otroplato,
  rcuerpo,
  renuraracuerpo,
  soldarcuerpo,
  ranuratu,
  rectificartu,
  alibaltu,
  soldarcom,
  acientoscom,
  otrocom,
  refrescc,
  ajustarcc,
  otrocc,
  soldarca,
  refresca,
  ajustarca,
  soldarpc,
  ajustarpc,
  soldarabra,
  cambioabra
  ) 
		VALUES (
'$id_orden',
'$desmontajeo',
'$inspecciono',
'$platoe',
'$separadore',
'$desarmadoo',
'$armadoo',
'$cuerpoe',
'$separadorradiale',
'$lavadoo',
'$montajeo',
'$turbinae',
'$segurose',
'$clasificadoo',
'$maquinadoo',
'$compresore',
'$anilloe',
'$pinturao',
'$soldaro',
'$cajaescapee',
'$anillosadmisione',
'$cajaadmisione',
'$segurosexte',
'$protectore',
'$tornillose',
'$abrazaderase',
'$deflectoraceiteax',
'$platoac',
'$platoobs',
'$cojineteradiale',
'$deflectoraceitee',
'$cuerpoac',
'$cuerpoobs',
'$cojineteaxiale',
'$oringse',
'$turbinaac',
'$turbinaobs',
'$portanilloe',
'$valvulareguladorae',
'$compresorac',
'$compresorobs',
'$collaraxiale',
'$geometriae',
'$cajaescapeac',
'$cajaescapeobs',
'$retenese',
'$cajaadmisionac',
'$cajaadmisionobs',
'$protectorcalorac',
'$protectorcalorobs',
'$abrazaderasac',
'$abrazaderasobs',
'$retenesac',
'$retenesobs',
'$geometriaac',
'$geometriaobs',
'$cojinetecond',
'$segurosextecond',
'$cojineteaxialcond',
'$tornilloscond',
'$portaanillocond',
'$defleceitecond',
'$collaraxialcond',
'$defleceitecojicond',
'$separadoraxialcond',
'$oringscond',
'$separadorradialcond',
'$valvularegcond',
'$segurosinternoscond',
'$otroscond',
'$anillosescapecond',
'$anillosadmincond',
'$balerochicomode',
'$engranesmode',
'$baleromedianomode',
'$basebalerosmode',
'$balerograndemode',
'$fecha',
'$arnes',
'$baquetaplato',
'$otroplato',
'$rcuerpo',
'$renuraracuerpo',
'$soldarcuerpo',
'$ranuratu',
'$rectificartu',
'$alibaltu',
'$soldarcom',
'$acientoscom',
'$otrocom',
'$refrescc',
'$ajustarcc',
'$otrocc',
'$soldarca',
'$refresca',
'$ajustarca',
'$soldarpc',
'$ajustarpc',
'$soldarabra',
'$cambioabra')");

   $sql2 = pg_query("UPDATE ordenes_trabajo Set formatoni='$formatoni' Where n_orden='$id_orden'");

   if ($sql) {
		header('Location: ../../dashboard.php?page=ordenes_ent');//Se guardo
	}else {
		echo 'Ups a ocurrido un error';
	}
?>          
