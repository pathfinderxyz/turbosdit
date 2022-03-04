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
    .reducir{
        font-size: 11px !important;
        width: 20px !important;
        margin-right: -15px !important;
    }
    .form-group {
    margin-bottom: 5px !important;
        margin-left: -30px !important;
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


                                 <form  action="app/produccion/saveupdate2_ni.php" method="post">
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
                                                     <td class="clasetd" style="width: 100px;"><strong>Estado</strong></td>
                                                      <td class="clasetd" ><strong>Descripcion</strong></td>
                                                       <td class="clasetd" style="width: 100px;"><strong>Estado</strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd"><strong>Desmontaje</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="desmontajeo">'; 
                                                   <?php    
                                                    echo '<option value="'.$info['desmontajeo'].'">'.$info['desmontajeo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['desmontajeo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                 
                                                </strong></td>
                                                <td class="clasetd" ><strong>Inspeccion de calidad</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="inspecciono">'; 
                                                    <?php    
                                                    echo '<option value="'.$info['inspecciono'].'">'.$info['inspecciono'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['inspecciono']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Plato</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="platoe">
                                                    <?php    
                                                    echo '<option value="'.$info['platoe'].'">'.$info['platoe'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['platoe']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Separador axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="separadore" >
                                                      <?php    
                                                    echo '<option value="'.$info['separadore'].'">'.$info['separadore'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['separadore']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Desarmado</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="desarmadoo">'; 
                                                  <?php    
                                                    echo '<option value="'.$info['desarmadoo'].'">'.$info['desarmadoo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['desarmadoo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Armado</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="armadoo">'; 
                                                   <?php    
                                                    echo '<option value="'.$info['armadoo'].'">'.$info['armadoo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['armadoo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cuerpoe">
                                                    <?php    
                                                    echo '<option value="'.$info['cuerpoe'].'">'.$info['cuerpoe'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['cuerpoe']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                  </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Separador radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="separadorradiale">
                                                   <?php    
                                                    echo '<option value="'.$info['separadorradiale'].'">'.$info['separadorradiale'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['separadorradiale']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                  </select>
                                              
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Lavado</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="lavadoo">'; 
                                                   <?php    
                                                    echo '<option value="'.$info['lavadoo'].'">'.$info['lavadoo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['lavadoo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Montaje</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="montajeo">'; 
                                                  <?php    
                                                    echo '<option value="'.$info['montajeo'].'">'.$info['montajeo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['montajeo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Turbina</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="turbinae" >
                                                     <?php    
                                                    echo '<option value="'.$info['turbinae'].'">'.$info['turbinae'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['turbinae']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Seguros internos</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="segurose" >
                                                   <?php    
                                                    echo '<option value="'.$info['segurose'].'">'.$info['segurose'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['segurose']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Clasificado</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="clasificadoo">'; 
                                                   <?php    
                                                    echo '<option value="'.$info['clasificadoo'].'">'.$info['clasificadoo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['clasificadoo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Maquinado</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="maquinadoo">'; 
                                                  <?php    
                                                    echo '<option value="'.$info['maquinadoo'].'">'.$info['maquinadoo'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['maquinadoo']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="compresore">
                                                    <?php    
                                                    echo '<option value="'.$info['compresore'].'">'.$info['compresore'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['compresore']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                                <td class="clasetd" ><strong>Anillos de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="anilloe">
                                                     <?php    
                                                    echo '<option value="'.$info['anilloe'].'">'.$info['anilloe'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['anilloe']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd" ><strong>Pintura</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="pinturao">'; 
                                                  <?php    
                                                    echo '<option value="'.$info['pinturao'].'">'.$info['pinturao'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['pinturao']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                              
                                                </strong></td>
                                                <td class="clasetd" ><strong>Soldar</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category"  name="soldaro">'; 
                                                  <?php    
                                                    echo '<option value="'.$info['soldaro'].'">'.$info['soldaro'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from usuarios where rol='operario' and usuario != '".$info['soldaro']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Caja de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cajaescapee" >
                                                   <?php    
                                                    echo '<option value="'.$info['cajaescapee'].'">'.$info['cajaescapee'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['cajaescapee']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Anillos de admision</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="anillosadmisione" >
                                                   <?php    
                                                    echo '<option value="'.$info['anillosadmisione'].'">'.$info['anillosadmisione'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['anillosadmisione']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                            </tr>
                                             <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Nivel de Reparacion (<?php echo $info2['tipo_rep']; ?>)</strong></td>
                                                <td class="clasetd" ><strong>Caja de admision</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cajaadmisione">
                                                   <?php    
                                                    echo '<option value="'.$info['cajaadmisione'].'">'.$info['cajaadmisione'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['cajaadmisione']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                                <td class="clasetd" ><strong>Seguros externos</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="segurosexte">
                                                   <?php    
                                                    echo '<option value="'.$info['segurosexte'].'">'.$info['segurosexte'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['segurosexte']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Clasificado de partes de turbocargador</strong></td>
                                                <td class="clasetd"  ><strong>Protector de calor</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="protectore">
                                                   <?php    
                                                    echo '<option value="'.$info['protectore'].'">'.$info['protectore'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['protectore']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                                <td class="clasetd" ><strong>tornillos</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="tornillose">
                                                    <?php    
                                                    echo '<option value="'.$info['tornillose'].'">'.$info['tornillose'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['tornillose']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
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
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="abrazaderase">
                                                   <?php    
                                                    echo '<option value="'.$info['abrazaderase'].'">'.$info['abrazaderase'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['abrazaderase']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                   
                                                  </select>
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Deflector aceite AX</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="deflectoraceiteax">
                                                   <?php    
                                                    echo '<option value="'.$info['deflectoraceiteax'].'">'.$info['deflectoraceiteax'].'</option>'; 
                                                    $sql = pg_query($cnx,"SELECT * from valores_ni where descripcion != '".$info['deflectoraceiteax']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                            </tr>
                                          
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                            
                                                <td class="clasetd" ><strong>Plato</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                     <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li>
                                                                <?php 
                                                                    if ($info['platoac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="selloplato" value="sello" class="check" <?php echo $checked ;?> >
                                                                <label for="square-checkbox-1">Sello</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li>
                                                                 <?php 
                                                                    if ($info['baquetaplato']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="baquetaplato" value="ins baquela" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Ins baquela</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li>
                                                                 <?php 
                                                                    if ($info['otroplato']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="otroplato" value="otro" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Otro</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                

                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="platoobs" value="<?php echo $info['platoobs'] ;?>" class="form-control">
                            
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cojinete radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cojineteradiale" >
                                                  <?php    
                                                    echo '<option value="'.$info['cojineteradiale'].'">'.$info['cojineteradiale'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['cojineteradiale']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Deflector aceite COJ</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="deflectoraceitee" >
                                                   <?php    
                                                    echo '<option value="'.$info['deflectoraceitee'].'">'.$info['deflectoraceitee'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['deflectoraceitee']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                   
                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li> <?php 
                                                                    if ($info['cuerpoac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="sellocuerpo" value="sello" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Sello</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['rcuerpo']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="rectificarcuerpo" value="rectificar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Rectificar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['renuraracuerpo']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="renuraracuerpo" value="ranurara" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Renurara</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['soldarcuerpo']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="soldarcuerpo" value="soldar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">soldar</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="cuerpoobs" value="<?php echo $info['cuerpoobs'] ;?>"class="form-control">
                                                 
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cojinete axial</strong></td>
                                                <td class="clasetd" >
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cojineteaxiale">
                                                   <?php    
                                                    echo '<option value="'.$info['cojineteaxiale'].'">'.$info['cojineteaxiale'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['cojineteaxiale']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                             
                                                  
                                                </strong></td>
                                                <td class="clasetd" ><strong>Orings</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="oringse">
                                                    <?php    
                                                    echo '<option value="'.$info['oringse'].'">'.$info['oringse'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['oringse']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                            

                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Turbina</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['turbinaac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="alabestu" value="alabes" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Alabes</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['ranuratu']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="ranuratu" value="ranura" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Ranura</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['rectificartu']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="rectificartu" value="rectificar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Rectificar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['alibaltu']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="alibaltu" value="alibal" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Ali-Bal</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                 
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="platoobs" value="<?php echo $info['turbinaobs'] ;?>" class="form-control">
                                                   
                                                </strong></td>
                                                <td class="clasetd" ><strong>Porta anillo</strong></td>
                                                <td class="clasetd" ><strong>
                                                      <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="portanilloe">
                                                   <?php    
                                                    echo '<option value="'.$info['portanilloe'].'">'.$info['portanilloe'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['portanilloe']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>valvula reguladora</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="valvulareguladorae" >
                                                   <?php    
                                                    echo '<option value="'.$info['valvulareguladorae'].'">'.$info['valvulareguladorae'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['valvulareguladorae']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                  

                                                </strong></td>
                                            </tr>
                                            
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                     <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['compresorac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="ajustarcom" value="ajustar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Ajustar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['soldarcom']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="soldarcom" value="soldar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Soldar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['acientoscom']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="acientoscom" value="de acientos" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">de acientos</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['otrocom']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="otrocom" value="otro" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Otro</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                   
                                                  
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="compresorobs"  value="<?php echo $info['compresorobs'] ;?>" class="form-control">
                                                  
                                                </strong></td>
                                                <td class="clasetd" ><strong>Collar axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="collaraxiale">
                                                   <?php    
                                                    echo '<option value="'.$info['collaraxiale'].'">'.$info['collaraxiale'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['collaraxiale']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Geometria</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="geometriae">
                                                    <?php    
                                                    echo '<option value="'.$info['geometriae'].'">'.$info['geometriae'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['geometriae']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Caja escape</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                      <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['cajaescapeac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="barrenarcc" value="barrenar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Barrenar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['refrescc']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="refrescc" value="refres roscas" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Refres roscas</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['ajustarcc']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="ajustarcc" value="ajustar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">ajustar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['otrocc']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="otrocc" value="otro" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Otro</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                             
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="cajaescapeobs" value="<?php echo $info['cajaescapeobs'] ;?>" class="form-control">
                                                
                                                </strong></td>
                                                <td class="clasetd" ><strong>Retenes</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="retenese">
                                                    <?php    
                                                    echo '<option value="'.$info['retenese'].'">'.$info['retenese'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['retenese']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                             
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>caja admision</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['cajaadmisionac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="barrenarca" value="barrenar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Barrenar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['soldarca']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="soldarca" value="soldar roscas" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">soldar boca</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['refresca']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="refresca" value="refres rosca" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Refres rosca</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['ajustarca']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="ajustarca" value="ajustar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">ajustar</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                           
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="cajaadmisionobs" value="<?php echo $info['cajaadmisionobs'] ;?>" class="form-control">
                                                  
                                                </strong></td>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Reporte Final</strong></td>

                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Protector calor</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['protectorcalorac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="barrenarpc" value="barrenar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Barrenar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['soldarpc']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="soldarpc" value="soldar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">soldar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['ajustarpc']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="ajustarpc" value="ajustar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">ajustar</label>
                                                            </li>
                                                        </ul>
                                                     
                                                    </div>
                                                 
                                              </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="protectorcalorobs" value="<?php echo $info['protectorcalorobs'] ;?>" class="form-control">
                                                
                                                </strong></td>
                                                <td class="clasetd"><strong>Turbina</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Impulsor</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="impulsor" value="<?php echo $info['impulsor'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">salida</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="salida" value="<?php echo $info['salida'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">muñones</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="munones" value="<?php echo $info['munones'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     
                                                      
                                                      </div>
                                                    
                                                 </div>
                                                 <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Altura</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="altura" value="<?php echo $info['altura'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Ranura</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="ranura" value="<?php echo $info['ranura'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      
                                                      
                                                      </div>
                                                    
                                                 </div>
                                                 
                                                </td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Abrazaderas</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['abrazaderasac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="tornilloabra" value="cambio tornillo" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Cambio tornillo</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['soldarabra']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="soldarabra" value="soldar" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">soldar</label>
                                                            </li>
                                                        </ul>
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['cambioabra']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="cambioabra" value="cambio de tuercas" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">cambio de tuercas</label>
                                                            </li>
                                                        </ul>
                                                     
                                                    </div>
                                               
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="abrazaderasobs" value="<?php echo $info['abrazaderasobs'] ;?>" class="form-control">
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Compresor</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Entrada</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="entrada" value="<?php echo $info['entrada'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">salida</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="salidacom" value="<?php echo $info['salidacom'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">altura</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="alturacom" value="<?php echo $info['alturacom'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                    
                                                 </div>

                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Retenes</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                     <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['retenesac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="otroret" value="otro" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Otro</label>
                                                            </li>
                                                        </ul>
                                                       
                                                     
                                                    </div>
                                                 
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                    <input type="text" name="retenesobs"  value="<?php echo $info['retenesobs'] ;?>" class="form-control">
                                               
                                                </strong></td>
                                                <td class="clasetd" ><strong>Conjunto</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                     <div class="row">
                                                       <div class="col-md-6">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Alineacion</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="alineacion" value="<?php echo $info['alineacion'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-6">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Balanceo</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="balanceo" value="<?php echo $info['balanceo'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     
                                                     
                                                      
                                                      </div>

                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                            <!-- //////////////////////////////////////////////////////////////////////-->
                                                 <tr>
                                                <td class="clasetd" ><strong>Geometria</strong></td>
                                               
                                                <td class="clasetd  text-center " colspan="2"><strong>
                                                    <div class="input-group">
                                                        <ul class="icheck-list">
                                                            <li><?php 
                                                                    if ($info['geometriaac']!='') {
                                                                        $checked='checked';
                                                                    }else{
                                                                        $checked='';
                                                                    }
                                                                 ?>
                                                                <input type="checkbox" name="otrogeo" value="otro" class="check" <?php echo $checked ;?>>
                                                                <label for="square-checkbox-1">Otro</label>
                                                            </li>
                                                        </ul>
                                                       
                                                     
                                                    </div>
                                                 
                                                </strong></td>
                                                <td class="clasetd"><strong>
                                                     <input type="text" name="geometriaobs" value="<?php echo $info['geometriaobs'] ;?>" class="form-control">
                                              
                                                </strong></td>
                                                <td class="clasetd" ><strong>Cuerpo</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Ceja</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="ceja" value="<?php echo $info['ceja'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Rosca</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="rosca" value="<?php echo $info['rosca'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Dia Sello</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="dia_sello" value="<?php echo $info['dia_sello'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     
                                                      
                                                      </div>
                                                      <div class="row">
                                                       <div class="col-md-6">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Dia camas</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="dia_cama" value="<?php echo $info['dia_cama'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-6">
                                                       
                                                        </div>
                                                    
                                                     
                                                      
                                                      </div>
                                                    
                                                    


                                                    <strong>
                                                </strong></td>
                                                
                                            </tr>
                                          <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>KIT</strong></td>
                                                <td class="clasetd" ><strong>Cojinetes</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Long</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="long" value="<?php echo $info['long'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Barreno</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="barreno" value="<?php echo $info['barreno'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Dia Int</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="dia_int" value="<?php echo $info['dia_int'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Dia Ext</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="diaext" value="<?php echo $info['dia_ext'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Total Ext</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="totalext" value="<?php echo $info['totalext'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Total int</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="totalint" value="<?php echo $info['totalint'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      </div>
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
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">1ALT</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="unoalt" value="<?php echo $info['unoalt'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">2ALT</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="dosalt" value="<?php echo $info['dosalt'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     <div class="col-md-4">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">3ALT</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="tresalt" value="<?php echo $info['tresalt'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                     
                                                      
                                                      </div>
                                                      <div class="row">
                                                       <div class="col-md-6">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Diametros</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="diametros" value="<?php echo $info['diametros'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-6">
                                                       
                                                        </div>
                                                   
                                                     
                                                      
                                                      </div>
                                                    
                                                    

                                                </td>
                                             </tr>     
                                                 <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Cojinete radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cojinetecond">
                                                      <?php    
                                                    echo '<option value="'.$info['cojinetecond'].'">'.$info['cojinetecond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['cojinetecond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                   </select>

                                                

                                                </strong></td>
                                                  <td class="clasetd  "><strong>Seguros externos</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="segurosextecond">
                                                      <?php    
                                                    echo '<option value="'.$info['segurosextecond'].'">'.$info['segurosextecond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['segurosextecond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                   
                                                </strong></td>
                                                <td class="clasetd" ><strong>Coj axial</strong></td>
                                                <td class="clasetd  text-center " colspan="3">
                                                      <div class="row">
                                                       <div class="col-md-6">
                                                       <div class="form-group row ">
                                                             <label class="control-label text-right col-md-9 reducir">Tolerancia</label>
                                                             <div class="col-md-2">
                                                             <input type="text" class="reducir" name="toleranciaca" value="<?php echo $info['toleranciaca'] ;?>">
                                                             </div>
                                                        </div>
                                                        </div>
                                                      <div class="col-md-6">
                                                       
                                                        </div>
                                                    
                                                     
                                                      
                                                      </div>
                                                    <strong>
                                                </strong></td>
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Cojinete axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cojineteaxialcond">
                                                    <?php    
                                                    echo '<option value="'.$info['cojineteaxialcond'].'">'.$info['cojineteaxialcond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['cojineteaxialcond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Tornillos</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="tornilloscond">
                                                    <?php    
                                                    echo '<option value="'.$info['tornilloscond'].'">'.$info['tornilloscond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['tornilloscond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              

                                                </strong></td>
                                                <td class="clasetd text-center" colspan="4" style="background: #cbcfe0;"><strong>Observacion final</strong></td>

                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Porta anillo</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="portaanillocond">
                                                   <?php    
                                                    echo '<option value="'.$info['portaanillocond'].'">'.$info['portaanillocond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['portaanillocond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               

                                                </strong></td>
                                                  <td class="clasetd  "><strong>Deflec aceite axial</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="defleceitecond">
                                                  <?php    
                                                    echo '<option value="'.$info['defleceitecond'].'">'.$info['defleceitecond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['defleceitecond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 

                                                </strong></td>
                                                <td rowspan="11" colspan="4">
                                                 <textarea type="text" name="obsfinal" rows="18" class="form-control"><?php echo $info['obsfinal'] ;?></textarea>
                                                </td>
                                             </tr>  

                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Collar axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="collaraxialcond">
                                                  <?php    
                                                    echo '<option value="'.$info['collaraxialcond'].'">'.$info['collaraxialcond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['collaraxialcond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                  
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Deflec aceite coji</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="defleceitecojicond">
                                                    <?php    
                                                    echo '<option value="'.$info['defleceitecojicond'].'">'.$info['defleceitecojicond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['defleceitecojicond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Separador axial</strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="separadoraxialcond">
                                                   <?php    
                                                    echo '<option value="'.$info['separadoraxialcond'].'">'.$info['separadoraxialcond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['separadoraxialcond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                   

                                                </strong></td>
                                                  <td class="clasetd  "><strong>orings</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="oringscond">
                                                    <?php    
                                                    echo '<option value="'.$info['oringscond'].'">'.$info['oringscond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['oringscond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>separador radial</strong></td>
                                                <td class="clasetd" ><strong>
                                                   
                                                 <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="separadorradialcond">
                                                   <?php    
                                                    echo '<option value="'.$info['separadorradialcond'].'">'.$info['separadorradialcond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['separadorradialcond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                  
                                                </strong></td>
                                                  <td class="clasetd  "><strong>valvula reguladora</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="valvularegcond">
                                                  <?php    
                                                    echo '<option value="'.$info['valvularegcond'].'">'.$info['valvularegcond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['valvularegcond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Seguros internos </strong></td>
                                                <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="segurosinternoscond">
                                                    <?php    
                                                    echo '<option value="'.$info['segurosinternoscond'].'">'.$info['segurosinternoscond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['segurosinternoscond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong></td>
                                                  <td class="clasetd  "><strong>otros</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="otroscond">
                                                   <?php    
                                                    echo '<option value="'.$info['otroscond'].'">'.$info['otroscond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['otroscond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>anillos de escape</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="anillosescapecond">
                                                     <?php    
                                                    echo '<option value="'.$info['anillosescapecond'].'">'.$info['anillosescapecond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['anillosescapecond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              

                                                </strong></td>
                                                  <td class="clasetd  "><strong>anillos de admision</strong></td>
                                                 <td class="clasetd" ><strong>
                                                      <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="anillosadmincond">
                                                     <?php    
                                                    echo '<option value="'.$info['anillosadmincond'].'">'.$info['anillosadmincond'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where kit != '".$info['anillosadmincond']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["kit"].'>'.$row["kit"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                

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
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="balerochicomode">
                                                    <?php    
                                                    echo '<option value="'.$info['balerochicomode'].'">'.$info['balerochicomode'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['balerochicomode']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                                  <td class="clasetd  "><strong>engranes</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="engranesmode">
                                                    <?php    
                                                    echo '<option value="'.$info['engranesmode'].'">'.$info['engranesmode'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['engranesmode']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                 
                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>balero mediano</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="baleromedianomode">
                                                     <?php    
                                                    echo '<option value="'.$info['baleromedianomode'].'">'.$info['baleromedianomode'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['baleromedianomode']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Base de baleros</strong></td>
                                                 <td class="clasetd" ><strong>
                                                     <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="basebalerosmode">
                                                    <?php    
                                                    echo '<option value="'.$info['basebalerosmode'].'">'.$info['basebalerosmode'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['basebalerosmode']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                               

                                                </strong></td>
                                              
                                             </tr>    
                                              <!-- //////////////////////////////////////////////////////////////////////-->
                                            <tr>
                                                <td class="clasetd "><strong>Balero grande</strong></td>
                                                <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="balerograndemode">
                                                   <?php    
                                                    echo '<option value="'.$info['balerograndemode'].'">'.$info['balerograndemode'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['balerograndemode']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                                
                                                </strong></td>
                                                  <td class="clasetd  "><strong>Arnes</strong></td>
                                                 <td class="clasetd" ><strong>
                                                    <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="arnesmode">
                                                    <?php    
                                                    echo '<option value="'.$info['arnes'].'">'.$info['arnes'].'</option>'; 
                                                    $sql = pg_query("SELECT * from valores_ni where descripcion != '".$info['arnes']."' ");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["descripcion"].'>'.$row["descripcion"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                              
                                                </strong></td>
                                              
                                             </tr>    
                                             

                                          
                                        </tbody>
                                     </table>
                                     <input type="hidden" name="ido" value="<?php echo $ido;?>"> 
                                     <div class="col-md-12">
                                         <div class="text-left">
                                             <button class="btn btn-success btn-outline" type="submit"> <span><i class="icon-check"></i> ACTUALIZAR</span> </button>
                                         </div>
                                       </div>
                                     </div>
                                 </form>   
                                 
                            </div>
                              
                        </div>
             </div>
         </div>
     </div>
</div>
