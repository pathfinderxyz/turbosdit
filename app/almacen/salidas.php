<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query($cnx,"SELECT * FROM salidas");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Salidas</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        
                    </div>
                  
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Historial de Salidas</h4>
                                <h6 class="card-subtitle">Ultimas salidas realizadas.</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                
                                               
                                                <th>Fecha</th>
                                                <th>Codigo articulo</th>
                                                <th>Categoria</th>
                                                <th>Modelo turbo</th>
                                                <th>Serie</th>
                                                <th>Cantidad</th>
                                                <th>Observaciones</th>
                                                <th>Concepto de movimiento</th>
                                                <th>Folio</th>
                                                <th>Gastos</th>
                                                <th>Notas foliadas</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                
                                             
                                                <td>'.$info['fecha_salida'].'</td>
                                                <td>'.$info['codigo_art'].'</td>
                                                <td>'.$info['familia'].'</td>
                                                <td>'.$info['nombre_modelo'].'</td>
                                                <td>'.$info['serie'].'</td>
                                                <td>'.$info['cantidad'].'</td>
                                                <td>'.$info['observacion'].'</td>
                                                <td>'.$info['concep_movim'].'</td>
                                                <td>'.$info['folio'].'</td>
                                                <td>'.$info['gastos'].'</td>
                                                <td>'.$info['notas_foliadas'].'</td>

                                                
                                               
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
      
           
 