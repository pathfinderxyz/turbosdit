<?php
    include '../coneccion/coneccion.php';
    $id = $_GET['id']; 

    $usuario = $_SESSION['usuario'];
    $sql = pg_query("SELECT * FROM ordenes_trabajo");
    $row = pg_num_rows($sql);  
 ?>                       
                        
 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <strong><h4 class="text-themecolor">Bienvenido <?php echo $_SESSION['usuario'] ?> </h4></strong> 
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo '<a href="?page=recepcion"> <button type="button" class="btn btn-danger d-none d-lg-block m-l-15"><i class="icon-plus"></i> Añadir Orden de entrada</button></a>';
                                         }
                                 ?>
                        </div>
                    </div>
                </div>
                
                 <?php  
                    if ($_SESSION['rol'] == 'admin') {
                    echo'      
                    
                 <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                         
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        
                                        <h3 class="font-light m-t-0">Reporte del mes '.date('M').'</h3></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success">'.$row.' Orden</h2></div>
                                </div>
                            </div>
                             <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th># Orden</th>
                                                <th>Cliente</th>
                                                <th>Tipo de Reparacion</th>
                                                <th>Fecha entrega</th>
                                                <th>Area de trabajo</th>
                                            </tr>
                                        </thead>
                                        <tbody>';?>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                    
                                                    $areat=$info['cubiculo'];
                                                   $sql_areat = pg_query("SELECT * FROM cubiculos
                                                    where numero = '$areat'");
    
                                                   $resultareat = pg_fetch_assoc($sql_areat);
                                                   $nombrearea = $resultareat['nombre'];
                                                   
                                                    
                                            echo '<tr>
                                                  
                                                <td>'.$info['n_orden'].'</td>
                                               
                                                <td>'.$info['cliente'].'</td>
                                               
                                                <td>'.$info['tipo_rep'].'</td>
                                                <td>'.$info['fecha_entrega'].'</td>
                                                <td>'.$nombrearea.'</td>
                                                

                                               </tr>';
                                             }
                                               }else{

                                                }
                                             ?><?php echo '
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                 </div>';} ?>

                 <?php  
                    if ($_SESSION['rol'] == 'operario') {
                        $usuario = $_SESSION['usuario'];
                        $sql = pg_query("SELECT * FROM ordenes_trabajo where operador = '$usuario'");
                        $row = pg_num_rows($sql);  
                        while ($info = pg_fetch_assoc($sql)) {
                      echo'
                 <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                         
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        
                                        <h3 class="font-light m-t-0">Reporte del mes '.date('M').'</h3></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success">'.$row.' Orden</h2></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th># Orden de trabajo</th>
                                            <th>Area de trabajo</th>
                                            <th>Cliente</th>
                                            <th>Fecha</th>
                                            <th>Tipo de reparacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                                <td>'.$info['n_orden'].'</td>
                                                <td>'.$info['cubiculo'].'</td>
                                                <td>'.$info['cliente'].'</td>
                                                <td>'.$info['fecha_entrega'].'</td>
                                                <td>'.$info['tipo_rep'].'</td>        
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>' ; }}?>