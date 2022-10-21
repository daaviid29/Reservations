<?php

    require_once 'Config/config.php';
    require_once 'dataModel.php';

    class TimeSlotsModel extends dataModel{
        private $dayofweek;
        private $starttime;
        private $endtime;

        public function __construct(){
            parent::__construct();
        }

        public function setDayofweek($dayofweek){
            $this->dayofweek = $dayofweek;
        }

        public function getDayofweek(){
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