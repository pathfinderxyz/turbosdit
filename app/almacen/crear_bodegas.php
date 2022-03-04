<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">
                                Añadir un nueva bodega</h4><br>
                    
                            <h5 class="card-subtitle">Introduzca los datos de la nueva bodega</h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     <form  action="app/almacen/funciones/save_bodega.php" method="post">
                                    
                                         <div class="form-group">
                                            <label for="exampleInputName2"> Nombre de la bodega</label>
                                            <input type="text" class="form-control" name="bodega"  required>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputName2"> Descripcion</label>
                                            <textarea type="text" class="form-control" name="descripcion_bodega"  required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName2">Encargado</label>
                                            <select  class="form-control custom-select"  name="encargado">'; 
          
                                               <?php    
                                                  echo '<option value="ninguno"></option>'; 
                                                  $sql = pg_query("SELECT * from usuarios where rol='almacenista'");
                                                  while($row = pg_fetch_assoc($sql)){
                                                  echo '<option value='.$row["usuario"].'>'.$row["usuario"].'</option>';
                                                 }
                                                 ?>
                                                <?php       
                                               echo '</select>
                                               </div>';?>
                                               
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a href="?page=bodegas"><button type="button" class="btn btn-dark">Volver</button></a>

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