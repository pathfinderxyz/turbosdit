<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query($cnx,"SELECT * FROM ordenes_trabajo");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Status Ordenes de Trabajo</h4>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ordenes de trabajo</h4>
                                <h6 class="card-subtitle">Estas son todas las ordenes de trabajo registradas</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                               
                                                
                                                <th>Fecha Recepcion</th>
                                                <th># Orden</th>
                                                <th># FormatoNI</th>
                                                <th>Cliente</th>
                                                <th>Modelo Turbo</th>
                                                <th>Ver historial</th>
                                                
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
                                                
                                                <td>'.$info['fecha_rec'].'</td>
                                                <td>'.$info['n_orden'].'</td>
                                                <td>'.$n_fni.'</td>
                                                <td>'.$info['cliente'].'</td>
                                                <td>'.$info['modelo_turbo'].'</td>
                                                <td>
                                                    
                                                    <a class="btn btn-success" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" onClick="imprimir ('.$info['n_orden'].')" ><i class="icon-eye"></i> Ver </a>
                                                 </td>
                                                
                                               </tr>
                                                
                                                 <div>
                                                     <div class="modal bs-example-modal-lg" id="modalpeso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                         <div class="modal-dialog modal-xl">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" >Historial de la Orden</h4>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div id="conte-modal3"></div>
                                                                 </div>
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

<script type="text/javascript">
     function imprimir(modal){
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal3').load('app/seguimiento/modal_historial.php?orden='+modal, function() {
        $('#modalpeso').modal({show:true});
    });    
    } 
</script>
 