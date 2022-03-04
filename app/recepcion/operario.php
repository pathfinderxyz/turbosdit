<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM usuarios where rol ='operario'");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Listado de Operarios</h4>
                    </div>
                  
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Operarios</h4>
                                <h6 class="card-subtitle">Estos son los operarios con sus asignaciones y disponibilidad</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                
                                               
                                                <th># Codigo</th>
                                                <th>Nombre del Operador</th>
                                                <th>Area de trabajo</th>
                                                <th>Estado</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                   $areat=$info['cubiculo'];
                                                   $sql_areat = pg_query("SELECT * FROM cubiculos
                                                    where numero = '$areat'");
    
                                                   $resultareat = pg_fetch_assoc($sql_areat);
                                                   $nombrearea = $resultareat['nombre'];
                                                    
                                            echo '<tr>
                                                
                                             
                                                <td>'.$info['id'].'</td>
                                                <td>'.$info['usuario'].'</td>
                                                <td>'.$nombrearea.'</td>
                                                <td>'.$info['estado'].'</td>
                                                
                                               
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
      
           
 