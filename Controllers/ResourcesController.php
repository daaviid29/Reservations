<?php

    require_once "Views/view.php";
    require_once "Models/SecurityModel.php";

    class ResourcesController{
        
        public function mostrarResources(){
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

             // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

            // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
            $data['resources'] = $resources->getResources('resources');

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-resources.php';
            View::adminViews('admin-resources', $data);
        }

        public function crearResource(){
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $resources->setName($_REQUEST['name-resources']);
            $resources->setLocation($_REQUEST['location-resources']);
            $resources->setDescription($_REQUEST['description-resources']);
            $resources->setImage($_FILES['file-resources']['name']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['insertResource'] = $resources->crearResources();

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=ResourcesController&action=mostrarResources");
        }

        public function borrarResource(){
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['deleteResource'] = $resources->borrarResource($_GET['id']);

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=ResourcesController&action=mostrarResources");

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-resources.php';
            View::adminViews('admin-resources', $data);
        }

        public function mostrarResource(){
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['getResource'] = $resources->mostrarResource($_GET['id']);

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/editar-resource.php';
            View::adminViews('editar-resource', $data);
        }

        public function actualizarResource(){
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

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

        public function resourcesUser(){
            if(SecurityModel::haySesion()){
                // Cargamos el modelo
                require_once 'Models/ResourcesModel.php';
                require_once 'Models/TimeSlotsModel.php';

                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();
                $timeslots = new TimeSlotsModel();

                // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
                $data['resources'] = $resources->getResources('resources');
                $data['timeslots'] = $timeslots->getTimeslots('timeslots');

                // Cargamos la vista donde mostraremos el contenido
                View::userViews('user-resources', $data);
            }
        }

        public function reservarRecurso(){
            if(SecurityModel::haySesion()){
                // Cargamos el modelo
                require_once 'Models/ResourcesModel.php';

                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Recogemos los datos y utilizamos los setters para guardarlos
                $idResource =  $_REQUEST['id'];
                $idUser = SecurityModel::getIdUsuario();
                $idTimeSlot = $_REQUEST['timeslot-resource']; 
                $remarks = $_REQUEST['description-resource'];

                // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
                $data['reservations'] = $resources->setReservation($idResource, $idUser, $idTimeSlot, $remarks);

                // Cargamos la vista donde mostraremos el contenido
                header("Location: ?controller=ResourcesController&action=resourcesUser");
            }
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