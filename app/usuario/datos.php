<?php 
     $idrefp=  $_SESSION['id_refer_padre'];

    $sql = pg_query("select * from usuarios where id='$idrefp'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        
         $patro=$info['usuario'];
        
    }
    ?>

          <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Datos Personales</h4>
                    </div>
                  
                </div>
               
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card"> <img class="card-img" src="assets/images/background/socialbg.jpg" height="300" alt="Card image">
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center"> <img src="assets/images/users/1.png" class="img-circle" width="100">
                                    <h4 class="card-title"><?php  echo $_SESSION['nombre'];?> <?php  echo $_SESSION['apellido'];?></h4>
                                    <h6 class="card-subtitle"><?php  echo $_SESSION['usuario'];?></h6>
                                    <p class="text-white">Miembro desde <?php echo $_SESSION['fecha'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body"> 
                                <small class="text-muted">Link de Referido </small><h6><a href="http://localhost/sisref/registrar.php?ref=<?php echo $_SESSION['id'];?>">http://localhost/sisref/registrar.php?ref=<?php echo $_SESSION['id'];?></a></h6> 
                                <small class="text-muted">Correo </small><h6><?php echo $_SESSION['correo'];?></h6> 
                                <small class="text-muted p-t-30 db">Telefono</small><h6><?php echo $_SESSION['telefono'];?></h6> 
                                <small class="text-muted p-t-30 db">Pais</small> <h6><?php echo $_SESSION['pais'];?></h6>
                                <small class="text-muted p-t-30 db">Referido de</small> <h6><?php echo $patro ?></h6>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                             <div class="card-body">
                                
                             <form class="form-horizontal form-material" action="#">
                                             
                                            <div class="form-group">
                                                <label class="col-md-12">Cedula/pasaporte</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Nombre</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['nombre'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Apellido</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['apellido'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Telefono</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="<?php echo $_SESSION['telefono'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Banco</label>
                                                <div class="col-md-12">
                                                    <input type="text"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Direccion completa</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                           
                                            
                                        </form>
                                        <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Actualizar datos</button>
                                                </div>
                                            </div>
                            </div>
                            
                           
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
          </div>