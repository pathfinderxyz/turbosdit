<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';
$codinv = $_GET['cod'];

$sql = pg_query("SELECT * from inventario where codigo='$codinv'");
$info = pg_fetch_assoc($sql);


  echo '<form action="app/almacen/funciones/update_minimo.php" method="post">
      
          
          
             <div class="form-group">
               <label for="exampleInputName2">Cantidad minima</label>
               <input type="float" class="form-control" name="minimo" value="'.$info['minimos'].'">
            </div>
             <input type="hidden" name="codinv" value="'.$codinv.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            