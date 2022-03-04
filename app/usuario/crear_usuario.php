<?php
include '../../coneccion/coneccion.php';

?>
<body class="skin-default card-no-border">
   
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Registrar un nuevo usuario</h4><br>
                    
                            <h5 class="card-subtitle"> Introduzca los datos del usuario</h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     <form  action="app/usuario/crearuserf.php" method="post">
                                    
                                        <div class="form-group">
                                            <label for="exampleInputName2"> Nombre de usuario</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputName2"> Contraseña</label>
                                            <input type="text" class="form-control" name="pass" id="pass" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputName2"> Repita la contraseña</label>
                                            <input type="text" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                        <label for="rol">Elegir Perfil</label>
                                        <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="perfil" id="perfil" required="">
                                                <?php    
                                                      echo '<option value="ninguno"></option>'; 
                                                       $sql = pg_query("SELECT * from perfiles");
                                                      while($row = pg_fetch_assoc($sql)){
                                                       echo '<option>'.$row["nombre"];
                                                  }
                                                ?>
                                               
                                        </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail2">Caracteristicas</label><br>
                                            <textarea class="form-control" name="caracteristicas" id="caracteristicas" rows="2" cold="20"></textarea>
                                        </div>                
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        
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