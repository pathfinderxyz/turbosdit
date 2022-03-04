<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';
$codinv = $_GET['cod'];

$sql = pg_query($cnx,"SELECT * from inventario where codigo='$codinv'");
$info = pg_fetch_assoc($sql);


  echo '<form action="app/almacen/update_condicion.php" method="post">
      
          
          <div class="form-group">
          <label or="message-text" class="control-label">Indique si el articulo esta completo o incompleto</label>
             <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" 
             name="condicion" >'; 
             ?> 
              <?php    
                       echo '<option value="'.$info['condicion'].'">'.$info['condicion'].'</option>'; 
                 $sql = pg_query($cnx,"SELECT * from valores_ni where condicion != '".$info['condicion']."' ");
                     while($row = pg_fetch_assoc($sql)){
                       echo '<option value='.$row["condicion"].'>'.$row["condicion"].'</option>';
                       }
                ?>
          <?php       
              echo '</select>
              
             </div>
             <div class="form-group">
               <label for="exampleInputName2">Observacion (indique el motivo si esta incompleto)</label>
               <textarea type="text" class="form-control" name="obs_condicion" value="'.$info['obs_condicion'].'"></textarea>
            </div>
             <input type="hidden" name="codinv" value="'.$codinv.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            