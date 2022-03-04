<?php

  include '../../coneccion/coneccion.php';
  $ido = $_GET['idorden']; 

  $sql = pg_query($cnx,"SELECT * FROM ordenesfni where num_orden = '$ido'");
  $info = pg_fetch_assoc($sql);

  $sql2 = pg_query($cnx,"SELECT * FROM ordenes_trabajo where n_orden = '$ido'");
  $info2 = pg_fetch_assoc($sql2);


 ?>
 <style type="text/css">
   .table-bordered td, .table-bordered th {
    border: 1px solid #aeb0b3 !important;
    padding: 2px !important;
    }

    .icheck-list {
    float: left;
    padding-right: 8px !important;
    padding-top: 8px !important;
    font-size: 11px !important;
    }
    .icheck-list li label {
    padding-left: 5px !important;
   }
 </style>

 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Formato NI</h4>
                    </div>
                </div>
               
    <div class="row">

         <div class="col-12">
             <div class="card card-body printableArea">
              
                        <div class="card">
                             <div class="card-body">
                                 
                                 
                                 <div class="row">
                                     <div class="col-md-4 text-left">
                                     <img src="assets/images/lohoni.jpg" alt="homepage" class="dark-logo" />
                                     </div>
                                     <div class="col-md-4 text-center"><br>
                                     <h4><b>Proceso de Produccion</b></h4>
                                     </div>
                                     <div class="col-md-4 text-right">
                                     <h5><b>Ficha de servicio</b></h5>
                                     <h5><b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     </u></b></h5>
                                     </div>
                                 </div><br>
                                 <div class="row">
                                     <div class="col-md-6">
                                     <h5><b>Nombre del cliente:</b> <span class="pull-right"><u><?php echo $info2['cliente']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                     <div class="col-md-6 text-left">
                                     <h5><b>Empresa:</b> <span class="pull-left"><u><?php echo ''; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-3">
                                     <h5><b>Fecha:</b> <span class="pull-right"><u><?php echo $info['fecha']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                     <div class="col-md-3 text-left">
                                     <h5><b>Modelo turbo:</b> <span class="pull-right"><u><?php echo $info2['modelo_turbo']; ?>&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                     <div class="col-md-3 text-left">
                                     <h5><b>Num Orden:</b> <span class="pull-right"><u>#<?php echo $ido; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                     <div class="col-md-3 text-left">
                                     <h5><b>Serie:</b> <span class="pull-right"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h5>
                                     </div>
                                 </div>


                                 <form  action="app/produccion/saveupdateni.php" method="post">
                                     <div class="table-responsive">
                                     <table class="table table-bordered">
                                       
                                        <tbody>
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Proceso</strong></td>
                                                 <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Descripcion</strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Proceso</strong></td>
                                                 <td class="clasetd" ><strong>Nombre Operario</strong></td>
                                                  <td class="clasetd" ><strong>Proceso</strong></td>
                                                   <td class="clasetd" ><strong>Nombre Operario</strong></td>
                                                    <td class="clasetd" ><strong>Descripcion</strong></td>
                                                     <td class="clasetd" ><strong>Estado</strong></td>
                                                      <td class="clasetd" ><strong>Descripcion</strong></td>
                                                       <td class="clasetd" ><strong>Estado</strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Desmontaje</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['desmontajeo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Inspeccion de calidad</strong></td>
                                                 <td class="clasetd" ><strong>
                                                <?php echo $info['inspecciono'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Plato</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['platoe'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Separador axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['separadore'] ;?>
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Desarmado</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['desarmadoo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Armado</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['armadoo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['cuerpoe'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Separador radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['separadorradiale'] ;?>
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Lavado</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['lavadoo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Montaje</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['montajeo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Turbina</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['turbinae'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Seguros internos</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['segurose'] ;?>
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Clasificado</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['clasificadoo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Maquinado</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['maquinadoo'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['compresore'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Anillos de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['anilloe'] ;?>
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Pintura</strong></td>
                                                <td class="clasetd" ><strong>
                                               <?php echo $info['pinturao'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Soldar</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['soldaro'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Caja de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['cajaescapee'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Anillos de admision</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['anillosadmisione'] ;?>
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Nivel de Reparacion (<?php echo $info2['tipo_rep']; ?>)</strong></td>
                                                <td class="clasetd" ><strong>Caja de admision</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['cajaadmisione'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Seguros externos</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['segurosexte'] ;?>
                                                </strong>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Clasificado de partes de turbocargador</strong></td>
                                                <td class="clasetd"  ><strong>Protector de calor</strong></td>
                                                <td class="clasetd" ><strong>
                                               <?php echo $info['protectore'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>tornillos</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['tornillose'] ;?>
                                                </strong>
                                                </td>
                                                </tr>

                                                <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Piezas</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>Acciones correctivas</strong></td>
                                                <td class="clasetd">Observaciones<strong>
                                                   
                                                </strong></td>
                                                <td class="clasetd" ><strong>Abrazaderas</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['abrazaderase'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Deflector aceite AX</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['deflectoraceiteax'] ;?>
                                                </strong></td>
                                            </tr>
                                          
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Plato</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['platoac'] ;?> &nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['baquetaplato'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['otroplato'] ;?> 

                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                 <?php echo $info['platoobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cojinete radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['cojineteradiale'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Deflector aceite COJ</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <?php echo $info['deflectoraceitee'] ;?>
                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                 <?php echo $info['cuerpoac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['rcuerpo'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['renuraracuerpo'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['soldarcuerpo'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                     <?php echo $info['cuerpoobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cojinete axial</strong></td>
                                                <td class="clasetd" >
                                                 <?php echo $info['cojineteaxiale'] ;?><strong>
                                                  
                                                </strong></td>
                                                <td class="clasetd" ><strong>Orings</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['oringse'] ;?>

                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Turbina</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['turbinaac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['ranuratu'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['rectificartu'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['alibaltu'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                   <?php echo $info['turbinaobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Porta anillo</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['portanilloe'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>valvula reguladora</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['valvulareguladorae'] ;?>

                                                </strong></td>
                                            </tr>
                                            
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                   <?php echo $info['compresorac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['soldarcom'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['acientoscom'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['otrocom'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <?php echo $info['compresorobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Collar axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['collaraxiale'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Geometria</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['geometriae'] ;?>
                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Caja escape</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['cajaescapeac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['refrescc'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['ajustarcc'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['otrocc'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                   <?php echo $info['cajaescapeobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Retenes</strong></td>
                                                <td class="clasetd" ><strong>
                                                <?php echo $info['retenese'] ;?>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>caja admision</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                 <?php echo $info['cajaadmisionac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['soldarca'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['refresca'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['ajustarca'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                   <?php echo $info['cajaadmisionobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd text-center" colspan="4" 
                                                style="background: #cbcfe0;"><strong>Reporte Final (Reparaciones finales)</strong></td>

                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Protector calor</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['protectorcalorac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['soldarpc'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['ajustarpc'] ;?>
                                              </strong></td>
                                                <td class="clasetd"><strong>
                                                   <?php echo $info['protectorcalorobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Turbina</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <?php echo $info['impulsor'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php echo $info['salida'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php echo $info['munones'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php echo $info['ranura'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php echo $info['altura'] ;?>
                                                <strong>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Abrazaderas</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                 <?php echo $info['abrazaderasac'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['soldarabra'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['cambioabra'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                   <?php echo $info['abrazaderasobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <?php echo $info['entrada'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['salidacom'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['alturacom'] ;?>
                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Retenes</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['retenesac'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                  <?php echo $info['retenesobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Conjunto</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                  <?php echo $info['alineacion'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['balanceo'] ;?> 
                                                     

                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Geometria</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                  <?php echo $info['geometriaac'] ;?>
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                 <?php echo $info['geometriaobs'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                  <?php echo $info['ceja'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['rosca'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['dia_sello'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php echo $info['dia_cama'] ;?>
                                                   
                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                          <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>KIT</strong></td>
                                                <td class="clasetd" ><strong>Cojinetes</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                  <?php echo $info['long'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['barreno'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['dia_int'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php echo $info['diaext'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php echo $info['totalext'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php echo $info['totalint'] ;?>
                                                    
                                                             
                                                    <strong>
                                                </strong></td>
                                             </tr> 
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center"><strong>Refaccion</strong></td>
                                                <td class="clasetd  text-center "><strong>Condicion</strong></td>
                                                  <td class="clasetd  text-center "><strong>Refaccion</strong></td>
                                                    <td class="clasetd  text-center "><strong>Condicion</strong></td>
                                                <td class="clasetd" ><strong>Platos</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                  <?php echo $info['unoalt'] ;?>&nbsp;&nbsp;&nbsp; &nbsp;  
                                                  <?php echo $info['dosalt'] ;?> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                  <?php echo $info['tresalt'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php echo $info['diametros'] ;?>
                                                    
                                                    <strong>
                                                </strong></td>
                                             </tr>     
                                                 <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Cojinete radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['cojinetecond'] ;?>

                                                </strong></td>
                                                  <td class="clasetd  "><strong>Seguros externos</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['segurosextecond'] ;?>
                                                </strong></td>
                                                <td class="clasetd" ><strong>Coj axial</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <?php echo $info['toleranciaca'] ;?>
                                                     
                                                    <strong>
                                                </strong></td>
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Cojinete axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['cojineteaxialcond'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Tornillos</strong></td>
                                                 <td class="clasetd" ><strong>
                                                <?php echo $info['tornilloscond'] ;?>

                                                </strong></td>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Observacion final</strong></td>

                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Porta anillo</strong></td>
                                                <td class="clasetd" ><strong>
                                                 <?php echo $info['portaanillocond'] ;?>

                                                </strong></td>
                                                  <td class="clasetd  "><strong>Deflec aceite axial</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['defleceitecond'] ;?>

                                                </strong></td>
                                                <td rowspan="11" colspan="4">
                                                 <?php echo $info['obsfinal'] ;?>
                                             </tr>  

                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Collar axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['collaraxialcond'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Deflec aceite coji</strong></td>
                                                 <td class="clasetd" ><strong>
                                                 <?php echo $info['defleceitecojicond'] ;?>
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Separador axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['separadoraxialcond'] ;?>

                                                </strong></td>
                                                  <td class="clasetd  "><strong>orings</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['oringscond'] ;?>
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>separador radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['separadorradialcond'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>valvula reguladora</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['valvularegcond'] ;?>

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Seguros internos </strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['segurosinternoscond'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>otros</strong></td>
                                                 <td class="clasetd" ><strong>
                                                  <?php echo $info['otroscond'] ;?>

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>anillos de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                   <?php echo $info['anillosescapecond'] ;?>

                                                </strong></td>
                                                  <td class="clasetd  "><strong>anillos de admision</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['anillosadmincond'] ;?>

                                                </strong></td>
                                              
                                             </tr>   
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Modulo</strong></td>
                                             </tr> 
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center"><strong>Descripcion</strong></td>
                                                <td class="clasetd  text-center "><strong>Estado</strong></td>
                                                  <td class="clasetd  text-center "><strong>Descripcion</strong></td>
                                                    <td class="clasetd  text-center "><strong>Estado</strong></td>
                                              
                                             </tr>     
                                                 <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>balero chico</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <?php echo $info['balerochicomode'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>engranes</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <?php echo $info['engranesmode'] ;?>
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>balero mediano</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['baleromedianomode'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Base de baleros</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <?php echo $info['basebalerosmode'] ;?>

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Balero grande</strong></td>
                                                <td class="clasetd" ><strong>
                                                  <?php echo $info['balerograndemode'] ;?>
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Arnes</strong></td>
                                                 <td class="clasetd" ><strong>
                                                   <?php echo $info['arnes'] ;?>
                                                </strong></td>
                                              
                                             </tr>    
                                             

                                          
                                        </tbody>
                                     </table>
                                     <input type="hidden" name="ido" value="<?php echo $ido;?>"> 
                                     
                                     </div>
                                 </form>   
                                 
                            </div>
                              
                        </div>
             </div>
         </div>
     </div>
</div>
