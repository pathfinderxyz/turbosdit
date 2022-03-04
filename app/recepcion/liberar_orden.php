<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$num_orden = $_GET['orden'];

$sql2 = pg_query("SELECT * from ordenes_trabajo where n_orden ='$num_orden'");
$row2 = pg_fetch_assoc($sql2);

  echo '<form action="app/recepcion/liberar_orden_2.php" method="post">
      
        <div class="form-group">
         <label for="recipient-name" class="control-label">¿Esta seguro que desea quitar el area de trabajo <strong> #'.$row2["cubiculo"].'</strong>  ? </label>
       </div>
       
             <input type="hidden" name="num_orden" value="'.$num_orden.'">
              <input type="hidden" name="cubiculo" value="'.$row2["cubiculo"].'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger">Liberar</button>
                </div>
            </form>    '
          ?>          