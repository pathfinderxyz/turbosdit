<html>
<head>
<title>Autenticación PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<h1>Formulario de autenticación</h1>

 <?php

     if ($_GET["errorusuario"]=="si"){
 ?>
     <font color="red"><b>Datos incorrectos</b></font>
     <?php
     }else{
     ?>
         Introduce tu nombre de usuario y contraseña
         <?php
         }

         ?>
         
         <form action="autenticacion.php" method="POST">
         <table border="0">
             <tr>
                  <td>Nombre de usuario:</td><td><input name="usuario" size="25" value=""/></td></tr>
             <tr>
                 <td>Contraseña:</td><td><input name="password" size="25" type="password"/></td></tr>
             <tr>
                  <td/><td><input type="submit" value="Inicio de sesión"/></td></tr>
         </table>
         </form>
         Para ingresar, debés ingresar <b>usuario</b> en el 1er campo y <b>123</b> en el 2do.

         <!-- esta es la mama de los helados esta simple consulta destruye el cache y todos los que esten logeados
          al llegar a login nadie se salva , eso evita que avanzen a otra pagina sin logearse-->
         <?php
             session_start();
             if ($_SESSION["autenticado"] == "SI") {
             session_destroy();
             exit();
             }
         ?>
         
</body>

</html>
