<?php

    require_once "Views/view.php";

    class CalendarController{

        public function mostrarCalendario(){
            // Requerimos la vista donde mostraremos el contenido
            View::adminViews('admin-calendar');
        }
    }

?>