<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM inventario where familia='Turbo' and condicion='Incompleto'");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Inventario de turbos Incompletos</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock</h4>
                                <h6 class="card-subtitle">Este el inventario de todos los turbos incompletos que se tienen.</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                               
                                                <th>Codigo Art</th>
                                               
                                                <th>Modelo</th>
                                               
                                                <th>Existencia</th>
                                                <th>Observacion de partes faltantes</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                
                                                 <td>'.$info['codigo'].'</td>
                                              
                                                <td>'.$info['nombre'].'</td>
                                                
                                               
                                                <td>'.$info['existencia'].'</td>
                                                <td>'.$info['obs_condicion'].'</td>
                                                
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
   
           