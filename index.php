<?php

    require_once 'autoload.php';

    if(isset($_GET['controller'])){
        $nombre_controlador = $_GET['controller'];
    }else{
        require_once 'Views/login/login.php';
        exit();
    }
    
    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador();

        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];

            $controlador->$action();
    
        }else{
            echo "La página que buscas no existe 2";
        }

    }else{
        echo "La página que buscas no existe 3";
    }

?>