<?php
    
    // Cargamos el fichero config donde tenemos la conexión para poder acceder a la base de datos
    require_once 'Config/config.php';
    // Cargamos el fichero dataModel que se trata de un modelo genérico que tiene métodos de abstracción.
    require_once 'dataModel.php';

    // Creamos la clase TimeSlotsModel y extendemos (heredamos) de la clase dataModel, la cual LA HEMOS REQUERIDO ANTERIORMENTE (IMPORTANTE) si no se requiere
    // la clase anteriormente nos va a dar error a la hora de hacer heredar
    class TimeSlotsModel extends dataModel{
        // Atributos de la clase ResourcesModel
        private $dayofweek;
        private $starttime;
        private $endtime;

        // Utilizaremos un constructor para instanciar la conexión pusto que la inicializamos en el constructor de la clase dataModel
        public function __construct(){
            // Llamamos al constructor de la clase padre que sería dataModel
            parent::__construct();
        }

         // Getters y Setters (Todos ellos se encargaran de actualizar el valor de las variables que declaramos arriba, y de obtener el valor que estas tienen)

        // Setter de dayofweek (Recibe un parámetro que será el nombre que le queremos asignar)
        public function setDayofweek($dayofweek){
            // Instanciaoms la variable local dayofweek, con el valor que recibimos como parámetro.
            $this->dayofweek = $dayofweek;
        }

        // Getter de dayofweek (NO RECIBE PARÁMETROS) Un getter debe de encargarse de obtener el dato / datos que tenga la variable local
        public function getDayofweek(){
            // Para devolver al valor utilizamos la sentencia return y con el this decimos que queremos utilizar la variable más local, es decir, la que tenemos
            // instanciada en la parte de arriba y luego con la flecha (->) decimos cual variable es la que queremos, en este caso dayofweek
            return $this->dayofweek;
        }

        public function setStarttime($starttime){
            $this->starttime = $starttime;
        }

        public function getStarttime(){
            return $this->starttime;
        }

        public function setEndtime($endtime){
            $this->endtime = $endtime;
        }

        public function getEndtime(){
            return $this->endtime;
        }

        public function getTimeslots($tabla){
            $sql = "SELECT * FROM $tabla";

            $timeslots = $this->dataQuery($sql);

            return $timeslots;
        }

        public function crearTimeSlot(){

            $sql = "INSERT INTO timeslots (dayofweek, starttime, endtime) VALUES('{$this->dayofweek}','{$this->starttime}','{$this->endtime}')";

            echo $sql;

            $createTimelost = $this->dataManipulation($sql);

            return $createTimelost;

        }

        public function borrarTimeSlot($id){
            
            $sql = "DELETE FROM timeslots WHERE id = $id";
            
            $borrarTimeSlot = $this->dataManipulation($sql);

            return $borrarTimeSlot;

        }

        /*public function mostrarResource($id){

            $sql = "SELECT * FROM resources WHERE id = $id";

            $mostrarResources = $this->dataQuery($sql);

            return $mostrarResources;
        }

        public function actualizarResource($id){

            $sql = "UPDATE resources SET name = '{$this->name}', description = '{$this->description}', location = '{$this->location}', image = '{$this->image}' WHERE id = $id;";

            $actualizarResource = $this->dataManipulation($sql);

            return $actualizarResource;

        }*/

    }


?>