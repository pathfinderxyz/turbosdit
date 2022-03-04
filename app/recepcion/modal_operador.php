<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$num_cubi = $_GET['num'];



  echo '<form action="app/recepcion/asignar_user_cubi.php" method="post">
      
        
       <div class="form-group">
          <label or="message-text" class="control-label">Operadores Disponibles</label>
             <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="operador">'; 
             ?> 
              <?php    
                      echo '<option value="ninguno"></option>'; 
                 $sql = pg_query("SELECT * from usuarios where rol='operario' and estado='Disponible'");
                     while($row = pg_fetch_assoc($sql)){
                       echo '<option>'.$row["usuario"];
                       }
                ?>
          <?php       
              echo '</select>
             </div>
             <input type="hidden" name="num_cubi" value="'.$num_cubi.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            