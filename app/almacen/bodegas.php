<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM bodegas");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Bodegas</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="?page=crear_bodegas"><button type="button" class="btn btn-cyan d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Añadir Nueva Bodega</button></a>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bodegas registradas</h4>
                                <h6 class="card-subtitle">Listado de bodegas disponibles en Turbos</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                
                                                <th># Codigo</th>
                                                <th>Bodega</th>
                                                <th>Descripcion</th>
                                                <th>Encargado</th>
                                               

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                
                                               
                                                <td>'.$info['cod_bod'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                <td>'.$info['descripcion'].'</td>
                                                <td>'.$info['encargado'].'</td>
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
           