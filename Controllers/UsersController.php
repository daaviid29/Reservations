<?php

    require_once "Views/view.php";
    require_once 'Models/SecurityModel.php';

    class UsersController{
        
        public function mostrarUsuarios(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

             // Crearemos el objeto sobre el que trabajaremos
            $users = new UsersModel();

            // Accedemos al objeto libro y a su método getPeliculas donde le pasamos la tabla para poder obtener los datos
            $data['users'] = $users->getUsers('users');

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/admin-users.php';
            View::adminViews('admin-users', $data);
        }

        public function crearUsuario(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $users = new UsersModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $users->setRealname($_REQUEST['realname-user']);
            $users->setEmail($_REQUEST['email-user']);
            $users->setLastname($_REQUEST['lastname-user']);
            $users->setUsername($_REQUEST['username-user']);
            $users->setPassword($_REQUEST['password-user']);
            $users->setImage($_FILES['file-user']['name']);
            $users->setRol($_REQUEST['role-user']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['insertUser'] = $users->crearUser();

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=UsersController&action=mostrarUsuarios");
        }

        public function borrarUser(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $users = new UsersModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['deleteUser'] = $users->borrarUser($_GET['id']);

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=UsersController&action=mostrarUsuarios");

            // Requerimos la vista donde mostraremos el contenido
            require_once 'Views/admin/admin-users.php';
        }

        public function mostrarUser(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $users = new UsersModel();

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['getUser'] = $users->mostrarUser($_GET['id']);

            // Requerimos la vista donde mostraremos el contenido
            //require_once 'Views/admin/editar-user.php';
            View::adminViews('editar-user', $data);
        }

        public function actualizarUser(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $users = new UsersModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $users->setRealname($_REQUEST['realname-user']);
            $users->setEmail($_REQUEST['email-user']);
            $users->setLastname($_REQUEST['lastname-user']);
            $users->setUsername($_REQUEST['username-user']);
            $users->setPassword($_REQUEST['password-user']);
            $users->setImage($_FILES['file-user']['name']);
            $users->setRol($_REQUEST['role-user']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['updateUser'] = $users->actualizarUser($_GET['id']);

            // Redirigimos al usuario para mostrar el listado de usuarios
            header("Location: ?controller=UsersController&action=mostrarUsuarios");

            // Requerimos la vista donde mostraremos el contenido
            View::adminViews('admin-users', $data);
        }

        public function iniciarSesion(){
            // Cargamos el modelo
            require_once 'Models/UsersModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $user = new UsersModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $user->setUsername(SecurityModel::limpiar($_REQUEST['username-email']));
            $user->setPassword($_REQUEST['password-login']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['iniciarSesion'] = $user->iniciarSesion();

            if(count($data['iniciarSesion']) != 0){
                SecurityModel::iniciarSesion($data['iniciarSesion'][0]->id);
                SecurityModel::setRol($data['iniciarSesion'][0]->type);
                // Aquí vamos a comprobar el tipo de usuario que es 1 = Usuario sin permisos de administrador 0 = Adminsitrador.
                // Al ser usuario normal, y el login es correcto vamos a redirigirlo a una vista que no pueda editar ni añadir los recursos, pero si ver un listado
                if(SecurityModel::getRol() == 1){
                    header("Location: ?controller=ResourcesController&action=resourcesUser");
                }else if(SecurityModel::getRol() == 0){
                    // Al ser un usuario Administrador, y el login es correcto vamos a redirigirlo a una vista donde tenga un botón de añadir recurso
                    // y los botones de eliminar y editar.
                    header("Location: ?controller=ResourcesController&action=mostrarResources");
                }else{
                    // Si no es ninguno de los otros usuarios para controlarlo, vamos a producir un error, es decir, en el controlador que llamámos no existe 
                    // ese método por lo que se irá a index y allí tenemos configurado que si no existe un método muestre una página de error 404
                    header("Location: ?controller=ResourcesController&action=error");
                }
            }else{
                // En caso que el login no haya sido correcto, es decir que no esté el usuario en la bd o no sea correcto el usuario y contraseña redirigirémos a index
                // puesto que aquí nos muestra siempre el login a menos que haya una sesión iniciada o un método cargado en la URL
                header("Location: index.php");
            }
        }

        public function cerrarSesion(){
            // Accedemos al modelo SecurityModel, más en concreto al método cerrarSesión para cerrar la sesión del usuario desde nuestra capa de seguridad
            SecurityModel::cerrarSesion();
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