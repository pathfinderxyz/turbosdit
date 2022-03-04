

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Registrar | Turbos</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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

</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div style="background-image:url(assets/images/banner_turbo.jpg);background-repeat:repeat;">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Crear cuenta como usuario</h4><br>
                            <?php
                                 if ($_GET["errorusuario"]=="si"){
                             ?>
                                 <div class="alert"><strong style="color:#B71C1C;">¡Este correo ya esta siendo usado por otra persona!</div>
        
                            <?php 
                                 }  
                             ?>
                            <h5 class="card-subtitle"> Patrocinador </h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                    <form action="app/registrar/reg.php" method="post">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="patrocinador" value="<?php echo $patro ?>"id="patrocinador" placeholder="patrocinador" required="" >
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
                                         <input type="hidden" name="idrefpadre" value="<?php echo $idrefpadre ?>">
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>