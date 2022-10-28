<?php

    define('DB_HOST', "localhost");        // Definimos como una constante el nombre del servidor de bases de datos 
    define('DB_USER', "root");             // Definimos como una constante el nombre Usuario para esa base de datos
    define('DB_PASS', "");                 // Definimos como una constante para la Contraseña de ese usuario
    define('DB_NAME', "reservations");     // Definimos como una constante el nombre de la base de datos

    Class Config{
        
        // Creamos el método Conexion EL MÉTODO MÁS IMPORTANTE puesto que es el encargado de hacer las interacciones con la base de datos
        // (consultas, actualizaciones, borrado de datos, etc..)
        public static function conexion(){
            // Almacenamos en la variable config un objeto de tipo mysqli el cual recibe 4 parámetros que son las 4 constantes que hemos definido en la
            // parte superior de este archivo fuera de la clase Config.
            $config = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // Realizamos una query (Consulta) para especificar el tipo de cotejamiento que vamos a utilizar en nuestra base de datos, en este caso
            // vamos a utilizar el cotejamiento UTF8.
            $config->query("SET NAMES 'utf8'");

            // Por último, devolvemos el objeto de tipo mysqli para que pueda ser utilizado por el resto de métodos.
            return $config;

        }
    }

?>