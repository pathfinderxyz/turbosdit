<?php 
     
    include '../../coneccion/coneccion.php';
    $codigo_articulo = $_GET['codigo']; 

     
    $sql_inv = pg_query("SELECT * FROM inventario where codigo = '$codigo_articulo'");
    
    $info_inv = pg_fetch_assoc($sql_inv);
    
?>

<body class="skin-default card-no-border">
    
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                    </div>
                     <div class="col-sm-8 col-xs-12">
                        <div class="card card-body">
                            <div class="row">
                               <div class="col-3">
                                    <img src="assets/images/logo-turbos.png"  class="dark-logo" style="width: 55px;" />
                               </div>
                               <div class="col-6">
                                   <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                                  Registro de salida de turbocargadores</h4>
                                </div>
                                <div class="col-3">
                                     <img src="assets/images/logo-ditsa.png"  class="dark-logo" style="width: 150px;" />
                                </div>
                            </div><br>
                            <form  action="app/almacen/funciones/update_salida.php" method="post">
                            <div class="row">
                                <div class="col-7">
                                  <div class="form-group  row">
                                        <label for="example-text-input" class="col-2 col-form-label">Ruta:</label>
                                        <div class="col-10">
                                             <select name="ruta" class="form-control custom-select">
                                                        <option></option>
                                                        <option value="Almacen">Almacen</option>
                                                        <option value="Produccion">Produccion</option>
                                                        
                                                    </select>
                                        </div>
                                    </div>
                                 </div>
                                  <div class="col-5">
                                 <div class="form-group  row">
                                        <label for="example-text-input" class="col-3 col-form-label">Fecha</label>
                                        <div class="col-9">
                                            <input class="form-control" type="date" name="fecha_salida" >
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     
                                    
                                         <div class="row">
                                          <div class="col-2">
                                            <label for="exampleInputName2">Cantidad</label>
                                            <input type="float" class="form-control" name="cantidad">
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Modelo</label>
                                            <input type="text" class="form-control" name="modelo" value="<?php echo $info_inv['nombre'] ;?>">
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Serie</label>
                                            <input type="text" class="form-control" name="serie" value="<?php echo $info_inv['serie'] ;?>">
                                          </div>
                                           <div class="col-4">
                                            <label for="exampleInputName2">Observacion</label>
                                            <textarea type="number" class="form-control" name="observacion"></textarea>
                                          </div>
                                        </div><br>
                                         <div class="row">
                                          <div class="col-4">
                                            <label for="exampleInputName2">Folio</label>
                                            <input type="text" class="form-control" name="folio">
                                          </div>
                                           <div class="col-4">
                                            <label for="exampleInputName2">Gastos</label>
                                            <input type="text" class="form-control" name="gastos">
                                          </div>
                                           <div class="col-4">
                                            <label for="exampleInputName2">Notas foliadas</label>
                                            <input type="text" class="form-control" name="notas_foliadas">
                                          </div>
                                          
                                        </div><br>
                                        <div class="row">
                                          <div class="col-4">
                                            <label for="exampleInputName2">Concepto de movimiento</label>
                                            <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" 
                                            name="movimiento"> 
                                     
                                         <?php    
                                            echo '<option value="ninguno"></option>'; 
                                            $sql = pg_query("SELECT * from conceptos_mov");
                                            while($row = pg_fetch_assoc($sql)){
                                            echo '<option value='.$row["movimiento"].'>'.$row["movimiento"].'</option>';
                                          }
                                         ?>
             
                                        </select>
                                          </div>
                                        </div><br>


                                        <input type="hidden" name="familia" value="<?php echo $info_inv['familia'] ;?>">
                                         <input type="hidden" name="codigo" value="<?php echo $codigo_articulo ;?>">       
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a href="?page=entradas"><button type="button" class="btn btn-dark">Volver</button></a>

                                    </form>

                                </div>
                                 
                            </div>
                        </div>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                    </div>
                     
                </div>
       

    </section>

</body>