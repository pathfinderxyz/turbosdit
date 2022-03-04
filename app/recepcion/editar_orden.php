 <?php 
     
    include '../../coneccion/coneccion.php';
    $num_orden = $_GET['idorden']; 

     
    $sql = pg_query($cnx,"SELECT * FROM ordenes_trabajo where n_orden='$num_orden'");
    $info = pg_fetch_assoc($sql)
    
?>
<style type="text/css">
.clasetd {
   padding: 4px !important;
}
.taman{
    font-size:10px !important;
}
.taman2{
    font-size:12px !important;
}
.table td, .table th {
    
    background: #f5dfdf;
}
</style>

<div class="container-fluid">
     

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Editar orden de Trabajo</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        
                    </div>
                </div>
              
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                     <div class="col-md-6 text-left">
                                     <img src="assets/images/lohoni.jpg" alt="homepage" class="dark-logo" />
                                     </div>
                                     
                                     <div class="col-md-6 text-right">
                                     <h6><b>Orden de trabajo</b> <span class="pull-right"></span></h6>
                                        <p>#<?php echo $info['n_orden']; ?></p>
                                        
                                     </div>
                                 </div>
                                <div class="row">
                                <div class="col-md-5"><br><br>
                                  <h6 class="taman2"><b>Fecha:</b> <span class="pull-right"><?php echo $info['fecha_rec']; ?></span></h6>
                                  <h6 class="taman2"><b>Folio:</b> <span class="pull-right"><?php echo $info['folio']; ?></span></h6>
                                </div>
                                <div class="col-md-7 text-right">
                                  <p class="taman">Blvd. San Felipe No 47-D Col Villa 
                                    Posadas C.P. 72060 Puebla, Pue.<br>
                                    Tels. 01(222)296 83 38, Ventas Directas 01(222)2300979<br>
                                    LADA SIN COSTO 01 800 08 70 145<br>
                                    Web:turbos.com.mx Email:ventasditsa@turbos.com.mx
                                </p>
                                </div>
                                
                               </div>
                               <form action="app/recepcion/update_orden.php" method="post">
                                <div class="table-responsive">
                                     <table class="table table-bordered">
                                       
                                        <tbody>
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Cliente:</strong><input type="text" name="cliente" value=" <?php echo $info['cliente']; ?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Direccion:</strong>
                                                <input type="text" name="direccion" value=" <?php echo $info['direccion']; ?>" class="form-control">

                                            </td>
                                            </tr>
                                            <tr>
                                                <td class="clasetd"><strong>Ciudad:</strong>
                                                <input type="text" name="ciudad" value=" <?php echo $info['ciudad']; ?> " class="form-control"></td>
                                                <td class="clasetd"><strong>RFC:</strong>
                                                <input type="text" name="rfc" value=" <?php echo $info['rfc']; ?>" class="form-control"></td>
                                                <td class="clasetd"><strong>Telefono:</strong> 
                                               <input type="text" name="telefono" value="<?php echo $info['telefono']; ?>" class="form-control"></td>
                                               
                                            </tr>
                                           <tr>
                                                <td class="clasetd" colspan="3"><strong>Modelo Turbocargador:</strong>
                                                <input type="text" name="modelo_turbo" value=" <?php echo $info['modelo_turbo']; ?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Bomba de inyeccion:</strong>
                                                <input type="text" name="bomba_iny" value=" <?php echo $info['bomba_iny']; ?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Reparacion:</strong>
                                                <input type="text" name="tipo_rep" value=" <?php echo $info['tipo_rep']; ?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td class="clasetd" ><strong>Importe:</strong>
                                                <input type="text" name="importe" value=" <?php echo $info['importe']; ?>" class="form-control"></td>
                                                <td class="clasetd" ><strong>A cuenta:</strong>
                                                <input type="text" name="a_cuenta" value=" <?php echo $info['a_cuenta']; ?>" class="form-control"></td>
                                                <td class="clasetd" ><strong>Restan:</strong>
                                                <input type="text" name="restan" value=" <?php echo $info['restan']; ?>" class="form-control"></td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Fecha de entrega:</strong>
                                                <input type="text" name="fecha_entrega" value=" <?php echo $info['fecha_entrega']; ?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td  class="clasetd" colspan="3"><strong>Observaciones:</strong>
                                                <input type="text" name="observaciones" value=" <?php echo $info['observaciones']; ?>" class="form-control"><br><br></td>
                                            </tr>
                                        </tbody>
                                     </table>
                                     <input type="hidden" name="n_orden" value="<?php echo $info['n_orden']; ?>"
                                     <div class="col-md-12">
                                         <div class="text-left">
                                             
                                             <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                                         </div>
                                     </div>
                                </div>
                               </form>
                           </div>
                        </div>
                



</div>