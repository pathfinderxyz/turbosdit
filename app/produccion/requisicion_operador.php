<?php 
     
    include '../../coneccion/coneccion.php';
    $id_orden = $_GET['idorden']; 

     
    $sql = pg_query($cnx,"SELECT * FROM pedidos where ni='$id_orden'");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Requisicion de Material</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="?page=requisicion&idorden=<?php echo $id_orden ;?>"><button type="button" class="btn btn-cyan d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Realizar nueva requisicion</button></a>
                        </div>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mis Pedidos</h4>
                                <h6 class="card-subtitle">Pedidos realizados al almacen</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Imprimir</th> 
                                                <th>Codigo pedido</th>
                                                <th>Fecha</th>
                                                <th>Material solicitado</th>
                                                <th>cantidad</th>
                                                <th>orden</th>
                                                <th>Folio</th>
                                                 <th>Status</th>
                                                <th>Acciones</th>
                                              

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                   $cod_art=$info['peticion'];
                                                   $sql_inv = pg_query($cnx,"SELECT * FROM inventario 
                                                    where codigo = '$cod_art'");
    
                                                   $info_inv = pg_fetch_assoc($sql_inv);
                                                   $material = $info_inv['nombre'];
                                                   $familia_mat = $info_inv['familia'];

                                                 if ($info['status'] == 'Aprobado') {
                                                     $estado = 'active';
                                                 }else{
                                                     $estado = 'disabled';
                                                 } 
          

                                            echo '<tr>
                                                <td><a class="btn btn-success" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" onClick="imprimir ('.$info['cod_pedido'].')" role="button"><span class="btn-label"><i class="icon-printer"></i></span></a></td>
                                                <td>'.$info['cod_pedido'].'</td>
                                                <td>'.$info['fecha'].'</td>
                                                <td>'.$material.'-'.$familia_mat.'</td>
                                                <td>'.$info['cantidad'].'</td>
                                                
                                                <td>'.$info['ni'].'</td>
                                                <td>'.$info['folio'].'</td>
                                                <td>'.$info['status'].'</td>
                                                <td>
                                                 <form action="app/produccion/devolver_material.php" method="post">
                                                    <input type="hidden" name="codigo" value="'.$info['peticion'].'">
                                                    <input type="hidden" name="cantidad" value="'.$info['cantidad'].'">   
                                                    <input type="hidden" name="cod_pedido" value="'.$info['cod_pedido'].'"> 
                                                    <input type="hidden" name="idorden" value="'.$info['ni'].'">     
                                                  <button class="btn btn-dark" '.$estado.'>Devolver material</button>
                                                </form>
                                                </td>
                                                </tr>

                                                  <div>
                                                     <div class="modal bs-example-modal-lg" id="modalpeso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                         <div class="modal-dialog modal-xl">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" >Imprimir Requisicion de material</h4>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div id="conte-modal3"></div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 <div>

                                            
                                                ';
                                             }
                                               }else{

                                                }
                                             ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                         
                        
                    </div>
                </div>
                
     </div>
    <script>

    function imprimir(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal3').load('app/produccion/imprimir_requisicion.php?pedido='+modal, function() {
        $('#modalpeso').modal({show:true});
    });    
    } 
    
</script> 
 