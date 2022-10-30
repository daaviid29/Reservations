<?php

    // Cargamos el fichero config donde tenemos la conexión para poder acceder a la base de datos
    require_once 'Config/Config.php';

    Class dataModel{
        // Atributo de la clase dataModel (Solo tiene un atributo que es DB ya que esta clase se encarga de instanciar la conexión, para usarla en el resto de models)
        public $db;

        // Crearemos un constructor, en el cual inicializaremos la clase Config y lo guardaremos en la variable db de esta clase para poder utilizarla en el resto
        // de Modelos y en esta misma clase.
        public function __construct() {
            // Almacenamos en la variable db el resultado obtenido de la clase Config, en el método conexion
            $this->db = Config::conexion();
        }
        
        // Método para comprobar si existe una conexión
        public function closeConnection() {
            // Si la variable db tiene contenido, quiere decir que existe una conexión puesto que la variable la instanciamos en el contructor.
            if ($this->db){
                // Si existe la conexión accedemos al método close() que se encargará de cerrar la conexión.
                $this->db->close();  
            } 
        }

        // Método para Consultas de Datos (Abstracción de datos), no dependemos del SGBD (Sistema Gestor de Base de Datos) puesto que la consulta la convertimos
        // en un array de PHP para utilizarlo de manera independiente. (el método recibe un parámetro, la consulta a ejecutar)
        function dataQuery($sql) {
            // Utilizamos el this para referirnos al atributo de la clase y ejecutamos el método query que tenemos en el atributo puesto que guarda un objeto
            // de tipo mysqli, en dicho objeto le pasamos una variable SQL que es la consulta que queremos ejecutar que nos llega como parámetro, guardamos el
            // resultado de esa consulta en una variable llamada res, la cual utilziaremos posteriormente.
            $res = $this->db->query($sql);
            //Creamos un array de PHP el cual rellenaremos con los datos de la consulta que ejecutemos.
            $resArray = array();
            
            // Comprobamos si la variable res contiene información, ya que puede ser que no tenga ningun registro en la tabla.
            if ($res) {
                // En caso de devolver contenido en la variable res haremos un while en el cual asignaremos a la variable fila, cada uno de los resultados de la
                // variable res en cada iteracción hasta que no quede ninguna fila.
                while ($fila = $res->fetch_object()) {
                    // Igualamos la variable fila que estamos modificado en el while, a la variable resArray, pero al tener múltiples filas necesitamos que cada una
                    // se guarde como un array dentro del array, para que podamos utilizarla posteriormente con índices.
                    $resArray[] = $fila;
                }
            }
            // por último, devolvemos la variable resArray para poder ser utilizada en el resto de métodos
            return $resArray;
        }

        // Método para inserción de datos (Abstracción de datos), no dependemos del SGBD (Sistema Gestor de Base de Datos) puesto que la consulta la convertimos
        // en un array de PHP para utilizarlo de manera independiente. (el método recibe un parámetro, la consulta a ejecutar)
        function dataManipulation($sql) {
            // Utilizamos el this para referirnos al atributo de la clase y ejecutamos el método query que tenemos en el atributo puesto que guarda un objeto
            // de tipo mysqli, en dicho objeto le pasamos una variable SQL que es la consulta que queremos ejecutar que nos llega como parámetro
            $this->db->query($sql);
            // por último, devolvemos el número de filas que han sido afectadas, en la consulta.
            return $this->db->affected_rows;
        }

        // Método Get para la obtención de datos de las tablas (Recibe 2 parámetros), tabla = nombre de la tabla donde se desea consultar, id = es un parámetro
        // opcional, puede ir o no en el método, no es obligatorio que vaya.
        public function get($tabla, $id = null){
            // Instanciamos una variable result a cadena vacía, esta será la que utilicemos para devolverla en el return
            $result = "";
            // Comprobamos si la variable id es null, en caso de que sea null, lo que queremos es devolver el resultado de la tabla completa.
            if(is_null($id)){
                // Creamos una variable SQL en la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla";
                // en la variable result que creamos e inicializamos anteriormente guardamos el resultado del método dataQuery el cual recibe un parámetro
                // que es la consulta que queremos ejecutar.
                $result = $this->dataQuery($sql);
            }else{
                // Si la variable id no está vacía, es que queremos mostrar un único registro en la base de datos para ello, creamos una variable SQL en 
                // la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla WHERE id = $id";
                // en la variable result que creamos e inicializamos anteriormente guardamos el resultado del método dataQuery el cual recibe un parámetro
                // que es la consulta que vamos ejecutar.
                $result = $this->dataQuery($sql);
            }
            // Devolvemos el resultado de la variable result, ya sea con los datos de toda la tabla o con los de un registro en concreto.
            return $result;
        }

        // Método delete para el eliminado de un registro en la base de datos, (Recibe 2 parámetros), tabla = nombre de la tabla donde se desea consultar,
        // id = es un parámetro.
        public function delete($tabla, $id){
            // Creamos una variable SQL en la cual almacenaremos la consulta que queremos ejecutar
            $sql = "DELETE FROM $tabla WHERE id = $id";
            // guardaremos en una variable llamada delete el resultado del método dataQuery el cual recibe un parámetro que es la consulta que vamos ejecutar.
            $delete = $this->dataManipulation($sql);
            // Devolvemos el resultado de la variable result, ya sea con los datos de toda la tabla o con los de un registro en concreto.
            return $delete;
        }

    }

?>