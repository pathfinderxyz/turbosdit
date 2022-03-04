<?php

  include '../../coneccion/coneccion.php';
 
 ?>

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
                                Cambiar el color de los avisos de abastecimiento</h4><br>
                    
                            
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     <form  action="app/almacen/funciones/update_color_alerta.php" method="post">
                                    
                                        
                                       

                                        <div class="form-group">
                                            <label for="exampleInputName2">Elija si la opcion para asignar color</label>
                                            <select  class="form-control custom-select" data-placeholder="Choose a Category"  
                                            name="surtido">'; 
                                                   <?php    
                                                    
                                                    $sql = pg_query("SELECT * from valores_ni");
                                                    while($row = pg_fetch_assoc($sql)){
                                                    echo '<option value='.$row["id"].'>'.$row["surtido"].'</option>';
                                                        }
                                                     ?>
                                                 </select>
                                             </div>
                                             <div class="form-group">
                                            <label for="exampleInputName2">Elija color</label>
                                            <input type="color" class="form-control" name="color" required>
                                        </div>   
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