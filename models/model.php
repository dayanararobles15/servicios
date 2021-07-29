<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if($enlacesModel== "servicios" ||  
        $enlacesModel== "contacto" ||
        $enlacesModel== "nosotros" ||
        $enlacesModel== "servicios")
        {
            $module="views/modules/".$enlacesModel.".php";
        }
        else if($enlacesModel=="index")
        {
            $module="views/modules/login.php";
        }
        else
        {
            $module="views/modules/login.php";
        }
        return $module;

    }
}
?>