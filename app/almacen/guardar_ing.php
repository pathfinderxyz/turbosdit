<?php
     include '../../coneccion/coneccion.php';
   include '../../Errores/mostrar_errores.php';

     $codigo = $_POST['codigo'];
     

     // Recibo los datos de la imagen (ruta y nombre)
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
      $ruta = $_FILES['imagen']['tmp_name'];
      $nombre_img = $_FILES['imagen']['name'];
      $ruta_real= 'assets/img/';
      $url_imagen = $ruta_real.$nombre_img;

      

     
      $sql = pg_query($cnx,"UPDATE inventario SET url_imagen='$url_imagen' where codigo ='$codigo'");

       move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

      if ($sql) {
       header('Location: ../../dashboard.php?page=stock&fam=Todos');//Se guardo
       }else {
       echo  'La imagen tiene un error o formato no compatible !';
       }
      
?>
