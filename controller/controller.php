<?php
class McvController{
    function plantilla(){
        include 'views\template.php';
    }

    function enlacesPaginasController(){
        session_start();
        if (isset($_GET['action'])) {
            $enlacesControlador=$_GET['action'];
            if ($enlacesControlador == 'servicios' && !isset($_SESSION['usuario'])) {
                $enlacesControlador = 'servicios';
            }
        }else {
            $enlacesControlador='index.php';
        }
        $respuesta=EnlacesPaginas::enlacesPaginasModel($enlacesControlador);
        include $respuesta;   
    }
}
?>