<?php 
    session_start();
    include "login/seguridad.php";
    include "Errores/mostrar_errores.php";
    include "coneccion/coneccion.php"; 

    $id=$_GET['id'];
        
    error_reporting(0);
  

    $sql = pg_query($cnx ,"select * from usuarios where id='$id'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        $_SESSION['usuario'] = $info['usuario'];
        $_SESSION['rol'] = $info['rol'];
        $_SESSION['id']=$info['id'];
        $_SESSION['nombre']=$info['nombre'];
        $_SESSION['activo']=$info['activo'];
        
    }


    
    $file = "";//Vista a cargar
    $m_menu = "";
    
    //Control peticiones por rol
    if ($_SESSION['activo'] == 'si') { //lo que hace aqui es preguntar :
          // si el usuario es tu, da o su entonces si lo que se devolvio por parametros get fue page = xxxxxx entonces llevalo alla 
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'registrar') {
                $file = 'registrar/registro.php';                
            }elseif ($_GET['page'] == 'opciones') {
                $file = 'biennacional/opciones.php';   
            }elseif ($_GET['page'] == 'home') {
                $file = 'home.php';   
            }elseif ($_GET['page'] == 'recepcion') {
                $file = 'recepcion/recepcion.php';   
            }elseif ($_GET['page'] == 'recepcion') {
                $file = 'recepcion/recepcion.php';   
            }elseif ($_GET['page'] == 'almacen') {
                $file = 'almacen/almacen.php';   
            }elseif ($_GET['page'] == 'produccion') {
                $file = 'produccion/orden_trabajo.php';   
            }elseif ($_GET['page'] == 'trabajo') {
                $file = 'trabajo/trabajo.php';   
            }elseif ($_GET['page'] == 'reportes') {
                $file = 'reportes/reportes.php';   
            }elseif ($_GET['page'] == 'usuario') {
                $file = 'usuario/crear_usuario.php';   
            }elseif ($_GET['page'] == 'listusuario') {
                $file = 'usuario/listado_usuario.php';   
            }elseif ($_GET['page'] == 'crearperfil') {
                $file = 'usuario/crear_perfil.php';   
            }elseif ($_GET['page'] == 'listperfil') {
                $file = 'usuario/listado_perfiles.php';   
            }elseif ($_GET['page'] == 'recepcion') {
                $file = 'recepcion/recepcion.php';   
            }elseif ($_GET['page'] == 'ordenes_ent') {
                $file = 'recepcion/ver_ordenes.php';   
            }elseif ($_GET['page'] == 'cubiculos') {
                $file = 'recepcion/cubiculo.php';   
            }elseif ($_GET['page'] == 'operarios') {
                $file = 'recepcion/operario.php'; 
            }elseif ($_GET['page'] == 'crear_cubi') {
                $file = 'recepcion/crear_cubiculo.php';   
            }elseif ($_GET['page'] == 'turbos') {
                $file = 'produccion/turbos.php';   
            }elseif ($_GET['page'] == 'stock') {
                $file = 'almacen/stock.php';   
            }elseif ($_GET['page'] == 'pedidos') {
                $file = 'almacen/pedidos.php';   
            }elseif ($_GET['page'] == 'bodegas') {
                $file = 'almacen/bodegas.php';   
            }elseif ($_GET['page'] == 'entradas') {
                $file = 'almacen/entrada.php';   
            }elseif ($_GET['page'] == 'salidas') {
                $file = 'almacen/salidas.php';   
            }elseif ($_GET['page'] == 'new_stock') {
                $file = 'almacen/new_stock.php';   
            }elseif ($_GET['page'] == 'crear_bodegas') {
                $file = 'almacen/crear_bodegas.php';   
            }elseif ($_GET['page'] == 'crear_entrada') {
                $file = 'almacen/crear_entrada.php';   
            }elseif ($_GET['page'] == 'crear_salida') {
                $file = 'almacen/new_salida.php';   
            }elseif ($_GET['page'] == 'formatoni') {
                $file = 'produccion/formato_ni.php';   
            }elseif ($_GET['page'] == 'ordenseg') {
                $file = 'seguimiento/ordeneseg.php';   
            }elseif ($_GET['page'] == 'turbos_seg') {
                $file = 'seguimiento/turbos_seg.php';   
            }elseif ($_GET['page'] == 'turbosinc') {
                $file = 'seguimiento/turbosinc.php';   
            }elseif ($_GET['page'] == 'matesol') {
                $file = 'reportes/materialsolicitado.php';   
            }elseif ($_GET['page'] == 'mostrarni') {
                $file = 'produccion/mostrarNI.php';   
            }elseif ($_GET['page'] == 'updateni') {
                $file = 'produccion/update2_ni.php';   
            }elseif ($_GET['page'] == 'repfinalni') {
                $file = 'produccion/reportefinal.php';   
            }elseif ($_GET['page'] == 'produccion_ope') {
                $file = 'produccion/ordenes_ope.php';   
            }elseif ($_GET['page'] == 'updateni_ope') {
                $file = 'produccion/update_ni_ope.php';   
            }elseif ($_GET['page'] == 'requisicion') {
                $file = 'produccion/requisicion.php';   
            }elseif ($_GET['page'] == 'requisicion_list') {
                $file = 'produccion/requisicion_operador.php';   
            }elseif ($_GET['page'] == 'aprobarmaterial') {
                $file = 'almacen/aprobar_material.php';   
            }elseif ($_GET['page'] == 'modifuser') {
                $file = 'usuario/modificar_usuario.php';   
            }elseif ($_GET['page'] == 'fnilist') {
                $file = 'recepcion/fnilist.php';   
            }elseif ($_GET['page'] == 'concepto') {
                $file = 'almacen/list_conceptos.php';   
            }elseif ($_GET['page'] == 'crear_concepto') {
                $file = 'almacen/concepto_mov.php';   
            }elseif ($_GET['page'] == 'ajustes') {
                $file = 'almacen/ajustes_inv.php';   
            }elseif ($_GET['page'] == 'conf_minimos') {
                $file = 'almacen/conf_minimos.php';   
            }elseif ($_GET['page'] == 'urgente') {
                $file = 'almacen/stock_urgente.php';   
            }elseif ($_GET['page'] == 'no_urgentes') {
                $file = 'almacen/stock_nourgente.php';   
            }elseif ($_GET['page'] == 'alertas') {
                $file = 'almacen/alertas.php';   
            }elseif ($_GET['page'] == 'editar_orden') {
                $file = 'recepcion/editar_orden.php';   
            }
        }else{
            $file = 'inicio.php';  
        }
    }


    $sqlperfil = pg_query($cnx,"SELECT * from perfiles where nombre='recepcionista'");
    $rowperfil = pg_fetch_assoc($sqlperfil);
    $recepcion= $rowperfil['recepcion'];
    $produccion= $rowperfil['produccion'];
    $almacen= $rowperfil['almacen'];
    $produccion= $rowperfil['seguimiento'];
    $reportes= $rowperfil['reportes'];


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
    <title>Dashboard | Turbos</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/form-icheck.css" rel="stylesheet">

    <link href="assets/node_modules/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->


<style type="text/css">
.topbar .navbar-collapse {
    padding: 0;
    background: #000733 !important;
}
</style>
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!--<div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando</p>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="?page=home">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-turbos.png" alt="homepage" class="dark-logo" style="width: 40px;"/>
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-ditsa.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-ditsa.png" alt="homepage" class="dark-logo" style="width: 120px;margin-left: 10px;
"/>
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
                     </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                     <div><h6><span style="color: #fff !important;"> <?php  echo $_SESSION['nombre'];?><span> <h6></div> 
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                       <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo'
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-settings"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Configuraciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center ">
                                            <!-- Message -->
                                            <a href="?page=usuario">
                                                <i class="icon-plus"></i>
                                                <div class="mail-contnet ">
                                                    <h6>Crear usuario</h6>  </div>
                                            </a>
                                             <a href="?page=listusuario">
                                                <i class="icon-menu"></i>
                                                <div class="mail-contnet">
                                                    <h6>Listado de usuario</h6>  </div>
                                            </a>
                                            <!-- Message -->
                                             <a href="?page=crearperfil">
                                                <i class="icon-user"></i>
                                                <div class="mail-contnet">
                                                    <h6>Crear perfil de usuario</h6>  </div>
                                            </a>
                                            <a href="?page=listperfil">
                                                <i class="icon-people"></i>
                                                <div class="mail-contnet">
                                                    <h6>Perfiles de usuarios</h6>  </div>
                                            </a>
                                            <a href="?page=modifuser">
                                                <i class="icon-people"></i>
                                                <div class="mail-contnet">
                                                    <h6>mod</h6>  </div>
                                            </a>
                                           
                                          
                                             
                                            <!-- Message -->
                                           
                                            <!-- Message -->
                                          
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>      
                       
                        </li>';
                                         }
                                 ?>  
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                          <li>
                            <a  href="?page=home" aria-expanded="false">
                                <i class="icon-home"></i>
                                <span class="hide-menu">Inicio
                                   
                                </span>
                            </a>
                          
                        </li>
                        <?php  
                                  if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'recepcionista') {
                                     echo' 
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="?page=recepcion" aria-expanded="false">
                                <i class="icon-note"></i>
                                <span class="hide-menu">Recepcion
                                    <!--<span class="badge badge-pill badge-cyan ml-auto">4</span>-->
                                </span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=recepcion">Añadir orden</a>
                                </li>
                                <li>
                                    <a href="?page=ordenes_ent">Ordenes</a>
                                </li>
                                
                              
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Configuracion</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li>
                                            <a href="?page=cubiculos">Area de trabajo</a>
                                        </li>
                                        <li>
                                            <a href="?page=operarios">Operarios</a>
                                        </li>
                                       
                                    </ul>
                                 
                              
                            </ul>
                           
                        </li>  ';
                                         }
                                 ?>        
                       
                        <?php  
                                  if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'almacenista') {
                                     echo'
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="?page=almacen" aria-expanded="false">
                                <i class="icon-layers"></i>
                                <span class="hide-menu">Almacen</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=stock&fam=Todos">Inventario</a>
                                </li>

                                <li>
                                    <a href="?page=pedidos">Pedidos</a>
                                </li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Configuracion</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li>
                                            <a href="?page=bodegas">Bodegas</a>
                                        </li>
                                         <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Movimientos</a>
                                         <ul aria-expanded="false" class="collapse">
                                             <li>
                                                 <a href="?page=concepto">Concepto de Movimientos</a>
                                             </li> 
                                            
                                             <li>
                                                 <a href="?page=entradas">Historial entradas</a>
                                             </li>
                                             <li>
                                                 <a href="?page=salidas">Historial salidas</a>
                                             </li>
                                       
                                         </ul>
                                          <li>
                                                 <a href="?page=ajustes">Ajustes Inventario</a>
                                             </li> 
                                         <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Avisos de minimos</a>
                                         <ul aria-expanded="false" class="collapse">
                                             <li>
                                                 <a href="?page=conf_minimos">Configurar minimos</a>
                                             </li> 
                                            
                                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Material a surtir</a>
                                         <ul aria-expanded="false" class="collapse">
                                             <li>
                                                 <a href="?page=urgente">Urgentes</a>
                                             </li> 
                                            
                                             <li>
                                                 <a href="?page=no_urgentes">No urgentes</a>
                                             </li>

                                         </ul>
                                             <li>
                                                 <a href="?page=alertas">Color de alertas</a>
                                             </li>
                                       
                                         </ul>
                                       
                                       
                                    </ul>
                                 
                            </ul>
                           
                        </li>';
                                         }
                                 ?> 
                         <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo'          
                         <li>
                            <a class="has-arrow waves-effect waves-dark"  href="?page=produccion" aria-expanded="false">
                                <i class="icon-chart"></i>
                                <span class="hide-menu">Produccion</span>
                            </a>
                              <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=produccion">Orden de trabajo</a>
                                </li>
                                 <li>
                                    <a href="?page=fnilist">Formatos NI</a>
                                </li>
                                <li>
                                    <a href="?page=turbos">Ver Turbos</a>
                                </li>
                                
                              
                            </ul>
                             
                        </li>';
                                         }
                                 ?>
                          <?php  
                                  if ($_SESSION['rol'] == 'operario') {
                                     echo'          
                         <li>
                            <a class="has-arrow waves-effect waves-dark"  href="?page=produccion" aria-expanded="false">
                                <i class="icon-chart"></i>
                                <span class="hide-menu">Produccion</span>
                            </a>
                              <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=produccion_ope">Orden de trabajo</a>
                                </li>

                                <li>
                                    <a href="?page=turbos">Ver Turbos</a>
                                </li>
                                
                              
                            </ul>
                             
                        </li>';
                                         }
                                 ?>       
                          <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo'        
                         <li>
                            <a class="has-arrow waves-effect waves-dark"  href="?page=trabajo" aria-expanded="false">
                                <i class="icon-docs"></i>
                                <span class="hide-menu">Seguimiento</span>
                            </a>
                               <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=ordenseg">Status ordenes</a>
                                </li>
                                <li>
                                    <a href="?page=turbos_seg">Turbos Stock</a>
                                </li>
                                <li>
                                    <a href="?page=turbosinc">Turbos Incompletos</a>
                                </li>
                              
                            </ul>
                            
                        </li>';
                                         }
                                 ?>
                              <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo'     
                          <li>
                            <a class="has-arrow waves-effect waves-dark"  href="?page=reportes" aria-expanded="false">
                                <i class="icon-printer"></i>
                                <span class="hide-menu">Reportes</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=matesol">Material solicitado</a>
                                </li>
                            </ul>
                        </li>';
                                         }
                                 ?>

                        <li>
                            <a class="waves-effect waves-dark" href="index.php" aria-expanded="false">
                                <i class="icon-logout"></i>
                                <span class="hide-menu">Salir</span>
                            </a>
                        </li>
                  
                     
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                 <?php  
                  include 'app/'.$file;
                 ?>

               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Turbos
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="http:/code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Datatable -->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

    <script src="assets/node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="dist/js/pages/bootstrap-table.init.js"></script>
  
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

      <!-- Chart JS -->
    <script src="assets/node_modules/Chart.js/Chart.min.js"></script>
    <script src="assets/node_modules/Chart.js/chartjs.init.js"></script>

    <script src="dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
    <!-- end - This is for export functionality only -->
   
    <script>
        $(function () {
            
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

        new Chart(document.getElementById("chart22"),
        {
            "type":"bar",
            "data":{"labels":["Operaror 1","Operaror 2","Operaror 3","Operaror 4","Operaror 5","Operaror 6"],
            "datasets":[{
                            "label":"Cantidad de material solicitado",
                            "data":[65,59,80,81,56,55],
                            "fill":false,
                            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                            "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                            "borderWidth":1}
                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });
         

    </script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
    $.ajax({
            type: "POST",
            url: "app/recepcion/ajax.php",
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
    
</body>

</html>