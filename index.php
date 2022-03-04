  <?php      
    error_reporting(0);    
    
?>                            
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.png">
    <title>Login | Turbos</title>
    
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
        <div class="login-register" style="background-image:url(assets/images/banner_turbo.jpg);">
            <div class="login-box card">
                            <?php
                                 if ($_GET["errorusuario"]=="si"){
                             ?>
                                 <div class="alert"><strong style="color:#B71C1C;"> Datos Incorrectos !</strong></div>
                           <?php  
                               }elseif ($_GET["registro"]=="exitoso") {
                                ?>
                                   <br><div class="success"><strong style="color: #ffffff;margin-left: 80px;background-color: #5baf30;padding: 8px;border-radius: 3px;">¡Te has registrado con exitoso!</strong></div>
                            <?php 
                                 }  
                             ?>
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="login/autenticacion.php" method="post">
                        <h3 class="text-center m-b-20">Iniciar Sesion</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="username" type="text" required="" placeholder="Usuario"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password"  type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Recuerdame</label>
                                    </div> 
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted">¿Olvidaste pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-dark btn-rounded" type="submit">Entrar</button>
                            </div>
                        </div>
                         <div class="form-group text-center">
                             <img src="assets/images/logo-turbos.png" alt="homepage" class="dark-logo" style="width: 75px;" />&nbsp;&nbsp; <img src="assets/images/logo-ditsa.png" alt="homepage" class="dark-logo" style="width: 196px;" />
                        </div>
                       
                        
                        <div class="form-group m-b-0">
                            
                        </div>
                    </form>

                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recuperar contraseña</h3>
                                <p class="text-muted">Ingrese su correo electrónico y se le enviarán las instrucciones para cambiarla.</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Correo Electronico"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="button" onClick="location.href='index.php'">Resetear</button>
                            </div>
                        </div>
                    </form>
                </div>
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
    <!--Custom JavaScript -->
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