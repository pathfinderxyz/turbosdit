<?php
include '../../coneccion/coneccion.php';

$html = '';
$key = $_POST['key'];

$result = pg_query($cnx,"SELECT * from turbos WHERE UPPER(modelo) LIKE UPPER('%" .$key. "%')");

if (pg_num_rows($result) > 0) {
    while ($info = pg_fetch_assoc($result)) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($info['modelo']).'" id="modelo'.$info['modelo'].'">'.utf8_encode($info['modelo']).' 
         <img class="card-img-top img-responsive" src="'.$info['url_imagen'].'" alt="Card image cap">
        </a></div>';
    }
}
echo $html;
?>