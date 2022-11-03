<?php

    // Cargamos el fichero config donde tenemos la conexión para poder acceder a la base de datos
    require_once 'Config/config.php';
    // Cargamos el fichero dataModel que se trata de un modelo genérico que tiene métodos de abstracción.
    require_once 'dataModel.php';

    // Creamos la clase ResourcesModel y extendemos (heredamos) de la clase dataModel, la cual LA HEMOS REQUERIDO ANTERIORMENTE (IMPORTANTE) si no se requiere
    // la clase anteriormente nos va a dar error a la hora de hacer heredar
    class ResourcesModel extends dataModel{
        // Atributos de la clase ResourcesModel
        private $name;
        private $description;
        private $location;
        private $image;
        // Atributo para saber la ruta donde debemos de guardar las imágenes en el proyecto
        private $directorio;

        // Utilizaremos un constructor para instanciar la conexión pusto que la inicializamos en el constructor de la clase dataModel
        public function __construct(){
            // Llamamos al constructor de la clase padre que sería dataModel
            parent::__construct();
            // Asignamos a la variable directorio la ruta donde guardaremos las imágenes que se suban.
            $this->directorio = 'Assets/images/Resources/';
        }

        // Getters y Setters (Todos ellos se encargaran de actualizar el valor de las variables que declaramos arriba, y de obtener el valor que estas tienen)

        // Setter de name (Recibe un parámetro que será el nombre que le queremos asignar)
        public function setName($name){
            // Instanciaoms la variable local name, con el valor que recibimos como parámetro.
            $this->name = $name;
        }

        // Getter de name (NO RECIBE PARÁMETROS) Un getter debe de encargarse de obtener el dato / datos que tenga la variable local
        public function getName(){
            // Para devolver al valor utilizamos la sentencia return y con el this decimos que queremos utilizar la variable más local, es decir, la que tenemos
            // instanciada en la parte de arriba y luego con la flecha (->) decimos cual variable es la que queremos, en este caso name
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

        // El getter de image es similar a los anteriores pero con una peculiaridad y es que este debe de comprobar si la imagen que se sube es correcta, si es así
        // guardarla en una ubicación. (Recibe como parámetro la imagen que queremos almacenar)
        public function setImage($image){
            // Comrpobamos si hay una imagen subida en la variable gloal _FILES, en la cual comprobamos el nombre del recurso y el nombre temporal que este recibe
            // si es así, moveremos la imagen al directorio que inicializamos en el constructor de esta clase y le indicamos el nombre temporal que esta recibió
            if (move_uploaded_file($_FILES['file-resources']['tmp_name'], $this->directorio.basename($_FILES['file-resources']['name']))) {
                // Mostraremos un mensaje para comprobar si la imagen se ha subido con éxito, en este caso no es necesario, por eso el código se encuentra comentado
                    /*echo "La subida del archivo se ha efectuado con éxito"; */
                // Si la imagen se ha subido correctamente modificaremos el valor de la variable imagen con el directorio y nombre final que ha recibido la imagen
                // de esta manera en la base de datos SOLO GUARDAREMOS LA RUTA DE LA IMAGEN y no guardaremos su contenido binario, así hacemos que la base de datos
                // tenga menos contenido y por lo tanto sea más agil a la hora de trabajar con ella.
                $this->image = $this->directorio.basename($_FILES['file-resources']['name']);
            } else {
                // Si no se ha subido la imágen correctamente mostraremos un mensaje de error por pantalla.
                echo "La subida ha fallado";
            }
        }

        public function getImage(){
            return $this->image;
        }

        public function crearResources(){

            $sql = "INSERT INTO resources (name, description, location, image) VALUES('{$this->name}','{$this->description}','{$this->location}', '{$this->image}')";

            $createResources = $this->dataManipulation($sql);

            return $createResources;

        }

        public function actualizarResource($id){

            $sql = "UPDATE resources SET name = '{$this->name}', description = '{$this->description}', location = '{$this->location}', image = '{$this->image}' WHERE id = $id;";

            $actualizarResource = $this->dataManipulation($sql);

            return $actualizarResource;

        }

        public function buscarResource($busqueda){
            $sql = "SELECT * FROM resources WHERE name LIKE '%$busqueda%' OR description LIKE '%$busqueda%' OR location LIKE '%$busqueda%';";

            $resource = $this->dataQuery($sql);

            return $resource;
        }

        public function setReservation($idResource, $idUser, $idTimeSlot, $date, $remarks){

            $sql = "INSERT INTO reservations (idResource, idUser, idTimeSlot, date, remarks) VALUES ($idResource, $idUser, $idTimeSlot, '$date', '$remarks');";;

            $setReservation = $this->dataManipulation($sql);

            return $setReservation;

        }

        public function getAllReservations(){
            $sql = "SELECT resources.name AS title, users.username, timeslots.dayofweek, timeslots.starttime, timeslots.endtime, resources.name, reservations.date, timeslots.starttime AS start, timeslots.endtime AS end FROM reservations INNER JOIN resources ON reservations.idResource = resources.id INNER JOIN timeslots ON reservations.idTimeSlot = timeslots.id INNER JOIN users ON reservations.idUser = users.id;";

            $getReservas = $this->dataQuery($sql);

            return $getReservas;

        }

        public function deleteAllReservations(){
            $sql = "DELETE FROM reservations;";
            
            $deleteAll = $this->dataManipulation($sql);

            return $deleteAll;

        }


    }


?>