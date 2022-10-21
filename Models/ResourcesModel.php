<?php

    require_once 'Config/config.php';
    require_once 'dataModel.php';

    class ResourcesModel extends dataModel{
        private $name;
        private $description;
        private $location;
        private $image;
        private $directorio;

        public function __construct(){
            parent::__construct();
            $this->directorio = 'Assets/images/Resources/';
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setLocation($location){
            $this->location = $location;
        }

        public function getLocation(){
            return $this->location;
        }

        public function setImage($image){
            if (move_uploaded_file($_FILES['file-resources']['tmp_name'], $this->directorio.basename($_FILES['file-resources']['name']))) {
                //echo "La subida del archivo se ha efectuado con éxito";
                $this->image = $this->directorio.basename($_FILES['file-resources']['name']);
            } else {
                echo "La subida ha fallado";
            }
        }

        public function getImage(){
            return $this->image;
        }

        public function getResources($tabla){
            $sql = "SELECT * FROM $tabla";

            $actores = $this->dataQuery($sql);

            return $actores;
        }

        public function crearResources(){

            $sql = "INSERT INTO resources (name, description, location, image) VALUES('{$this->name}','{$this->description}','{$this->location}', '{$this->image}')";

            $createResources = $this->dataManipulation($sql);

            return $createResources;

        }

        public function borrarResource($id){
            
            $sql = "DELETE FROM resources WHERE id = $id";
            
            $borrarResources = $this->dataManipulation($sql);

            return $borrarResources;

        }

        public function mostrarResource($id){

            $sql = "SELECT * FROM resources WHERE id = $id";

            $mostrarResources = $this->dataQuery($sql);

            return $mostrarResources;
        }

        public function actualizarResource($id){

            $sql = "UPDATE resources SET name = '{$this->name}', description = '{$this->description}', location = '{$this->location}', image = '{$this->image}' WHERE id = $id;";

            $actualizarResource = $this->dataManipulation($sql);

            return $actualizarResource;

        }


    }


?>