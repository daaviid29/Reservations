<?php

    require_once "Views/view.php";

    class TimeSlotsController{
        
        public function mostrarTimeSlots(){
            // Cargamos el modelo
            require_once 'Models/TimeSlotsModel.php';

             // Crearemos el objeto sobre el que trabajaremos
            $timeslots = new TimeSlotsModel();

            // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
            $data['timeslots'] = $timeslots->getTimeslots('timeslots');

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-resources.php';
            View::adminViews('admin-timeslots', $data);
        }

        public function crearTimeSlot(){
            // Cargamos el modelo
            require_once 'Models/TimeSlotsModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $timeslot = new TimeSlotsModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $timeslot->setDayofweek($_REQUEST['dayofweek-timeslots']);
            $timeslot->setStarttime($_REQUEST['starttime-timeslots']);
            $timeslot->setEndtime($_REQUEST['endtime-timeslots']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['insertTimeslot'] = $timeslot->crearTimeSlot();

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=TimeSlotsController&action=mostrarTimeSlots");
        }

        public function borrarTimeSlot(){
            // Cargamos el modelo
            require_once 'Models/TimeSlotsModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $timeslot = new TimeSlotsModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['deleteTimeslot'] = $timeslot->borrarTimeSlot($_GET['id']);

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=TimeSlotsController&action=mostrarTimeSlots");

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-resources.php';
            View::adminViews('admin-timeslots', $data);
        }

        /*public function mostrarTimeSlot(){
            // Cargamos el modelo
            require_once 'Models/TimeSlotsModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new TimeSlotsModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['getResource'] = $resources->mostrarResource($_GET['id']);

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/editar-resource.php';
            View::adminViews('editar-resource', $data);
        }

        public function actualizarResource(){
            // Cargamos el modelo
            require_once 'Models/TimeSlotsModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new TimeSlotsModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $resources->setName($_REQUEST['name-resources']);
            $resources->setLocation($_REQUEST['location-resources']);
            $resources->setDescription($_REQUEST['description-resources']);
            $resources->setImage($_FILES['file-resources']['name']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['updateResource'] = $resources->actualizarResource($_GET['id']);

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=ResourcesController&action=mostrarResources");

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-resources.php';
            View::adminViews('editar-resource', $data);
        }

        /*public function buscarActor(){
            // Cargamos el modelo
            require_once 'Models/ActoresModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $actor = new ActoresModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $actor = $actor->buscarActor($_REQUEST['busqueda']);

            // Requerimos la vista donde mostraremos el contenido
            require_once 'Views/listar-actores.php';
        
        }*/

    }

?>