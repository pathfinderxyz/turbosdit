<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query($cnx,"SELECT * FROM entradas");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Entradas</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        
                    </div>
                  
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Historial de entradas</h4>
                                <h6 class="card-subtitle">Ultimas entradas realizadas.</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Fecha</th>
                                                <th>Codigo Art</th>
                                                <th>Tipo de parte</th>
                                                <th>Parte</th>
                                                <th>Bodega</th>
                                                <th>Unidades</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                
                                             
                                                <td>'.$info['fecha'].'</td>
                                                <td>'.$info['codigo_parte'].'</td>
                                                <td>'.$info['tipo_parte'].'</td>
                                                <td>'.$info['parte'].'</td>
                                                <td>'.$info['bodega'].'</td>
                                                <td>'.$info['cantidad'].'</td>
                                                <td>'.$info['usado_nuevo'].'</td>
                                               
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
      
           
 