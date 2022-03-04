<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$num_orden = $_GET['orden'];

$sql = pg_query($cnx,"SELECT * from ordenes_trabajo where n_orden='$num_orden'");
$info = pg_fetch_assoc($sql);



  echo '<form action="app/produccion/update_status.php" method="post">
      
            <div class="form-group">
               <label for="exampleInputName2">Status actual</label>
               <input type="text" class="form-control" placeholder="'.$info['status'].'">
            </div>
            <div class="form-group">
              <label for="rol">Nuevo Status:</label>
                  <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="status"  required="">
                      <option value=""></option>
                      <option value="Recibido">Recibido</option>
                      <option value="En trabajo">En trabajo</option>
                      <option value="Pausado">Pausado</option>
                      <option value="Culminado">Culminado</option>
                                               
                   </select>
             </div>
             <div class="form-group">
               <label for="exampleInputName2">Observacion</label>
               <textarea type="text" class="form-control" name="observaciones"></textarea>
            </div>
             <input type="hidden" name="num_orden" value="'.$num_orden.'">
             <input type="hidden" name="area" value="'.$info['cubiculo'].'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            