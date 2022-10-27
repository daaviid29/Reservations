<?php

    require_once "Views/view.php";

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
            $users->setLastname($_REQUEST['lastname-user']);
            $users->setUsername($_REQUEST['username-user']);
            $users->setPassword($_REQUEST['password-user']);
            $users->setImage($_FILES['file-user']['name']);

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
            $users->setLastname($_REQUEST['lastname-user']);
            $users->setUsername($_REQUEST['username-user']);
            $users->setPassword($_REQUEST['password-user']);
            $users->setImage($_FILES['file-user']['name']);

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
            require_once 'Models/SecurityModel.php';

            // Crearemos el objeto sobre el que trabajaremos
            $user = new UsersModel();

            // Recogemos los datos y utilizamos los setters para guardarlos
            $user->setUsername(SecurityModel::limpiar($_REQUEST['username-email']));
            $user->setPassword($_REQUEST['password-login']);

            // Creamos un nuevo objeto con los datos que hemos recogido anteriormente
            $data['iniciarSesion'] = $user->iniciarSesion();

            if(count($data['iniciarSesion']) != 0){
                SecurityModel::iniciarSesion($data['iniciarSesion'][0]->id);
                echo $data['iniciarSesion'][0]->id;
                header("Location: ?controller=ResourcesController&action=resourcesUser");
            }else{
                // Redirigimos al usuario para mostrar el listado de usuarios
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