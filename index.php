<?php
    
    session_start();
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
            require_once 'Views/404/404.php';
        }

    }else{
        require_once 'Views/404/404.php';
    }

?>