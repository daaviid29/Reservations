<?php
    // Cargamos el Modelo de Resources donde tenemos todos los métodos
    require_once 'Models/UsersModel.php';
    // Cargamos el fichero view donde construiremos las vistas (añadiremos todos los includes para formar la vista de forma anónima para el usuario)
    require_once "Views/view.php";
    // Cargamos el modelo de seguridad por donde pasaremos todos los métodos que necesiten una insercción de datos y consultaremos los datos de las sesiones
    require_once 'Models/SecurityModel.php';

    class UsersController{

        // Método para mostraremos todos los usuarios para el Administrador/Administradores del sistema
        public function mostrarUsuarios(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador YA QUE SOLO ÉL PUEDE REALIZAR
            // ESTA ACCIÓN
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $users = new UsersModel();

                // Almacenamos el resultado del método getUsers en una variable data, en el índice users, puesto que data es un array
                $data['users'] = $users->getUsers('users');

                // Construimos la vista donde cargaremos el contenido por ello le pasamos la variable data que es la que se construyó en la línea anterior
                View::adminViews('admin-users', $data);

            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a una vista de error 403 personalizada puesto que el
            // listado de los usuario que hay en el sistema solo pueden ser vistos por el Administrador del sistema
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para Crear Usuarios, SOLO LOS ADMINISTRADORES DEL SISTEMA PUEDEN CREAR USUARIOS.
        public function crearUsuario(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador YA QUE SOLO ÉL PUEDE REALIZAR
            // ESTA ACCIÓN
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $users = new UsersModel();

            // Recogemos los datos del formulario y utilizamos los setters para guardarlos en el modelo y luego poder utilizarlos para la insercción, antes de
            // guardarlos en los setters utilizamos el método limpiar de la clase SecurityModel para limpiar de código malicioso o SQL en la creación del usuario
                $users->setRealname(SecurityModel::limpiar($_REQUEST['realname-user']));
                $users->setEmail(SecurityModel::limpiar($_REQUEST['email-user']));
                $users->setLastname(SecurityModel::limpiar($_REQUEST['lastname-user']));
                $users->setUsername(SecurityModel::limpiar($_REQUEST['username-user']));
                $users->setPassword($_REQUEST['password-user']);
                $users->setImage(SecurityModel::limpiar($_FILES['file-user']['name']));
                $users->setRol(SecurityModel::limpiar($_REQUEST['role-user']));

                // Accedemos al Objeto que hemos creado anteriormente, más concretamente al método crearUser() y como ya tenemos en nuestros setters los datos
                // recogidos no necesitamos pasarle ningún parámetro al método, es por ello por lo que no lleva parámetros.
                $users->crearUser();

                // Por último, redirigimos al usuario para mostrar el listado de usuarios
                header("Location: ?controller=UsersController&action=mostrarUsuarios");
            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a una vista de error 403 personalizada puesto que el
            // listado de los usuario que hay en el sistema solo pueden ser vistos por el Administrador del sistema
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para borrar Usuarios, SOLO LOS ADMINISTRADORES DEL SISTEMA PUEDEN BORRAR USUARIOS.
        public function borrarUser(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador YA QUE SOLO ÉL PUEDE REALIZAR
            // ESTA ACCIÓN
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $users = new UsersModel();

                // Accedemos al Objeto que hemos creado anteriormente, más concretamente al método borrarUser(), este método tiene que recibir un parámetro que
                // es el ID del usuario que quieras borrar puesto que solo queremos borrar uno, no todos los de la base de datos
                $users->borrarUser($_GET['id']);

                // Por último, redirigimos al usuario para mostrar el listado de usuarios
                header("Location: ?controller=UsersController&action=mostrarUsuarios");


            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a una vista de error 403 personalizada puesto que el
            // listado de los usuario que hay en el sistema solo pueden ser vistos por el Administrador del sistema
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para mostrar un Usuario, SOLO LOS ADMINISTRADORES DEL SISTEMA PUEDEN ACCEDER PARA VER MÁS DATOS DEL USUARIO.
        public function mostrarUser(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador YA QUE SOLO ÉL PUEDE REALIZAR
            // ESTA ACCIÓN
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $users = new UsersModel();

                // Almacenamos el resultado del método mostrarUser en una variable data, en el índice getUser, puesto que data es un array, en este data
                // almacenaremos todos los datos que recogemos de la base de datos del usuario cuyo ID sea el que le pasamos como parámetro.

                //Este método se utiliza principalmente como intermediario entre todos los usuarios y la actualización de uno de ellos, es decir, cuando le demos
                // a modificar en uno de los usuarios nos traerá a este método donde previsualizaremos su contenido, y en caso de querer actualizarlos podemos
                // escribirlos de nuevo en los campos y luego darle al botón de actualizar y llamaría al método que tenemos más abajo para actualizarlos.
                // A su vez, el método mostrarUser() recibe un parámetro que es el ID del recurso que queremos previsualizar
                $data['getUser'] = $users->mostrarUser($_GET['id']);

                // Construimos la vista donde cargaremos el contenido por ello le pasamos la variable data que es la que se construyó en la línea anterior
                View::adminViews('editar-user', $data);
            
            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a una vista de error 403 personalizada puesto que el
            // listado de los usuario que hay en el sistema solo pueden ser vistos por el Administrador del sistema
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para modificar los datos de un Usuario, SOLO LOS ADMINISTRADORES DEL SISTEMA PUEDEN ACCEDER PARA VER MÁS MODIFICAR LOS DATOS DEL USUARIO.
        public function actualizarUser(){
            // Comprobamos si existe una sesión y si además el usuario que inicia la sesión tiene el rol 0 que sería Administrador YA QUE SOLO ÉL PUEDE REALIZAR
            // ESTA ACCIÓN
            if(SecurityModel::haySesion() && SecurityModel::getRol() == 0){
                // Crearemos el objeto sobre el que trabajaremos
                $users = new UsersModel();

                // Recogemos los datos de los campos previamente rellenados en un formulario y utilizamos los setters para guardarlos, antes de guardarlos en los
                // setters utilizamos un método de la capa de seguridad donde comprobamos que no lleve código malicioso o sentencias de SQL que puedan corromper
                // nuestra base de datos.
                $users->setRealname(SecurityModel::limpiar($_REQUEST['realname-user']));
                $users->setEmail(SecurityModel::limpiar($_REQUEST['email-user']));
                $users->setLastname(SecurityModel::limpiar($_REQUEST['lastname-user']));
                $users->setUsername(SecurityModel::limpiar($_REQUEST['username-user']));
                //$users->setPassword($_REQUEST['password-user']);
                $users->setImage(SecurityModel::limpiar($_FILES['file-user']['name']));
                $users->setRol(SecurityModel::limpiar($_REQUEST['role-user']));

                // Accedemos al objeto users más concretamente a su método actualizarUser() y le pasamos el ID puesto que todos los datos ya los tenemos almacenados
                // en el objeto con los setters que previamente obtuvimos sus datos desde el formulario.
                $users->actualizarUser($_GET['id']);

                // Por último, redirigimos al usuario para mostrar el listado de usuarios
                header("Location: ?controller=UsersController&action=mostrarUsuarios");

            // Comprobamos si no existe una sesión, en caso de que no exista vamos a redirigir el usuario a una vista de error 403 personalizada puesto que el
            // listado de los usuario que hay en el sistema solo pueden ser vistos por el Administrador del sistema
            }else{
                // Construimos la vista donde mostraremos el error 403 (forbiden).
                View::error403();
            }
        }

        // Método para Iniciar Sesión, este es el método MÁS IMPORTANTE DE NUESTRA APLICACIÓN SIN CONTAR LOS DE SEGURIDAD Y ACCESO A LA BASE DE DATOS ya que por
        // este método pasa todo el flujo de nuestra aplicación, es decir, no podemos acceder a los métodos / controladores sin previamente haber hecho un login
        // puesto que es donde vemos si el usuario existe o no y que tipo de permisos tiene, en función de esto mostraremos unas vistas u otras con unos datos
        // diferentes entre ellas
        public function iniciarSesion(){
            // Crearemos el objeto sobre el que trabajaremos
            $user = new UsersModel();

            // Recogemos los datos del formulario de login y utilizamos los setters para guardarlos, previamente pasamos el método limpiar de la capa de seguridad
            // en el nombre de usuario u email, en cambio en la contraseña no se lo pasamos ¿Por qué? por que es posible que alguien en su contraseña tenga ciertos
            // simbolos que quitamos en el método limpiar, pero si quitamos los caracteres al no coincidir en la base de datos no hará el login, es por ello que no
            // se le pasa el método limpiar.
            $user->setUsername(SecurityModel::limpiar($_REQUEST['username-email']));
            $user->setPassword($_REQUEST['password-login']);

            // Almacenamos en la variable data, más concretamente en el índice iniciarSesion los datos que recibimos del método iniciar sesión, que previamente
            // se han extraido de la base de datos.
            $data['iniciarSesion'] = $user->iniciarSesion();

            // Comprobamos si el array data en la posición iniciarSesion tiene algún valor puesto que si tiene 0 es que no se ha hecho login y si tiene 1 es por que
            // tenemos el ID del usuario y el ROL del mismo ya almacenado y por ello ya se ha creado la sesión
            if(count($data['iniciarSesion']) != 0){

                // Accedemos al modelo SecurityModel más concretamente al método iniciarSesion() en el cual le vamos a pasar el ID para que cree una sesión global con
                // el ID del usuario que ha iniciado sesión
                SecurityModel::iniciarSesion($data['iniciarSesion'][0]->id);

                // Accedemos al modelo SecurityModel más concretamente al método setRol() en el cual en el cual vamos a obtener (0 = Adminsitrador o 1 = Usuario)
                // y con el sabremos a que inicio de la aplicación podremos mandar al usuario, si es administrador, accederá a la administración y si es usuario
                // accederá al apartado de reservar recursos
                SecurityModel::setRol($data['iniciarSesion'][0]->type);

                // Comprobaremos si el tipo de usuario que es 1 = Usuario sin permisos de administrador 0 = Adminsitrador.
                // Al ser usuario normal (1), y el login es correcto vamos a redirigirlo a una vista que no pueda editar ni añadir los recursos, pero si ver un listado
                if(SecurityModel::getRol() == 1){
                    header("Location: ?controller=ResourcesController&action=resourcesUser");
                }else if(SecurityModel::getRol() == 0){
                    // Al ser un usuario Administrador (0), y el login también correcto pero vamos a redirigirlo a una vista donde tenga un botón de añadir recurso
                    // y los botones de eliminar y editar, es decir a la administración de la aplicación.
                    header("Location: ?controller=ResourcesController&action=mostrarResources");
                }else{
                    // Si no es ninguno de los otros usuarios para controlarlo, vamos a producir un error, es decir, en el controlador que llamámos no existe 
                    // ese método por lo que comprobará en index si no existe ese método donde debe de llevar al usuario, en este caso, index está configurado
                    // que si existe el controlado pero no el método te lleva a una página de error 404 personalizada.
                    header("Location: ?controller=ResourcesController&action=error");
                }
            }else{
                // En caso que el login no haya sido correcto, es decir que no esté el usuario en la bd o no sea correcto el usuario y contraseña redirigirémos
                // a index puesto que aquí nos muestra siempre el login como vista predefinida a menos que haya una sesión iniciada o un controlador con un
                // método cargado en la URL
                header("Location: index.php");
            }
        }

        // Método para cerrar sesión, este es un método que tenemos en el controlado de Usuarios, pero que realmente lo que hace es llevarnos a la capa de seguridad
        // de nuestra aplicación donde borramos la sesión del usuario.
        public function cerrarSesion(){
            // Comprobaremos si existe una sesión iniciada, ya que sin sesión iniciada no podemos borrarla, puesto que no existe y algo que no existe no se puede borrar
            if(SecurityModel::haySesion()){
                // Accedemos al modelo SecurityModel, más en concreto al método cerrarSesión para cerrar la sesión del usuario desde nuestra capa de seguridad
                SecurityModel::cerrarSesion();

            // Si no existe una sesión nos redigirá al index donde tenemos configurada la aplicación para que si no se ha iniciado sesión muestre la pantalla.
            // de login como predefinida.
            }else{
                // En caso que el login no haya sido correcto, es decir que no esté el usuario en la bd o no sea correcto el usuario y contraseña redirigirémos
                // a index puesto que aquí nos muestra siempre el login como vista predefinida a menos que haya una sesión iniciada o un controlador con un
                // método cargado en la URL
                header("Location: index.php");
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