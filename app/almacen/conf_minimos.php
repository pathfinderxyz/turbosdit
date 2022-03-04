<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM inventario");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
   
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Ajustes minimos de los articulos</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                           
                                <h4 class="card-title">Minimo de productos en existencia</h4>
                                <h6 class="card-subtitle">En esta seccion podra configurar los minimos de los articulos</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr style="width: 79px;background: #ffe7e7;">
                                               
                                                <th>Codigo Art</th>
                                                <th>Familia</th>
                                                <th>Nombre</th>
                                                
                                                <th style="width: 64px;background: #fdff7e;font-weight: 700;">Existencia</th>
                                                <th>Existencia minima permitida</th>
                                                <th>Acciones</th>

                                                
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
                                                <td>'.$info['minimos'].'</td>
                                                 <td>
                                             
                                                  <div class="btn-group">
                                                     <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="ti-settings"></i>
                                                     </button>
                                                     <div class="dropdown-menu animated flipInX">
                                                      
                                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" 
                                                         onClick="imprimir ('.$info['codigo'].')">Ajustar minimo</a>
                                                        
                                                    </div>
                                                    </div>
                                                 </td>
                                                </tr>
                                             
                                                 <div>
                                                     <div class="modal bs-example-modal-lg" id="modalpeso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                         <div class="modal-dialog" role="document">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" >Introduzca la cantidad minima para la existencia del articulo</h4>
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
    $('#conte-modal3').load('app/almacen/modal_minimo.php?cod='+modal, function() {
        $('#modalpeso').modal({show:true});
    });    
    }   
    
</script>                 