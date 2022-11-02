<?php

    // Cargamos el fichero view donde construiremos las vistas (añadiremos todos los includes para formar la vista de forma anónima para el usuario)
    require_once "Views/view.php";

    class CalendarController{

        // Método para mostrar el Calendario
        public function mostrarCalendario(){
            // Requerimos el modelo de recursos para tener acceso al listado de las reservas
            require_once 'Models/ResourcesModel.php';
             // Requerimos el modelo de timeslots para tener acceso a los timeslots en la vista y mostrarlos en función de la selección
             require_once 'Models/TimeSlotsModel.php';
            
            $resources = new ResourcesModel();
            $timeslots = new TimeSlotsModel();
            
            $data['allReservations'] = $resources->getAllReservations();
            $data['timeslots'] = $timeslots->get('timeslots');

            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Requerimos la vista donde mostraremos el contenido
                View::adminViews('admin-calendar', $data);
            }else if(SecurityModel::getRol() == 1){
                View::userViews('user-calendar', $data);
            }else{
                View::error403();
            }
        }
    }

?>