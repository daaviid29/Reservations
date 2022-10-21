<?php

    define('DB_HOST', "localhost");        // Nombre del servidor de bases de datos 
    define('DB_USER', "root");         // Usuario para ese servidor
    define('DB_PASS', "");      // Contraseña para ese servidor
    define('DB_NAME', "reservations");   // Nombre de la base de datos

    Class Config{
        public static function conexion(){
            $config = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            $config->query("SET NAMES 'utf8'");

            return $config;

        }
    }

?>