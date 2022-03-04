<?php
     include '../../coneccion/coneccion.php';
    //include '../../Errores/mostrar_errores2.php';
$norden = $_GET['orden'];

$sql = pg_query("SELECT * from historial_ordenes where norden ='$norden'");
 $row = pg_num_rows($sql);    

  echo '
        <h6 class="card-subtitle">Aqui se muestra el historial de trabajo de la orden '.$norden.'</h6>
        <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                               
                                                <th>Fecha</th>
                                                <th>Area de trabajo</th>
                                                <th>status</th>
                                                <th>Observacion</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>';?>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                                   $areat=$info['area_trabajo'];
                                                   $sql_areat = pg_query("SELECT * FROM cubiculos
                                                    where numero = '$areat'");
    
                                                   $resultareat = pg_fetch_assoc($sql_areat);

                                                   if ($nombrearea == '') {
                                                      $nombrearea='no asignada';
                                                   }else{
                                                       $nombrearea = $resultareat['nombre'];
                                                   }
                                                  

                                            echo '<tr>
                                                
                                                 <td>'.$info['fecha'].'</td>
                                                 <td>'.$nombrearea.'</td>
                                                 <td>'.$info['status'].'</td>
                                                 <td>'.$info['observacion'].'</td>
                                                
                                                </tr>
                                             
                                            
                                                ';
                                             }
                                               }
                                             ?><?php echo '
                                            
                                        </tbody>
                                    </table>
                                </div>



   '
       ;   ?>        