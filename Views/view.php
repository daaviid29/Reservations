<?php

class View{
    
    private $directorio = "";

    public static function adminViews($viewName, $data = null) {
        $directorioThemplates = "admin/Themplates/";
        $directorio = "admin/";
        
        include($directorioThemplates . "sidebar.php");
        include($directorioThemplates . "navbar.php");
        include($directorioThemplates . "footer.php");
        include($directorio . "$viewName.php");
    }
    /*public function get($id = null){
        if(is_null($id)){

        }else{

        }
    }*/   
}
?>