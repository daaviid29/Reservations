<?php

class View{
    
    private $directorio = "";

    public static function adminViews($viewName, $data = null, $paginacion = null) {
        $directorioThemplates = "admin/Themplates/";
        $directorio = "admin/";
        
        include($directorioThemplates . "sidebar.php");
        include($directorioThemplates . "navbar.php");
        include($directorioThemplates . "footer.php");
        include($directorio . "$viewName.php");
    }

    public static function userViews($viewName, $data = null) {
        $directorioThemplates = "users/Themplates/";
        $directorio = "users/";
        
        include($directorioThemplates . "sidebar.php");
        include($directorioThemplates . "navbar.php");
        include($directorioThemplates . "footer.php");
        include($directorio . "$viewName.php");
    }

    public static function error403(){
        $directorio = "Views/403/";
        include($directorio . "403.php");
    }
    
}
?>