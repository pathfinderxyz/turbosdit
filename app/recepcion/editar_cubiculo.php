<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';
$idnum = $_GET['num'];

$sql = pg_query($cnx,"SELECT * from cubiculos where numero='$idnum'");
$info = pg_fetch_assoc($sql);




  echo '<form action="app/recepcion/update_cubiculo.php" method="post">
      
            <div class="form-group">
               <label for="exampleInputName2">Nombre de usuario</label>
               <input type="text" class="form-control" name="cubiculo" value="'.$info['nombre'].'" required>
               
            </div>
          <div class="form-group">
         
             <input type="hidden" name="idnum" value="'.$idnum.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            