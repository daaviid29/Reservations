<?php
    
    // Cargamos el Modelo de Resources donde tenemos todos los métodos
    require_once 'Models/ResourcesModel.php';
    // Cargamos el fichero view donde construiremos las vistas (añadiremos todos los includes para formar la vista de forma anónima para el usuario)
    require_once "Views/view.php"; 
    // Cargamos el modelo de seguridad por donde pasaremos todos los métodos que necesiten una insercción de datos y consultaremos los datos de las sesiones
    require_once "Models/SecurityModel.php";

    class ResourcesController{
    
        // Mostraremos todos los recursos para el Administrador/Administradores del sistema
        public function mostrarResources(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Creamos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Almacenamos el resultado del método getResources en una variable data, en el índice resources, puesto que data es un array
                $data['resources'] = $resources->getResources('resources');

                // Construimos la vista donde cargaremos el contenido por ello le pasamos la variable data que es la que se construyó en la línea anterior
                View::adminViews('admin-resources', $data);
           
            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a index.php puesto que en ese fichero está cargada 
            //la vista por defecto es el login
            }else if(!SecurityModel::haySesion()){
                header("Location: index.php");
            }
        }

        // Método para crear Recursos SOLO PARA ADMINISTRADORES.
        public function crearResource(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();
                
                // Recogemos los datos del formulario y utilizamos los setters para guardarlos en el modelo y luego poder utilizarlos para la insercción
                $resources->setName(SecurityModel::limpiar($_REQUEST['name-resources']));
                $resources->setLocation(SecurityModel::limpiar($_REQUEST['location-resources']));
                $resources->setDescription(SecurityModel::limpiar($_REQUEST['description-resources']));
                $resources->setImage(SecurityModel::limpiar($_FILES['file-resources']['name']));

                // Almacenamos el resultado del método crearResources en una variable, data en el índice insertResource, puesto que data es un array
                $data['insertResource'] = $resources->crearResources();

                // Redirigimos al usuario al método mostrarResources donde mostrará todos los usuarios creados incluyendo el nuevo que acabamos de crear.
                header("Location: ?controller=ResourcesController&action=mostrarResources");
            
            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para Borrar Recursos SOLO PARA ADMINISTRADORES.
        public function borrarResource(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Almacenamos el resultado del método borrarResource (el cual recibe un parámetro que es el ID del recurso que queremos borrar)
                /*$data['deleteResource'] = */ $resources->borrarResource($_GET['id']);

                // Redirigimos al usuario al método mostrarResources donde mostrará todos los usuarios actuales, excepto el que acabamos de borrar puesto que ya no
                // se encuentra en nuestra base de datos
                header("Location: ?controller=ResourcesController&action=mostrarResources");

            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para mostrar el contenido de un Recurso SOLO PARA ADMINISTRADORES.
        public function mostrarResource(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Almacenamos en la variable data, en el índice getResource todos los datos del recurso que queremos mostrar su contenido por pantalla
                // Este método se utiliza principalmente como intermediario entre todos los recursos y la actualización de uno de ellos, es decir, cuando le demos
                // a modificar en uno de los recursos nos traerá a este método donde previsualizaremos sus contenido, y en caso de querer actualizarlos podemos
                // escribirlos de nuevo en los campos y luego darle al botón de actualizar y llamaría al método que tenemos más abajo para actualizarlos.
                // A su vez, el método mostrarResource() recibe un parámetro que es el ID del recurso que queremos previsualizar
                $data['getResource'] = $resources->mostrarResource($_GET['id']);

                // Construimos la vista con todos los includes donde mostraremos los datos del recurso seleccionado y le pasamos la variable data que son los datos
                // almacenamos que recogimos anteriormente
                View::adminViews('editar-resource', $data);

            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para actualizar el contenido de un Recurso SOLO PARA ADMINISTRADORES.
        public function actualizarResource(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Recogemos los datos de los campos previamente rellenados en un formulario y utilizamos los setters para guardarlos, antes de guardarlos en los
                // setters utilizamos un método de la capa de seguridad donde comprobamos que no lleve código malicioso o sentencias de SQL que puedan corromper
                // nuestra base de datos.
                $resources->setName(SecurityModel::limpiar($_REQUEST['name-resources']));
                $resources->setLocation(SecurityModel::limpiar($_REQUEST['location-resources']));
                $resources->setDescription(SecurityModel::limpiar($_REQUEST['description-resources']));
                $resources->setImage(SecurityModel::limpiar($_FILES['file-resources']['name']));

                // Almacenamos en la variable data más concretamente en el índice updateResource el resultado del método actualizarResource donde recibe un ID para
                // poder saber cual es el recurso que debe de actualizar y con que datos, que serían los que se han insertado anteriormente en el formulario y
                // que hemos recogido en este mismo método y guardado con los setters
                $data['updateResource'] = $resources->actualizarResource($_GET['id']);

                // Redirigimos al usuario al método mostrarResources donde mostrará todos los recursos actuales, con el contenido del recurso que acabamos de modificar
                // ya cambiado, puesto que se ha cambiado en la base de datos y este método carga lo que hay en ese momento en la base de datos
                header("Location: ?controller=ResourcesController&action=mostrarResources");

            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para mostrar todos los Recursos ESTE MÉTODO PUEDE SER CONSULTADO POR UN ADMINISTRADOR O UN USUARIO SIN PERMISOS DE ADMINISTRACIÓN YA QUE PERMITE LA
        // RESERVA DE LOS RECURSOS.
        public function resourcesUser(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 o 1 que sería 0 = Administrador o 1 = Usuario sin permisos
            // de administrador
            if(SecurityModel::haySesion() && (SecurityModel::getRol() == 0 || SecurityModel::getRol() == 1)){
                // Cargamos el modelo TimeSlotsModel ya que necesitamos mostrar los timelosts para que el usuario pueda elegir que día y en que tramo horario
                // quiere reservar el recurso seleccionado.
                require_once 'Models/TimeSlotsModel.php';

                // Crearemos los objetos sobre los que trabajaremos (resources y timeslots)
                $resources = new ResourcesModel();
                $timeslots = new TimeSlotsModel();

                // Almacenamos en la variable data más concretamente en el índice resources el resultado del método getResources que serían todos los recursos
                // el método getResources() recibe un parámetro que es la tabla de la base de datos que consultará
                $data['resources'] = $resources->getResources('resources');

                // Almacenamos en la variable data más concretamente en el índice timeslots el resultado del método getTimeslots que serían todos los recursos
                // el método getTimeslots() recibe un parámetro que es la tabla de la base de datos que consultará
                $data['timeslots'] = $timeslots->getTimeslots('timeslots');

                // Construimos la vista con todos los includes donde mostraremos los datos del recurso seleccionado y le pasamos la variable data que son los datos
                // almacenamos que recogimos anteriormente
                View::userViews('user-resources', $data);
            }else{
                header("Location: index.php");
            }
        }

        // Método para reservar un recurso ESTE MÉTODO PUEDE SER CONSULTADO POR UN ADMINISTRADOR O UN USUARIO SIN PERMISOS DE ADMINISTRACIÓN YA QUE PERMITE LA
        // RESERVA DE LOS RECURSOS.
        public function reservarRecurso(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 o 1 que sería 0 = Administrador o 1 = Usuario sin permisos
            // de administrador
            if(SecurityModel::haySesion() && (SecurityModel::getRol() == 0 || SecurityModel::getRol() == 1)){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Recogemos los datos, en este caso se recogen de forma diferente a los del resto del programa.

                // Recogemos el ID del recurso que queremos reservar
                $idResource =  $_REQUEST['id'];
                
                // Recogemos el ID del usuario que está haciendo la reserva 
                $idUser = SecurityModel::getIdUsuario();
                
                // Recogemos el ID del timeslot ya que con esto podemos acceder posteriormente a su información
                $idTimeSlot = $_REQUEST['timeslot-resource']; 

                // Recogeremos las notas/observaciones que el usuario puede poner a la hora de reservar el recurso
                $remarks = SecurityModel::limpiar($_REQUEST['description-resource']);

                // Almacenamos en la variable data más concretamente en el índice reservations el resultado del método setReservation este recibe como parámetro los
                // valores que anteriormente hemos recogido y almacenado en variables locales, para hacer la insercción en la base de datos
                $data['reservations'] = $resources->setReservation($idResource, $idUser, $idTimeSlot, $remarks);

                // Redirigimos al usuario al método resourcesUser donde mostrará todos los recursos que se pueden reservar
                header("Location: ?controller=ResourcesController&action=resourcesUser");
            }
        }

        // Método para ver todas las reservas que se han realizado SOLO PARA ADMINISTRADORES.
        public function reservas(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $resources = new ResourcesModel();

                // Almacenamos en la variable data más concretamente en el índice allReservations el resultado del método getAllReservations, este método realiza
                // una consula con INNER JOIN donde junta todas las tablas y devuelve (Usuario, Día de la semana, Fecha, Tramo horario y Nombre del recurso)
                // para que un administrador pueda saber que usuario reservó cada recurso, en que fecha, timeslot y que recurso fue el de la reserva.
                $data['allReservations'] = $resources->getAllReservations();

                // Construimos la vista con todos los includes donde mostraremos (Usuario, Día de la semana, Fecha, Tramo horario y Nombre del recurso) de cada una de
                // las reservas que se han realizado mostrando los datos anteriormente indicados.
                View::adminViews('admin-reservas', $data);

            // En el caso de que el usuario no haya iniciado sesión o que no sea un adminsitrador no podrá acceder a este método, para ello, he realizado una vista
            // llamada 403 (forbiden) de manera personalizada, para saber que no tenemos permisos para acceder a dicho método
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
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