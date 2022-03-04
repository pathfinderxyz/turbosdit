<?php
include '../../coneccion/coneccion.php';
//include 'Errores/mostrar_errores2.php';
$codigo = $_GET['cod'];

  echo '<form action="app/almacen/guardar_ing.php" method="post" enctype="multipart/form-data">
      
              <div class="form-group">
                  <label>Subir imagen</label>
                  <input type="file"  name="imagen"  class="form-control">
              </div>
              
             <input type="hidden" name="codigo" value="'.$codigo.'">
             
              </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            