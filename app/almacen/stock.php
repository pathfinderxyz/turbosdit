<?php 
     
    include '../../coneccion/coneccion.php';

    $fam = $_GET['fam']; 

    if ($fam=='Todos') {
        $sql = pg_query("SELECT * FROM inventario");
    }else{
        $sql = pg_query("SELECT * FROM inventario where familia='$fam'");
    }     
    
    $sqlfiltrar = pg_query("SELECT * FROM inventario");
    $row = pg_num_rows($sql);

    $sql_color = pg_query("SELECT * FROM valores_ni where surtido = 'urgente'");
    $result_color = pg_fetch_assoc($sql_color);
    $colorurg = $result_color['color'];

    $sql_color = pg_query("SELECT * FROM valores_ni where surtido = 'no urgente'");
    $result_color = pg_fetch_assoc($sql_color);
    $colornourg = $result_color['color'];
    
?>
<style type="text/css">

.badge-danger {
    color: #fff;
    background-color: <?php echo $colorurg ;?> !important;
}
.badge-success {
    color: #fff;
    background-color: transparent !important;
}

</style>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Inventario</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="?page=new_stock"><button type="button" class="btn btn-cyan d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Añadir Nuevo Articulo</button></a>
                        </div>
                    </div>
                    
                </div>
                            
        
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock</h4>
                                <h6 class="card-subtitle">Este el inventario de todas las partes, refacciones, turbos completos y herramientas que se tienen.</h6>

                                <div class="row">
                                 <form  action="app/almacen/filtrar_stock.php" method="post">
                                 
                                 <div class="row">
                                     <div class="col-sm-12 col-xs-12">
                                         <div class="row">
                                             <div class="col-9">
                                                 <label or="message-text" class="control-label" style="margin-left: 10px;">Filtrar familia</label>
                                                 <select  class="form-control custom-select" data-placeholder="Choose a Category" style="margin-left: 10px;" tabindex="1" name="familia_stock">
                                                        
                                                          <option value='Todos'>Todos</option>
                                                          <?php
                                                    while($filtrar = pg_fetch_assoc($sqlfiltrar)){
                                                    echo '<option value='.$filtrar["familia"].'>'.$filtrar["familia"].'</option>';
                                                        }
                                                     ?>
                                                </select>
                                             </div>
                                            
                                             <div class="col-3">
                                                <label or="message-text" class="control-label">.</label>
                                                 <button type="submit" class="btn btn-dark" style="margin-left: 10px;">Filtrar</button>
                                             </div>
                                        </div>
                                     </div>
                                     
                                 </div>
                                 </form> 
                                 </div>




                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr style="width: 79px;background: #ffe7e7;">
                                                <th>Movimientos</th>
                                                <th>Codigo Art</th>
                                                <th>Familia</th>
                                                <th>Nombre</th>
                                                <th>Ultima entrada</th>
                                                <th>Cantidad de ingreso</th>
                                                <th style="width: 64px;background: #fdff7e;font-weight: 700;">Existencia</th>
                                                <th>Observacion</th>
                                                <th>Imagen</th>
                                                <th>ADM/ESC</th>
                                                <th>Ultima salida</th>
                                                <th>Cantidad de salida</th>
                                                <th>Destino</th>
                                                <th>Folio</th>
                                                <th>Bodega</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                   $cod_arti=$info['codigo'];
                                                   $minimo=$info['minimos'];
                                                   $familia_art=$info['familia'];
                                                   $sql_turb = pg_query("SELECT * FROM categoria_articulos 
                                                    where nombre_familia = '$familia_art'");
    
                                                   $result = pg_fetch_assoc($sql_turb);
                                                   $medida = $result['medida'];

                                                   $sql_min = pg_query("SELECT * FROM inventario where 
                                                    existencia <= '$minimo' and codigo='$cod_arti' ");
                                                   $row_min = pg_num_rows($sql_min);

                                                   if ($row_min >= 1) {
                                                       $badge='badge badge-danger';
                                                   } else{
                                                      $badge='badge badge-success';
                                                   }
                                             echo '<tr>
                                                  <td>
                                             
                                                  <div class="btn-group">
                                                     <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="ti-settings"></i>
                                                     </button>
                                                     <div class="dropdown-menu animated flipInX">
                                                      
                                                        <a class="dropdown-item" href="?page=crear_entrada&codigo='.$info['codigo'].'")" >Realizar Entrada</a>
                                                        <a class="dropdown-item" href="?page=crear_salida&codigo='.$info['codigo'].'")" >Realizar Salida</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" onClick="cargamodaldelete ('.$info['codigo'].')" >Añadir imagen</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" 
                                                         onClick="imprimir ('.$info['codigo'].')">Cambiar Condicion</a>
                                                        
                                                    </div>
                                                    </div>
                                                 </td>
                                                 <td>'.$info['codigo'].'</td>
                                                <td>'.$info['familia'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                <td>'.$info['fecha_ent'].'</td>
                                                <td>'.$info['cantida_ent'].'</td>
                                                <td>'.$info['existencia'].'<br>
                                                <div class="'.$badge.'">Surtir</div></td>
                                                <td>'.$info['observacion'].'</td>
                                                <td><img class="card-img-top img-responsive" src="'.$info['url_imagen'].'" alt="Card image cap" style="width: 50px;"></td>
                                                <td>'.$info['tipo_anillo'].' </td>
                                                <td>'.$info['fecha_salida'].'</td>
                                                <td>'.$info['cantidad_salida'].' </td>
                                                
                                                <td>'.$info['destino'].'</td>
                                                <td>'.$info['folio'].'</td>
                                                <td>'.$info['bodega'].'</td>
                                                </tr>
                                             
                                                 <div>
                                                     <div class="modal bs-example-modal-lg" id="modalpeso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                         <div class="modal-dialog" role="document">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" >Cambiar la condicion del articulo</h4>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div id="conte-modal3"></div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 <div>
                                                  <div>
                                                     <div class="modal" id="modaleliminar" tabindex="-1" role="">
                                                     <div class="modal-dialog" role="document">
                                                         <div class="modal-content">
                                                    <div class="modal-header">
                                                         <h4 class="modal-title" >Añadir de imagen del articulo</h4>
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

    function imprimir(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal3').load('app/almacen/modal_condicion.php?cod='+modal, function() {
        $('#modalpeso').modal({show:true});
    });    
    }   

     function cargamodaldelete(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal2').load('app/almacen/modal_subir_imagen.php?cod='+modal, function() {
        $('#modaleliminar').modal({show:true});
    });    
    } 
    
    
</script> 
           