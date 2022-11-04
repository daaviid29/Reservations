<?php
    
    // Inicializaremos la sesión para que podamos utilizar variables de sesión globales en el resto de la aplicación y para la autentificación de los usuarios
    session_start();

    // Requeriremos el archivo autoload, el cual cargará todos los controladores de manera automática sin tener que requerir uno a uno en el index.
    require_once 'autoload.php';

    // 
    require_once 'Config/Parameters.php';

    // Comprobamos si el controlador que recibimos por la URL del navegador existe
    if(isset($_GET['controller'])){

        // En caso de que exista guardamos el nombre del controlador en una variable para utilizarlo posteriormente.
        $nombre_controlador = $_GET['controller'];
    
    // En caso de que no exista el controlador que se le pasa por la URL (o no se le pasa nada por la URL), vamos a requerir una vista por defecto en este caso el 
    // login
    }else{

        // Requerimos la vista del login
        require_once 'Views/login/login.php';

        // Utilizamos la función exit() para evitar que el código de abajo se siga ejecutando ya que si no existe el controlador no podrá ejecutarse y estaríamos
        // gastando tiempo de ejecución.
        exit();
    }
    
    // Comprobamos si la clase del controlador que almacenamos anteriormente es una clase de un controlador.
    if(class_exists($nombre_controlador)){

        // Si esa clase existe guardaremos en una variable controlador un objeto inicializado con el nombre de la clase del controlador que hemos solicitado
        // por la URL
        $controlador = new $nombre_controlador();

        // Comprobaremos si existe una variable action en la URL, si existe también vamos a comprobar si ese parámetro al que hemos igualado la variable
        // action es un método del controlador que le hemos pasado por la URL también.
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

            // Si es un método del controlador solicitado, guardaremos en una variable llamada action el método solicitado.
            $action = $_GET['action'];

            // por último, accederemos al objeto del controlador solicitado por la URL y seguidamente accederemos al método que le hemos pasado por la URL
            // en la variable action
            $controlador->$action();
    
        // Si no existe variable action, o el método de la variable action no se encuentra en ese controlador, mostraremos una vista de error, en este caso
        // una vista personalizada de error 404
        }else{

            // Requerimos la vista a mostrar (vista de error 404)
            require_once 'Views/404/404.php';
        }

    // Si no existe el nombre del controlador, mostraremos una vista de error, en este caso  una vista personalizada de error 404
    }else{

        // Requerimos la vista a mostrar (vista de error 404)
        require_once 'Views/404/404.php';
    }

?>