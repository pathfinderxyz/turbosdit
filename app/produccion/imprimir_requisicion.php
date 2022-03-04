 <?php 
     
    include '../../coneccion/coneccion.php';
    $pedido = $_GET['pedido']; 

    $sql = pg_query($cnx,"SELECT * FROM pedidos where cod_pedido='$pedido'");
    $info = pg_fetch_assoc($sql);
    $id_material = $info['peticion'];

    $cons_inv = pg_query($cnx,"SELECT * FROM inventario where codigo = '$id_material'");
    $result_inv = pg_fetch_assoc($cons_inv);
    $materialinv = $result_inv['nombre'];
    
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
</style>

<div class="col-12">
     <div class="card card-body printableArea">
              
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                               <div class="col-2">
                                    <img src="assets/images/logo-turbos.png"  class="dark-logo" style="width: 45px;" />
                               </div>
                               <div class="col-8">
                                   <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                                  Requisicion de material</h4>
                                </div>
                                <div class="col-2">
                                     <img src="assets/images/logo-ditsa.png"  class="dark-logo" style="width: 100px;" />
                                </div>
                            </div><br>
                               
                                <div class="table-responsive">
                                     <table class="table table-bordered">
                                       
                                        <tbody>
                                            
                                            <tr>
                                                <td class="clasetd" colspan="3"><strong>Operador:</strong> <?php echo $info['operador']; ?></td>
                                                <td class="clasetd"><strong>Fecha:</strong> <?php echo $info['fecha']; ?></td>
                                                <td class="clasetd"><strong>Folio:</strong> <?php echo $info['folio']; ?></td>
                                               
                                            </tr>
                                            <tr  style="background: #ecc7c7;">
                                                <td class="clasetd"><strong>Cantidad</strong></td>
                                                <td class="clasetd"><strong>Material</strong></td>
                                                <td class="clasetd"><strong>Area</strong> </td>
                                                <td class="clasetd"><strong># Orden</strong> </td>
                                                <td class="clasetd"><strong>Observacion</strong> </td>
                                               
                                            </tr>
                                             <tr>
                                                <td class="clasetd"><strong> <?php echo $info['cantidad']; ?></strong> </td>
                                                <td class="clasetd"><strong>  <?php echo $materialinv ;?></strong> </td>
                                                <td class="clasetd"><strong> <?php echo $info['area']; ?></strong> </td>
                                                <td class="clasetd"><strong> <?php echo $info['ni']; ?></strong> </td>
                                                <td class="clasetd"><strong><?php echo $info['observacion']; ?></strong> </td>
                                               
                                            </tr>
                                            
                                            
                                            
                                          
                                            
                                        </tbody>
                                     </table>
                                     <div class="col-md-12">
                                         <div class="text-right">
                                             <button id="print2" class="btn btn-warning btn-outline" type="button"> <span><i class="icon-printer"></i> Imprimir</span> </button>
                                         </div>
                                     </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>

<script>
    $(document).ready(function() {
        $("#print2").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>