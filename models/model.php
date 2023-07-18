<?php
class EnlacesPaginas{
    static function enlacesPaginasModel($enlacesModel){
        if ($enlacesModel=="nosotros" || $enlacesModel=="contactanos"|| $enlacesModel=="logueadoe"){
            $module="views/interfaces/" . $enlacesModel . ".php";
        }
        else if($enlacesModel=="servicios" && !isset($_SESSION['usuario'])){
            $module="views/interfaces/login.php";
        }
        else if($enlacesModel=="logout"){
            $module="views/interfaces/logout.php";
        }
        else if($enlacesModel=="servicios"){
            $module="views/interfaces/servicios.php";
        }
        else{
            $module="views/interfaces/inicio.php";
        }
        return $module;
    }  
}
?>