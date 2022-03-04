<?php 
     
    include '../../coneccion/coneccion.php';
    $codigo_articulo = $_GET['codigo']; 

     
    $sql_inv = pg_query($cnx,"SELECT * FROM inventario where codigo = '$codigo_articulo'");
    
    $info_inv = pg_fetch_assoc($sql_inv);
    
?>

<body class="skin-default card-no-border">
   
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                               Registrar una nueva entrada de un articulo</h4><br>
                               <form  action="app/almacen/funciones/update_stock.php" method="post">
                                  <div class="row">
                                            <div class="col-8"><br>
                                            <h5 class="card-subtitle">Va realizar una de entrada del articulo 
                                              <strong><?php echo $info_inv['nombre'] ;?> </strong></h5>
                                             </div>
                                            
                                          <div class="col-4">
                                            <label or="message-text" class="control-label">Fecha entrada</label>
                                               <input class="form-control" type="date" name="fecha_entrada" required>
                                          </div>
                                  </div><br>
                                <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     
                                    
                                         <div class="row">
                                            <div class="col-9">
                                             <label or="message-text" class="control-label">Observacion</label>
                                               <input type="text" class="form-control" name="observacion"  required>
                                             </div>
                                            
                                          <div class="col-3">
                                            <label for="exampleInputName2">Cantidad</label>
                                            <input type="float" class="form-control" name="cantidad"  required>
                                          </div>
                                        </div><br>

                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Indique si los articulos son usados o nuevos!</label>
                                                    <select name="nuevo_usado" class="form-control custom-select">
                                                        <option></option>
                                                        <option value="nuevo">Nuevo</option>
                                                        <option value="usado">Usado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Si es un Turbo indique la condicion</label>
                                                    <select name="condicion" class="form-control custom-select">
                                                        <option></option>
                                                        <option value="No aplica">No aplica</option>
                                                        <option value="Completo">Completo</option>
                                                        <option value="Incompleto">Incompleto</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Si el articulo pertence a la categoria de ANILLOS elija si es ADM o ESC
                                                        de lo contrario elija "no aplica"</label>
                                                    <select name="tipo_anillo" class="form-control custom-select">
                                                        <option></option>
                                                        <option value="no aplica">No aplica</option>
                                                        <option value="ADM">ADM</option>
                                                        <option value="ESC">ESC</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                      
                                        
                                        <div class="form-group">
                                             <label or="message-text" class="control-label">Elija la Bodega destino</label>
                                             <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="bodega">'; 
                                             
                                             <?php    
                                             echo '<option value=""></option>'; 
                                             $sql = pg_query($cnx,"SELECT nombre from  bodegas ");
                                              while($row = pg_fetch_assoc($sql)){
                                               echo '<option>'.$row["nombre"];
                                                }
                                             ?>
                                             </select>
                                          </div>

                                        <input type="hidden" name="partes" value="<?php echo $info_inv['nombre'] ;?>">
                                        <input type="hidden" name="pertenece_a" value="<?php echo $info_inv['familia'] ;?>">
                                         <input type="hidden" name="codigo" value="<?php echo $codigo_articulo ;?>">

                                               
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a href="?page=entradas"><button type="button" class="btn btn-dark">Volver</button></a>

                                    </form>

                                </div>
                                 
                            </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-xs-12">
                    </div>
                     
                </div>
       

    </section>

</body>