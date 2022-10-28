<?php

    // Cargamos el fichero view donde construiremos las vistas (añadiremos todos los includes para formar la vista de forma anónima para el usuario)
    require_once "Views/view.php";

    class CalendarController{

        // Método para mostrar el Calendario
        public function mostrarCalendario(){
            // Requerimos la vista donde mostraremos el contenido
            View::adminViews('admin-calendar');
        }
    }

?>