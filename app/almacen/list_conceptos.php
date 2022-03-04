<?php 
     
    include '../../coneccion/coneccion.php';
     

     
    $sql = pg_query($cnx,"SELECT * FROM conceptos_mov");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Conceptos</h4>
                    </div>
                     <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="?page=crear_concepto"><button type="button" class="btn btn-cyan d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Añadir nuevo concepto</button></a>
                        </div>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">listado</h4>
                               
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                               
                                                <th>Codigo</th>
                                               
                                                <th>Concepto de movimiento</th>
                                               
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                  

                                            echo '<tr>
                                                
                                                 <td>'.$info['id_mov'].'</td>
                                              
                                                <td>'.$info['movimiento'].'</td>
                                                
                                               
                                               
                                                
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
   
           