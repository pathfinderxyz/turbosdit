<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$num_cubi = $_GET['num'];

$sql2 = pg_query("SELECT * from cubiculos where numero ='$num_cubi'");
$row2 = pg_fetch_assoc($sql2);

  echo '<form action="app/recepcion/liberar_cubi_2.php" method="post">
      
        <div class="form-group">
         <label for="recipient-name" class="control-label">¿Esta seguro que desea liberar el area de trabajo <strong> #'.$row2["numero"].'</strong>  ? </label>
       </div>
       
             <input type="hidden" name="num_cubi" value="'.$num_cubi.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger">Liberar</button>
                </div>
            </form>    '
          ?>          