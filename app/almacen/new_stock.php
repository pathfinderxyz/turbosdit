<body class="skin-default card-no-border">
    
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                                Crear un nuevo articulo</h4><br>
                    
                            <h6 class="card-subtitle">Introduzca los datos de la nueva parte, refaccion, 
                                turbos completo o herramienta a crear en el inventario.</h6>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     <form  action="app/almacen/funciones/save_stock.php" method="post">

                                         <div class="row">
                                            <div class="col-8">
                                               <label for="exampleInputName2"> Nombre o modelo</label>
                                                <input type="text" class="form-control" name="pieza"  required>
                                             </div>
                                            
                                          <div class="col-4">
                                            <label or="message-text" class="control-label">Fecha entrada</label>
                                               <input class="form-control" type="date" name="fecha_entrada" required>
                                          </div>
                                        </div><br>
                                    
                                         
                                        <div class="form-group">
                                            <label for="exampleInputName2"> Serie</label>
                                            <input type="text" class="form-control" name="serie">
                                        </div>  
                                       

                                        <div class="form-group">
                                        <label for="rol">Seleccione a que categoria pertenece:</label>
                                        <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="familia">'; 
                                     
                                         <?php    
                                            echo '<option value="ninguno"></option>'; 
                                            $sql = pg_query("SELECT * from categoria_articulos");
                                            while($row = pg_fetch_assoc($sql)){
                                            echo '<option value='.$row["nombre_familia"].'>'.$row["nombre_familia"].'</option>';
                                          }
                                         ?>
             
                                        </select><br><br>
                                        <a class="btn waves-effect waves-light btn-rounded btn-xs btn-info" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" 
                                                    data-target="#crear_turbo">crear categoria</a>
                                        </div>

                                       
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
                                             $sql = pg_query("SELECT nombre from  bodegas ");
                                              while($row = pg_fetch_assoc($sql)){
                                               echo '<option>'.$row["nombre"];
                                                }
                                             ?>
                                             </select>
                                          </div>

                                        
                                  

                                       
                                               
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        
                                    </form>

                                </div>
                                 
                            </div>
                        </div>

                       <div id="crear_turbo" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                     <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Crear nueva familia de articulos</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="app/almacen/crear_familia.php" name="form1" method="POST">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre_familia" >
                                                    </div>
                                                    
                                                    <div class="row">
                                                     </div>
                                                     <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Descripcion</label>
                                                        <input type="text" class="form-control" name="descripcion">
                                                    </div>
                                                <div id="respuesta"><!-- Respuesta AJAX --></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                                            </div>
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