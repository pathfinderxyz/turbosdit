<?php
include '../../coneccion/coneccion.php';

$sql = pg_query("SELECT MAX(n_orden) AS n_orden FROM ordenes_trabajo");
$info = pg_fetch_assoc($sql);
$folio = $info['n_orden'];

?>

<style type="text/css">
#suggestions {
    box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
    height: auto;
    position: absolute;
    top: 70px;
    z-index: 9999;
    width: 206px;
}

#suggestions .suggest-element {
    background-color: #EEEEEE;
    border-top: 1px solid #d6d4d4;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    float: left;
}
</style>


  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Nueva orden de entrada</h4>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h4 class="m-b-0 text-white">Orden de trabajo</h4>
                            </div>
                            <div class="card-body">
                                <form action="app/recepcion/guardarorden.php" method="post">
                                    <div class="form-body">
                                         
                             <?php
                                 if ($_GET["registro"]=="fallido"){
                             ?>
                                 <div class="alert"><strong style="color: #ffffff;background-color: #B71C1C;padding: 8px;border-radius: 3px;"> Error no se pudo crear la orden</strong></div>
                           <?php  
                               }elseif ($_GET["registro"]=="exitoso") {
                                ?>
                                  <div class="alert"><strong style="color: #ffffff;background-color: #2eab1f;padding: 8px;border-radius: 3px;"> Orden creada con exito <a href="?page=ordenes_ent" style="color: #000;">Ver Ordenes</a></strong></div>
                            <?php 
                                 }  
                             ?>      

                              <?php
                                 if ($_GET["creacion"]=="si"){
                                   echo '<div class="alert"><strong style="color: #ffffff;background-color: #2eab1f;padding: 8px;border-radius: 3px;">Turbo creado con exito</strong></div>';
                                 }
                             
                                ?>
                                    
                                      
                                        <div class="row p-t-20">
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha de emision</label>
                                                    <input type="date" name="fechaemi" class="form-control" placeholder="Fecha de emision" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label">Folio</label>
                                                    <input type="text" name="folio" class="form-control" value="<?php echo $folio + 1 ;?>">
                                              </div>
                                            </div>
                                           
                                        </div>
                                        
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Cliente</label>
                                                    <input type="text" name="cliente" class="form-control" placeholder="Nombre del cliente" required>
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Direccion</label>
                                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion del cliente" required>
                                                 </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Ciudad</label>
                                                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad del cliente" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" required>RFC</label>
                                                    <input type="text" name="rfc" class="form-control">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Telefono</label>
                                                    <input type="text" name="telefono" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Modelo Turbocargador</label>
                                                   <input class="search_query form-control" type="text" name="key" id="key" placeholder="Buscar..."><br><br>
                                                 
                                                   <a class="btn waves-effect waves-light btn-rounded btn-xs btn-info" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" 
                                                    data-target="#crear_turbo">crear turbo</a>
                                                </div>
                                                <div id="suggestions"></div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Bomba de inyeccion</label>
                                                    <input type="text" name="bomba_iny" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                     <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tipo de reparacion</label>
                                                    <select name="tipo_rep" class="form-control custom-select" required>
                                                        <option>--Seleccione la reparacion--</option>
                                                        <option value="Reparacion Mayor">Reparacion Mayor</option>
                                                        <option value="Reparacion Intermedia">Reparacion Intermedia</option>
                                                        <option value="Reparacion Menor">Reparacion Menor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                            <div class="row">
                                           <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Importe</label>
                                                    <input type="text" name="importe" class="form-control" required>
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>A cuenta</label>
                                                    <input type="text" name="a_cuenta" class="form-control" required>
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Restan</label>
                                                    <input type="text" name="restan" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fecha de entrega</label>
                                                    <input type="date" name="fecha_entrega" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <input type="text" name="observaciones" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                  
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="icon-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                 <div>
                     <div id="crear_turbo" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Crear nuevo modelo de turbo</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="app/recepcion/crear_turbo.php" name="form1" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Modelo de turbo</label>
                                                        <input type="text" class="form-control" name="modelo_turbo" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label>Subir imagen del turbo</label>
                                                        <input type="file"  name="imagen"  class="form-control">
                                                      </div>
                                                     <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Marca</label>
                                                        <input type="text" class="form-control" name="marca">
                                                    </div>
                                                <div id="respuesta"><!-- Respuesta AJAX --></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
</div>


<script>
$(document).ready(function(){   
    $(document).on('submit', '#form1', function() { 

        //Obtenemos datos formulario.
        var data = $(this).serialize(); 

        //AJAX.
        $.ajax({  
            type : 'POST',
            url  : 'crear_turbo.php',
            data:  data, 

            success:function(data) {  
                $('#respuesta').html(data).fadeIn();
            }  
        });
        return false;
   });
});//Fin document.
</script>

<script>
$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
    $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
        });
    });
}); 
</script>

    