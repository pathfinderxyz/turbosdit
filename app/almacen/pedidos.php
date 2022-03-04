<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query($cnx,"SELECT * FROM pedidos");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Listado de peticiones pendientes</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pedidos</h4>
                                <h6 class="card-subtitle">Pedidos pendientes por surtir</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Codigo pedido</th>
                                                <th>Fecha</th>
                                                <th>Operador que solicita</th>
                                                <th>cantidad</th>
                                                <th>Material solicitado</th>
                                                <th>NI</th>
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
                                                   $sql_inv = pg_query("SELECT * FROM inventario 
                                                    where codigo = '$cod_art'");
    
                                                   $info_inv = pg_fetch_assoc($sql_inv);
                                                   $material = $info_inv['nombre'];
                                                   $familia_mat = $info_inv['familia'];

                                                 if ($info['status'] == 'sin aprobar') {
                                                     $estado = 'active';
                                                 }else{
                                                     $estado = 'disabled';
                                                 } 
          

                                            echo '<tr>
                                                <td>'.$info['cod_pedido'].'</td>
                                                <td>'.$info['fecha'].'</td>
                                                <td>'.$info['operador'].'</td>
                                                <td>'.$info['cantidad'].'</td>
                                                <td>'.$material.'-'.$familia_mat.'</td>
                                                <td>'.$info['ni'].'</td>
                                                <td>'.$info['folio'].'</td>
                                                <td>'.$info['status'].'</td>
                                                <td>
                                                <form action="app/almacen/aprobar_material.php" method="post">
                                                    <input type="hidden" name="codigo" value="'.$info['peticion'].'">
                                                    <input type="hidden" name="cantidad" value="'.$info['cantidad'].'">   
                                                    <input type="hidden" name="cod_pedido" value="'.$info['cod_pedido'].'">     
                                                <button class="btn btn-success" '.$estado.'>Aprobar</a></button>
                                                </form>
                                                </td>
                                                </tr>
                                             

                                                <div>
                                                    <div class="modal" id="modalclientes" tabindex="-1" role="">
                                                     <div class="modal-dialog" role="document">
                                                         <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h4 class="modal-title" >Asigna un operador</h4>
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                     <div class="modal-body">
                                                         <div id="conte-modal"></div>
                                                     </div>
                                                     </div>
                                                     </div>
                                                 </div>

                                                    <div>
                                                     <div class="modal" id="modaleliminar" tabindex="-1" role="">
                                                     <div class="modal-dialog" role="document">
                                                         <div class="modal-content">
                                                     <div class="modal-header">
                                                          <h4 class="modal-title" >Liberar cubiculo</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <div id="conte-modal2"></div>
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
   
    function cargamodal(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal').load('app/recepcion/modal_operador.php?num='+modal, function() {
        $('#modalclientes').modal({show:true});
    });    
    } 

    function cargamodaldelete(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal2').load('app/recepcion/liberar_cubi.php?num='+modal, function() {
        $('#modaleliminar').modal({show:true});
    });    
    } 
    

   
    
</script> 
         <!--  <a class="btn btn-dark" href="javascript:void(0)" role="button" data-toggle="modal"  aria-haspopup="true" 
                                                onClick="#('.$info['id'].')" ><i class="icon-printer"></i> Imprimir</a>-->