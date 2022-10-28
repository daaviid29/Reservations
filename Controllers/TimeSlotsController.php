<?php

    // Cargamos el Modelo de Resources donde tenemos todos los métodos
    require_once 'Models/TimeSlotsModel.php';
    // Cargamos el fichero view donde construiremos las vistas (añadiremos todos los includes para formar la vista de forma anónima para el usuario)
    require_once "Views/view.php";
    // Cargamos el modelo de seguridad por donde pasaremos todos los métodos que necesiten una insercción de datos y consultaremos los datos de las sesiones
    require_once "Models/SecurityModel.php";

    class TimeSlotsController{
        
        // Método para mostrar todos los timeslots SOLO PARA ADMINISTRADORES.
        public function mostrarTimeSlots(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $timeslots = new TimeSlotsModel();

                // Almacenamos el resultado del método getTimeslots en una variable data, en el índice timeslots, puesto que data es un array
                $data['timeslots'] = $timeslots->getTimeslots('timeslots');

                // Construimos la vista donde cargaremos el contenido por ello le pasamos la variable data que es la que se construyó en la línea anterior
                View::adminViews('admin-timeslots', $data);

            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a index.php puesto que en ese fichero está cargada 
            //la vista por defecto es el login
            }else if(!SecurityModel::haySesion()){
                header("Location: index.php");
            }
        }

        // Método para crear timeslots SOLO PARA ADMINISTRADORES.
        public function crearTimeSlot(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $timeslot = new TimeSlotsModel();

                // Recogemos los datos del formulario y utilizamos los setters para guardarlos en el modelo y luego poder utilizarlos para la insercción
                $timeslot->setDayofweek($_REQUEST['dayofweek-timeslots']);
                $timeslot->setStarttime($_REQUEST['starttime-timeslots']);
                $timeslot->setEndtime($_REQUEST['endtime-timeslots']);

                // Accedemos al objeto timeslot que creamos anteriormente, más concretamente al método crearTimeSlot(), el cual no tiene parámetros puesto que
                // utilizamos los setters para asignar parámetros anteriormente.
                $timeslot->crearTimeSlot();

                // Redirigimos al usuario al método mostrarTimeSlots donde mostrará todos los timelosts creados incluyendo el nuevo que acabamos de crear.
                header("Location: ?controller=TimeSlotsController&action=mostrarTimeSlots");

            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para Borrar Recursos SOLO PARA ADMINISTRADORES.
        public function borrarTimeSlot(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $timeslot = new TimeSlotsModel();

                // Accedemos al objeto timeslot que creamos anteriormente, más concretamente al método borrarTimeSlot() 
                // (el cual recibe un parámetro que es el ID del recurso que queremos borrar)
                $timeslot->borrarTimeSlot($_GET['id']);

                // Redirigimos al usuario al método mostrarTimeSlots donde mostrará todos los timeslots actuales, excepto el que acabamos de borrar puesto que ya no
                // se encuentra en nuestra base de datos
                header("Location: ?controller=TimeSlotsController&action=mostrarTimeSlots");
            
            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
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