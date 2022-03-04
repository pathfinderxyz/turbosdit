<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM perfiles");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Listado de perfiles</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="?page=crearperfil"><button type="button" class="btn btn-cyan d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Añadir perfil</button></a>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Perfiles</h4>
                                <h6 class="card-subtitle">Estos son los permisos que tienen los perfiles de usuario</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                
                                                <th>Codigo</th>
                                                <th>nombre</th>
                                                <th>Recepcion</th>
                                                <th>Almacen</th>
                                                <th>Produccion</th>
                                                <th>seguimiento</th>
                                                <th>reportes</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                
                                                <td>'.$info['id'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                <td>'.$info['recepcion'].'</td>
                                                <td>'.$info['almacen'].'</td>
                                                <td>'.$info['produccion'].'</td>
                                                <td>'.$info['seguimiento'].'</td>
                                                <td>'.$info['reportes'].'</td>
                                               
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

    function cargamodaldelete(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modalplan').load('app/modales/eliminar_plan.php?id='+modal, function() {
        $('#modaleliminar').modal({show:true});
    });    
    } 
    
</script> 
           
 