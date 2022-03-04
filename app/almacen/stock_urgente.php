<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

    $sql = pg_query("SELECT * FROM inventario where existencia <= minimos");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
   
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Materiales urgentes por surtir</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <div class="card card-body printableArea">
                                <h4 class="card-title">Materiales a surtir</h4>
                                <h6 class="card-subtitle">Este es el listado de los articulos con su minimo en stock.<strong>
                                    (para configurar los minimos puede ir a configuracion-aviso de minimos-configurar minimos)</strong></h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr style="width: 79px;background: #ffe7e7;">
                                               
                                                <th>Codigo Art</th>
                                                <th>Familia</th>
                                                <th>Nombre</th>
                                                
                                                <th style="width: 64px;background: #e42b01;font-weight: 700;color: #fff;">Existencia</th>
                                               
                                                

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                   $familia_art=$info['familia'];
                                                   $sql_turb = pg_query("SELECT * FROM categoria_articulos 
                                                    where nombre_familia = '$familia_art'");
    
                                                   $result = pg_fetch_assoc($sql_turb);
                                                   $medida = $result['medida'];
                                            echo '<tr>
                                                 
                                                 <td>'.$info['codigo'].'</td>
                                                <td>'.$info['familia'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                
                                                <td>'.$info['existencia'].'</td>
                                                
                                             
                                                </tr>
                                             
                                                 <div>
                                                     <div class="modal bs-example-modal-lg" id="modalpeso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                         <div class="modal-dialog" role="document">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" >Introduzca la existencia real del articulo</h4>
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
                                </div><br>
                                <div class="col-md-12">
                                         <div class="text-left">
                                             <button id="print" class="btn btn-warning btn-outline" type="button"> 
                                            <span><i class="icon-printer"></i> Imprimir</span> </button>
                                         </div>
                                     </div>
                                </div>     
                            </div>
                         </div>
                         
                        
                    </div>
                    
                </div>
               
     </div>
   
   <script>

    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });

    function imprimir(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal3').load('app/almacen/modal_update_exist.php?cod='+modal, function() {
        $('#modalpeso').modal({show:true});
    });    
    }   
    
</script>                 