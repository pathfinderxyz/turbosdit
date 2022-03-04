<?php
     include '../../coneccion/coneccion.php';
     // include '../../Errores/mostrar_errores.php';

      $modelo_turbo= $_POST['modelo_turbo'];
      $marca= $_POST['marca'];
     

     // Recibo los datos de la imagen (ruta y nombre)
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
      $ruta = $_FILES['imagen']['tmp_name'];
      $nombre_img = $_FILES['imagen']['name'];
      $ruta_real= 'assets/img/';
      $url_imagen = $ruta_real.$nombre_img;

      
      $sql = pg_query("INSERT INTO turbos (modelo,marca,url_imagen) VALUES ('$modelo_turbo','$marca','$url_imagen')");

       move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

      if ($sql) {
       header('Location: ../../dashboard.php?page=recepcion&creacion=si');//Se guardo
       }else {
       echo  'La imagen tiene un error o formato no compatible !';
       }
      
?>
