<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';
$iduser = $_GET['id'];

$sql = pg_query($cnx,"SELECT * from usuarios where id='$iduser'");
$info = pg_fetch_assoc($sql);
$roluser = $info['rol'];



  echo '<form action="app/usuario/update_user.php" method="post">
      
            <div class="form-group">
               <label for="exampleInputName2">Nombre de usuario</label>
               <input type="text" class="form-control" name="usuario" value="'.$info['usuario'].'" required>
               
            </div>
          <div class="form-group">
          <label or="message-text" class="control-label">Actualizar Rol de trabajo</label>
             <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" 
             name="rol" >'; 
             ?> 
              <?php    
                      echo '<option value="'.$roluser.'">'.$roluser.'</option>'; 
                 $sql = pg_query($cnx,"SELECT * from perfiles where nombre != '$roluser' ");
                     while($row = pg_fetch_assoc($sql)){
                       echo '<option value='.$row["nombre"].'>'.$row["nombre"].'</option>';
                       }
                ?>
          <?php       
              echo '</select>
              
             </div>
             <div class="form-group">
               <label for="exampleInputName2">Actualizar caracteristicas</label>
               <input type="text" class="form-control" name="caracteristicas" value="'.$info['caracteristicas'].'" required>
            </div>
             <input type="hidden" name="iduser" value="'.$iduser.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            