<?php
    class MvcController
    {
        public function plantilla()
        {
        include "views/templates.php";
        }

        public function enlacesPaginasController()
        {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="login.php";
        }
        $respuesta= EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
        }
    }
    
?>