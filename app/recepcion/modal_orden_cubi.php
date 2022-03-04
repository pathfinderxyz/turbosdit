<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$num_orden = $_GET['orden'];



  echo '<form action="app/recepcion/asignar_orden_cubi.php" method="post">
      
        
       <div class="form-group">
          <label or="message-text" class="control-label">Areas de trabajo Disponibles con sus operadores</label>
             <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="cubiculo">'; 
             ?> 
              <?php    
                      echo '<option value="ninguno"></option>'; 
                 $sql = pg_query("SELECT * from cubiculos where estado='Disponible'");
                     while($row = pg_fetch_assoc($sql)){
                       echo '<option value='.$row["numero"].'>'.$row["nombre"].'-'.$row["operario"].'</option>';
                       }
                ?>
          <?php       
              echo '</select>
             </div>
             <input type="hidden" name="num_orden" value="'.$num_orden.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            