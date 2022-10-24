<?php

    require_once "Views/view.php";

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
            // Cargamos el modelo
            require_once 'Models/ResourcesModel.php';

             // Crearemos el objeto sobre el que trabajaremos
            $resources = new ResourcesModel();

            // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
            $data['resources'] = $resources->getResources('resources');

            // Cargamos la vista donde mostraremos el contenido
            View::userViews('user-resources', $data);
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