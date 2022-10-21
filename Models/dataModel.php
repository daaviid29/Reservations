<?php

    require_once 'Config/Config.php';

    Class dataModel{
        public $db;

        public function __construct() {
            $this->db = Config::conexion();
        }
        
        public function closeConnection() {
            if ($this->db){
                $this->db->close();  
            } 
        }

        function dataQuery($sql) {
            $res = $this->db->query($sql);
            $resArray = array();
            
            if ($res) {
                while ($fila = $res->fetch_object()) {
                    $resArray[] = $fila;
                }
            }

            return $resArray;
        }

        function dataManipulation($sql) {
            $this->db->query($sql);
            return $this->db->affected_rows;
        }

        public function get($tabla, $id = null){
            if(is_null($id)){
                $sql = "SELECT * FROM $tabla";
            }else{
                $sql = "SELECT * FROM $tabla WHERE id = $id";
            }
            return $sql;
        }


        public function delete($tabla, $id){
            $sql = "DELETE FROM $tabla WHERE id = $id";
            return $sql;
        }

    }

?>