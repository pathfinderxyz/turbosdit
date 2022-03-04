<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <br><section id="wrapper">
        
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Crear un nuevo perfil</h4><br>
                    
                            <h5 class="card-subtitle">Crear Perfil de Usuario</h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                     <form  action="app/usuario/guardar_perfil.php" method="post">
                                    
                                        <div class="form-group">
                                            <label for="exampleInputName2"> Nombre del Perfil</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                                        </div>
                                        <div class="form-group">
                                                <h5>Modulos a trabajar<span class="text-danger">*</span></h5><br>
                                                <div class="controls">
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="si" name="recepcion" class="custom-control-input" id="recepcion">
                                                            <label class="custom-control-label" for="recepcion">Recepcion</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="si" name="almacen" class="custom-control-input" id="almacen">
                                                            <label class="custom-control-label" for="almacen">Almacen</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="si" name="produccion" class="custom-control-input" id="produccion">
                                                            <label class="custom-control-label" for="produccion">Produccion</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="si" name="seguimiento" class="custom-control-input" id="seguimiento">
                                                            <label class="custom-control-label" for="seguimiento">Seguimiento</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="si" name="reportes" class="custom-control-input" id="reportes">
                                                            <label class="custom-control-label" for="reportes">Reportes</label>
                                                        </div>
                                                    </fieldset>
                                                    </div><br>
                                               
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        
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