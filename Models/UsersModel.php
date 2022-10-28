<?php

    require_once 'Config/config.php';
    require_once 'dataModel.php';

    class UsersModel extends dataModel{
        private $username;
        private $email;
        private $password;
        private $realname;
        private $lastname;
        private $image;
        private $rol;
        private $directorio;

        public function __construct(){
            parent::__construct();
            $this->directorio = 'Assets/images/Users/';
        }

        public function setUsername($username){
            $this->username = $username;
        }
        public function getUsername(){
            return $this->username;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setRealname($realname){
            $this->realname = $realname;
        }

        public function getRealname(){
            return $this->realname;
        }

        public function setPassword($password){
            $this->password = md5($password);
        }

        public function setLastname($lastname){
            $this->lastname = $lastname;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function setRol($rol){
            $this->rol = $rol;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setImage($image){
            if (move_uploaded_file($_FILES['file-user']['tmp_name'], $this->directorio.basename($_FILES['file-user']['name']))) {
                //echo "La subida del archivo se ha efectuado con éxito";
                $this->image = $this->directorio.basename($_FILES['file-user']['name']);
            } else {
                echo "La subida ha fallado";
            }
        }

        public function getImage(){
            return $this->image;
        }

        public function getUsers($tabla){
            $sql = "SELECT * FROM $tabla";

            $usuarios = $this->dataQuery($sql);

            return $usuarios;
        }

        public function crearUser(){

            $sql = "INSERT INTO users (username, email, password, realname, lastname, image, type) VALUES('{$this->username}', '{$this->email}', '{$this->password}','{$this->realname}', '{$this->lastname}', '{$this->image}', '{$this->rol}')";

            $crearUsuario = $this->dataManipulation($sql);

            return $crearUsuario;

        }

        public function borrarUser($id){
            
            $sql = "DELETE FROM users WHERE id = $id";
            
            $borrarUser = $this->dataManipulation($sql);

            return $borrarUser;

        }

        public function mostrarUser($id){

            $sql = "SELECT * FROM users WHERE id = $id";

            $mostrarUser = $this->dataQuery($sql);

            return $mostrarUser;
        }

        public function actualizarUser($id){

            $sql = "UPDATE users SET username = '{$this->username}', realname = '{$this->realname}', lastname = '{$this->lastname}', image = '{$this->image}' WHERE id = $id;";

            $actualizarResource = $this->dataManipulation($sql);

            return $actualizarResource;

        }

        public function iniciarSesion(){
            
            $sql = "SELECT id FROM users WHERE username = '{$this->username}' AND  password = '{$this->password}';";

            $login = $this->dataQuery($sql);
            
            return $login;
        }


    }


?>