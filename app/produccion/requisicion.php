<?php 
     
    include '../../coneccion/coneccion.php';
    $n_orden = $_GET['idorden']; 

     
    $sql_inv = pg_query("SELECT * FROM inventario");
    
    $info_inv = pg_fetch_assoc($sql_inv);
    $sqlf = pg_query("SELECT MAX(folio) AS folio FROM inventario");
    $infof = pg_fetch_assoc($sqlf);
    $folio = $infof['folio'];
    
?>

<body class="skin-default card-no-border">
    
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-1 col-xs-12">
                    </div>
                     <div class="col-sm-10 col-xs-12">
                        <div class="card card-body">
                            <div class="row">
                               <div class="col-2">
                                    <img src="assets/images/logo-turbos.png"  class="dark-logo" style="width: 55px;" />
                               </div>
                               <div class="col-8">
                                   <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                                  Requisicion de material</h4>
                                </div>
                                <div class="col-2">
                                     <img src="assets/images/logo-ditsa.png"  class="dark-logo" style="width: 150px;" />
                                </div>
                            </div><br>
                            <form  action="app/produccion/guardar_requisicion.php" method="post">
                           
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                         <div class="row">
                                          <div class="col-6">
                                            <label for="exampleInputName2">Operador</label>
                                            <input type="text" class="form-control" name="operador" value="<?php echo $_SESSION['usuario'] ;?>" >
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Fecha</label>
                                            <input type="date" class="form-control" name="fecha_requisicion" required>
                                          </div>
                                           <div class="col-1">
                                            <label for="exampleInputName2">Folio</label>
                                            <input type="text" class="form-control" name="folio" value="<?php echo $folio + 1 ;?>">
                                          </div>
                                          
                                        </div><br>
                                    
                                         <div class="row">
                                          <div class="col-1">
                                            <label for="exampleInputName2">Cantidad</label>
                                            <input type="float" class="form-control" name="cantidad">
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Material</label>
                                            <select  class="form-control custom-select" data-placeholder="Choose a Category" 
                                            tabindex="1" name="material">'; 
                                     
                                         <?php    
                                            echo '<option value="ninguno"></option>'; 
                                            $sql = pg_query("SELECT * from inventario");
                                            while($row = pg_fetch_assoc($sql)){
                                            echo '<option value='.$row["codigo"].'>'.$row["familia"].' '.$row["nombre"].'</option>';
                                          }
                                         ?>
             
                                        </select>
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Area</label>
                                                   <select name="area" class="form-control custom-select">
                                                        <option></option>
                                                        <option value="Almacen">Almacen</option>
                                                        
                                                        
                                                    </select>
                                          </div>
                                           <div class="col-2">
                                            <label for="exampleInputName2">NI</label>
                                            <input type="text" class="form-control" name="ni" value="<?php echo $n_orden ;?>">
                                          </div>
                                           <div class="col-3">
                                            <label for="exampleInputName2">Observacion</label>
                                            <textarea type="number" class="form-control" name="observacion"></textarea>
                                          </div>
                                        </div><br>
                                        

                                        
                                         <input type="hidden" name="n_orden" value="<?php echo $n_orden ;?>">       
                                        <button type="submit" class="btn btn-success">Realizar pedido</button>
                                        <a href="?page=produccion"><button type="button" class="btn btn-dark">cancelar</button></a>

                                    </form>

                                </div>
                                 
                            </div>
                        </div>
                     </div>
                     <div class="col-sm-1 col-xs-12">
                    </div>
                     
                </div>
       

    </section>

</body>