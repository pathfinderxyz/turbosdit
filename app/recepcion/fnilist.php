<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query($cnx,"SELECT * FROM ordenes_trabajo where formatoni='si'");
    
    $row = pg_num_rows($sql);
    
?>
<style type="text/css">
.ocultar{
    display: none !important;
}
</style>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Formatos NI</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ordenes con Formato NI</h4>
                                <h6 class="card-subtitle">Listado de ordenes que tienen Formato NI</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Acciones</th>
                                                <th># NI</th>
                                                <th># Orden</th>
                                                <th>Fecha Recepcion</th>
                                                <th>Cliente</th>
                                                <th>Modelo de Turbo</th>
                                                <th>Tipo de Reparacion</th>
                                                <th>Fecha entrega</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                    $norden=$info['n_orden'];
                                                   $sql_turb = pg_query($cnx,"SELECT * FROM ordenesfni 
                                                    where num_orden = '$norden'");
    
                                                   $result = pg_fetch_assoc($sql_turb);
                                                   $n_fni = $result['id_fni'];
                                                
                                            echo '<tr>
                                                   <td>
                                                    <a class="btn btn-success" href="?page=repfinalni&idorden='.$info['n_orden'].'" role="button"><span class="btn-label"><i class="icon-eye"></i></span> Ver</a>
                                                 </td>
                                                 <td>'.$n_fni.'</td>
                                                 <td>'.$info['n_orden'].'</td>
                                                <td>'.$info['fecha_rec'].'</td>
                                                <td>'.$info['cliente'].'</td>
                                                <td>'.$info['modelo_turbo'].'</td>
                                                <td>'.$info['tipo_rep'].'</td>
                                                <td>'.$info['fecha_entrega'].'</td>
                                              
                                               </tr>
                                                
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
 