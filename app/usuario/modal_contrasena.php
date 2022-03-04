<?php
include '../../coneccion/coneccion.php';
include 'Errores/mostrar_errores2.php';
$id_user = $_GET['id'];



  echo '<form action="app/usuario/cambiar_pass.php" method="post">
      
             
               <div class="form-group">
                  <label for="exampleInputName2">Introduzca la nueva contraseña</label>
                    <input type="text" class="form-control" name="pass" required>
               </div>
       
             <input type="hidden" name="id_user" value="'.$id_user.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>    '
          ?>                                            