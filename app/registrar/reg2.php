<?php 
     $miid=  $_SESSION['id'];
     $patro=  $_SESSION['usuario'];
     
    ?>
<style type="text/css">
    .card-subtitle{
       font-weight: 500 !important;
       color: #212529 !important;
    }
    .wrapper{ 
     
       width:600px; 
       overflow-y:scroll; 
       position:relative;
       height: 300px;
}
</style>
<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <br><br><section id="wrapper">
        <div style="background-image:url(assets/images/background/login-register.jpg);">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Crear un nuevo referido en Nework</h4><br>
                    
                             <?php
                                 if ($_GET["errorusuario"]=="si"){
                             ?>
                                 <div class="alert"><strong style="color: #ffffff;background-color: #B71C1C;padding: 8px;border-radius: 3px;"> ¡El correo ya esta siendo usado por otra persona!</strong></div>
                           <?php  
                               }elseif ($_GET["registro"]=="exitoso") {
                                ?>
                                  <div class="success"><strong style="color: #ffffff;background-color: #5baf30;padding: 8px;border-radius: 3px;">¡Registro exitoso!</strong></div> <br>
                            <?php 
                                 }  
                             ?>
                            <h5 class="card-subtitle"> Patrocinador </h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                    <form action="app/registrar/reg22.php" method="post">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" value="<?php echo $patro ?>" name="patrocinador" id="patrocinador" placeholder="patrocinador" required="" >
                                        </div>
                                        <h5 class="card-subtitle"> Inicio de sesion</h5>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required="">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required="">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="password" class="form-control"  id="pass2" placeholder="Repetir Contraseña" required="">
                                        </div>
                                        <h5 class="card-subtitle"> Datos Personales</h5>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="tel" class="form-control" name="tel" id="tel" placeholder="Telefono" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" required="">
                                        </div>
                                        <h5 class="card-subtitle">Informacion de Pago</h5>
                                        <div class="form-group">
                                         <input type="email" class="form-control" id="exampleInputEmail12" placeholder="Envia exactamente esta cantidad: $28.54">
                                        </div>
                                        <div class="form-group">
                                         <input type="email" class="form-control" id="exampleInputEmail12" placeholder="Direccion de Payu: pagos@nework.com.co ">
                                        </div>
                                        <div class="form-group">
                                         <input type="hidden" name="idrefpadre" value="<?php echo $miid ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="checkbox1" value="check" required="">
                                                <label class="custom-control-label" for="checkbox1">Aceptas nuestros <a href="#"> terminos y condiciones</a></label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Crear cuenta</button>
                                        <button type="button" name="Cancelar" class="btn btn-dark" onClick="location.href='index.php'">Cancelar</button>
                                    </form>

                                </div>
                                 
                            </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-xs-12">
                    </div>
                     
                </div>
       

    </section>

</body>